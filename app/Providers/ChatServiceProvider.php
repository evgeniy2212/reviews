<?php


namespace App\Providers;

use App\Events\ChatList;
use App\Events\ChatMessage;
use App\Events\ChatMessageReadStatus;
use App\Events\ClientUnreadMessages;
use App\Models\Chat;
use App\Models\ChatMessage as Message;
use App\Models\MessageUser;
use App\Models\User;
use App\Notifications\User\NewMessageNotification;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
//use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
//use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class ChatServiceProvider
{
    /**
     * @var Chat
     */
    private $chat;

    /**
     * @var Message
     */
    private $message;

    /**
     * @var $notifiableUser
     */
    private $notifiableUser;

    /**
     * create chat
     *
     * @return Chat
     */
    public function create(): Chat
    {
        $this->chat = (new Chat())->create();

        return $this->chat;
    }

    /**
     * attach or update user in chat
     *
     * @param string $userId
     */
    public function attachUser($userId)
    {
        $this->chat->chatUsers()->firstOrCreate([
            'chat_id' => $this->chat->id,
            'user_id' => $userId,
        ]);
    }

    /**
     * @param $id
     */
    public function deleteChat($id)
    {
        Chat::findOrFail($id)->delete();
    }

    /**
     * get all user chats
     *
     * @return LengthAwarePaginator
     */
    public function getUserChats(): LengthAwarePaginator
    {
        return $this->getAllUserChats()
            ->orderByDesc('messages_max_created_at')
            ->latest()
            ->paginate(config('app.pagination.default'));
    }

    /**
     * get all user chats
     */
    private function getAllUserChats()
    {
        $userId = auth()->id();
        return Chat::query()
            ->with(['chatUsers' => function($q) use($userId) {
                return $q->where('user_id', '!=', $userId);
            }, 'lastMessage'])
            ->whereHas('lastMessage')
//            ->withMax('messages', 'created_at')
            ->where(function($q) use($userId) {
                return $q->whereHas('chatUsers', function ($q) use($userId){
                    return $q->whereUserId($userId);
                });
//                    ->whereDoesntHave('chatUsers', function($q) {
//                    $q->whereIn('user_id', auth()->user()->blockedUsers->pluck('id'));
//                });
            });

    }

    /**
     * get chat between 2 users
     * @param $firstUser
     * @param $secondUser
     *
     * @return mixed
     */
    private function existsChat($firstUser, $secondUser)
    {
         $this->chat = Chat::query()
            ->with('chatUsers')
             ->whereHas('chatUsers', function($q) use ($firstUser, $secondUser) {
                 $q->whereUserId($firstUser);
             })
             ->whereHas('chatUsers', function($q) use ($firstUser, $secondUser) {
                 $q->whereUserId($secondUser);
             })
            ->first();
    }

    /**
     * get chat between 2 users
     * @param string $id
     *
     * @return Chat
     */
    public function getChat(string $id): Chat
    {
        $user = $this->getUser($id);
        $this->existsChat(auth()->id(), $user->id);
        if ($this->chat) {
            $this->chat
                ->chatUsers
                ->firstWhere('user_id', auth()->id());
        } else {
            $this->create();
            $this->attachUser(auth()->id());
            $this->attachUser($user->id);
            $this->setUnreadMessage(
                [
                    'chat_id' => $this->chat->id,
                    'user_id' => $user->id,
                    'message_id' => null,
                ]
            );
        }

        return $this->chat;
    }

    /**
     * get chat messages
     * @param string $id
     *
     * @return LengthAwarePaginator
     */
    public function getChatMessages(string $id): LengthAwarePaginator
    {
        $chat = Chat::findOrFail($id);
        return Message::query()
            ->whereChatId($chat->id)
            ->latest()
            ->paginate(config('app.pagination.default'));
    }

    /**
     * search by User chats
     *
     * @param array $validated
     *
     * @return LengthAwarePaginator
     */
    public function searchByChats(array $validated): LengthAwarePaginator
    {
        return Chat::query()
            ->with('chatUsers')
            ->whereHas('lastMessage')
            ->whereHas('chatUsers', function(Builder $query) use ($validated) {
                $query->when($validated['query'], function ($q) use ($validated) {
                    $q->whereHas('user', function($q) use ($validated) {
                        $q->where(function($q) use ($validated) {
                            $q->where('name_first', 'ilike', '%' . $validated['query'] . '%')
                                ->orWhere('name_first', 'ilike','%' . $validated['query'] . '%');
                        })->where('id', '!=', auth()->id());
                    });
                });
            })->whereHas('chatUsers', function($q) {
                $q->where('user_id', auth()->id());
            })->whereDoesntHave('chatUsers', function($q) {
                $q->whereIn('user_id', auth()->user()->blockedUsers->pluck('id'));
            })
            ->latest()
            ->paginate(config('app.pagination.search'));
    }

    /**
     * Return one user by id
     *
     * @param string $id
     * @return mixed
     */
    private function getUser(string $id)
    {
        return User::findOrFail($id);
    }

    /**
     * Store user message
     *
     * @param array $validated
     *
     * @return Message
     */
    public function storeMessage(array $validated): Message
    {
        $this->message = new Message();
        $this->message->chat_id = $validated['chat_id'];
        $this->message->user_id = auth()->id();
        $this->message->message = $validated['message'] ?? '';
        $this->message->save();

        if (isset($validated['photo'])) {
            $this->storeMessagePhoto($validated['photo']);
        }

        $chat = Chat::with('chatUsers')
            ->find($validated['chat_id']);
        foreach ($chat->chatUsers as $chatUser) {
            if ($chatUser->user_id != auth()->id()) {
                $this->notifiableUser = User::find($chatUser->user_id);
                ChatMessage::dispatch($chat->id, $this->message);
                ChatList::dispatch($chatUser->user_id, $this->message);
                ClientUnreadMessages::dispatch($chat->id, $chatUser->user_id);
            }
        }

        $this->notifiableUser->notify(new NewMessageNotification(auth()->user(), $chat->id));

        return $this->message;
    }

    /**
     * @param array $validated
     *
     * @return MessageUser
     */
    public function setUnreadMessage(array $validated): MessageUser
    {
        return MessageUser::updateOrCreate(
            [
                'chat_id' => $validated['chat_id'],
                'user_id' => empty($validated['user_id'])
                    ? auth()->id()
                    : $validated['user_id']
            ],
            [
                'message_id' => $validated['message_id']
            ]
        );
    }

    /**
     * @param array $validated
     */
    public function deleteUnreadStatusMessage(array $validated)
    {
        MessageUser::whereUserId(auth()->id())
            ->whereChatId($validated['chat_id'])
            ->delete();

        $chat = Chat::with('chatUsers')
            ->find($validated['chat_id']);
        foreach ($chat->chatUsers as $chatUser) {
            if ($chatUser->user_id != auth()->id()) {
                ChatMessageReadStatus::dispatch($chat->id, $chatUser->user_id);
            }
        }
    }

    /**
     * @param Message $message
     * @param bool $isMine
     *
     * @return bool
     */
    public function isReadMessages(Message $message, $isMine = false): bool
    {
        $chat = $this->getChatById($message->chat_id);
        $userId = $isMine
            ? $chat->chatUsers->firstWhere('user_id', '!=', auth()->id())->user_id
            : auth()->id();
        $unreadMessage = MessageUser::whereChatId($message->chat_id)
            ->firstWhere('user_id', '!=', $userId);

        return $unreadMessage
            ? ($unreadMessage->message
                ? $unreadMessage->message->created_at >= $chat->lastMessage->created_at
                : false)
            : true;
    }

    /**
     * @param $photo
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    private function storeMessagePhoto($photo)
    {
        $this->message
            ->addMedia($photo)
            ->usingFileName(
                $this->getFileName($photo)
            )
            ->toMediaCollection();
    }

    /**
     * is exist chats with unread messages
     *
     * @return bool
     */
    public function isExistChatWithUnreadMessages(): bool
    {
        $newChats = Chat::whereHas('chatUsers', function ($q) {
            $q->where('user_id', auth()->id());
        })->whereDoesntHave('chatUsers', function($q) {
            $q->whereIn('user_id', auth()->user()->blockedUsers->pluck('id'));
        })->whereHas('unreadMessages', function($q) {
            $q->whereNull('message_id')
                ->whereUserId(auth()->id());
        })->pluck('id');

        $userChats = $this->getAllUserChats()->pluck('id');

        foreach($userChats as $userChat) {
            $latestMessage = Message::whereChatId($userChat)
                ->where('user_id', '!=', auth()->id())
                ->latest()
                ->first();

            if($latestMessage) {
                $isContainUnreadMessage = Message::whereChatId($userChat)
                    ->where('user_id', '!=', auth()->id())
                    ->whereHas('messageUsers', function ($q) {
                        $q->where('user_id', auth()->id());
                    })
                    ->when($latestMessage, function ($q) use($latestMessage) {
                        $q->where(
                            'created_at',
                            '<',
                            $latestMessage->created_at->format('Y-m-d H:i:s')
                        );
                    })
                    ->orWhere(function($q) use($newChats) {
                        $q->whereIn('chat_id', $newChats);
                    })
                    ->exists();

                if($isContainUnreadMessage)
                    return true;
            }
        }

        return false;
    }

    /**
     * Return one chat by id
     *
     * @param string $id
     * @return mixed
     */
    public function getChatById(string $id)
    {
        return Chat::findOrFail($id);
    }

    /**
     * @param $file
     *
     * @return string
     */
    private function getFileName($file): string
    {
        return md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
    }
}
