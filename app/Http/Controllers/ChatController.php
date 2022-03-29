<?php

namespace App\Http\Controllers;

use App\Events\ChatTestEvent;
use App\Http\Requests\Chat\CreateMessageRequest;
use App\Http\Requests\Chat\EnterRequest;
use App\Http\Requests\Chat\LeftRequest;
use App\Http\Resources\Chat\ChatResource;
use App\Http\Resources\Chat\MessageResource;
use App\Http\Resources\Chat\UnreadMessagesResource;
use App\Providers\ChatServiceProvider;
use Illuminate\Contracts\Routing\ResponseFactory;
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
        event(new ChatTestEvent('Test message', 1));
//        broadcast(new ChatTestEvent('Test message', 1))->toOthers();
        dd('ok');
//        return json('ok');
        return ChatResource::collection($this->provider->getUserChats());
    }

    public function testChat(){
        return view('test_chat');
    }

    /**
     * get Chat by user id
     * @param string $id
     * @return ChatResource
     */
    public function getChat(string $id): ChatResource
    {
        return new ChatResource($this->provider->getChat($id));
    }

    /**
     * invite client to chat
     * @param string $id
     * @return AnonymousResourceCollection
     */
    public function getMessages(string $id): AnonymousResourceCollection
    {
        return MessageResource::collection($this->provider->getChatMessages($id));
    }

    /**
     * @param CreateMessageRequest $request
     *
     * @return MessageResource
     */
    public function storeMessage(CreateMessageRequest $request): MessageResource
    {
        return new MessageResource($this->provider->storeMessage($request->validated()));
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
        return new UnreadMessagesResource($this->provider->isExistChatWithUnreadMessages());
    }
}
