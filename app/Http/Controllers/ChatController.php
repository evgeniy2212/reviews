<?php

namespace App\Http\Controllers;

use App\Events\UserOfflineStatus;
use App\Events\UserOnlineStatus;
use App\Http\Requests\Chat\CreateMessageRequest;
use App\Http\Requests\Chat\EnterRequest;
use App\Http\Requests\Chat\LeftRequest;
use App\Http\Requests\Chat\SearchRequest;
use App\Http\Requests\Chat\StoreContactRequest;
use App\Http\Requests\Chat\UpdateContactRequest;
use App\Http\Requests\Chat\UserOnlineRequest;
use App\Http\Resources\Chat\ChatResource;
use App\Http\Resources\Chat\MessageResource;
use App\Http\Resources\Chat\UnreadMessagesResource;
use App\Http\Resources\Chat\UserContactsResource;
use App\Models\User;
use App\Providers\ChatServiceProvider;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    /**
     * @var ChatServiceProvider
     */
    private $provider;

    public function __construct(ChatServiceProvider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * get Chat list
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ChatResource::collection($this->provider->getUserChats());
    }

    public function testChat(){
        return view('test_chat_vue');
    }

    /**
     * get Chat by user id
     * @param string $id
     * @return ChatResource
     */
    public function getChat(string $id): ChatResource
    {
        return new ChatResource(
            $this->provider->getChat($id)
        );
    }

    /**
     * get auth user`s Chats
     * @return AnonymousResourceCollection
     */
    public function getChats(): AnonymousResourceCollection
    {
        return ChatResource::collection(
            auth()->user()->chats
        );
    }

    /**
     * fetch User`s Contacts
     * @return AnonymousResourceCollection
     */
    public function getContacts(): AnonymousResourceCollection
    {
        Log::info(__METHOD__, [auth()->user()]);
        Log::info(__METHOD__ . ' ACTIVE CONTACTS: ', [auth()->user()->active_contacts]);
        return UserContactsResource::collection(
            auth()->user()->active_contacts
        );
    }

    /**
     * @param StoreContactRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeContact(StoreContactRequest $request)
    {
        $contact = $this->provider->checkContactExistingByEmail($request->get('email'));
        if($contact){
            return response()->json(
                [
                    'success' => false,
                    'message' => 'You already have such a contact or have already sent a request to add a contact before.'
                ]
            );
        }
        $this->provider->storeContact(
            $request->validated()
        );
        return response()->json(
            [
                'success' => true,
                'message' => 'Your invitation has been sent. After it is accepted, you will see a new name in your chat contacts and will be able to exchange texts at any time convenient for you.'
            ]
        );
    }

    /**
     * @param UpdateContactRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateContact(UpdateContactRequest $request)
    {
        $contact = $this->provider->updateContact(
            $request->validated()
        );
        return response()->json(
            [
                'success' => true,
                'message' => 'Contact updated successfully!',
                'contact' => new UserContactsResource($contact)
            ]
        );
    }

    /**
     * @param string $token
     */
    public function approveContact(string $token)
    {
        $name = $this->provider->approveContact($token);

        return redirect()->route('profile-info')
            ->withSuccess(["$name added to your contact list."]);
    }

    /**
     * invite client to chat
     * @param string $id
     * @return AnonymousResourceCollection
     */
    public function getMessages(string $id): AnonymousResourceCollection
    {
        return MessageResource::collection(
            $this->provider->getChatMessages($id)
        );
    }

    /**
     * @param CreateMessageRequest $request
     *
     * @return MessageResource
     */
    public function storeMessage(CreateMessageRequest $request): MessageResource
    {
        return new MessageResource(
            $this->provider->storeMessage(
                $request->validated()
            )
        );
    }

    /**
     * @param LeftRequest $request
     *
     * @return Response|ResponseFactory
     */
    public function leaveChat(LeftRequest $request)
    {
        $this->provider->setUnreadMessage($request->validated());
    }

    /**
     * @param EnterRequest $request
     *
     * @return Response|ResponseFactory
     */
    public function enterChat(EnterRequest $request)
    {
        $this->provider->deleteUnreadStatusMessage($request->validated());
    }

    /**
     * @param SearchRequest $request
     *
     * @return AnonymousResourceCollection
     */
    public function search(SearchRequest $request): AnonymousResourceCollection
    {
        return ChatResource::collection($this->provider->searchByChats($request->validated()));
    }

    /**
     * @return UnreadMessagesResource
     */
    public function chatsWithUnreadMessages(): UnreadMessagesResource
    {
        return new UnreadMessagesResource(
            $this->provider->isExistChatWithUnreadMessages()
        );
    }

    /**
     * @param Request $request
     */
    public function deleteChatMessages(Request $request)
    {
        $this->provider->deleteMessages($request->get('messages', []));
    }

    /**
     * @param Request $request
     */
    public function deleteChat(Request $request)
    {
        $this->provider->deleteChat($request->id);

        return response()->json(
            [
                'success' => true,
                'message' => 'Chat deleted successfully!'
            ]
        );
    }

    /**
     * @param Request $request
     */
    public function deleteContact(Request $request)
    {
        $this->provider->deleteContact($request->id);

        return response()->json(
            [
                'success' => true,
                'message' => 'Contact deleted successfully!'
            ]
        );
    }

    /**
     * @param UserOnlineRequest $request
     * @return void
     */
    public function online(UserOnlineRequest $request)
    {
        $userId = $request->get('user_id');
        $user = User::findOrFail($userId);
        $user->chat_status = 1;
        $user->save();
        broadcast(new UserOnlineStatus($user));
    }

    /**
     * @param UserOnlineRequest $request
     * @return void
     */
    public function offline(UserOnlineRequest $request)
    {
        $userId = $request->get('user_id');
        $user = User::findOrFail($userId);
        $user->chat_status = 0;
        $user->save();
        broadcast(new UserOfflineStatus($user));
    }
}
