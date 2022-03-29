<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ChatTestEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels, Queueable;

    public $test;
    public $message;

    /**
     * Create a new event instance.
     *
     * @param $message
     * @param $id
     *
     * @return void
     */
    public function __construct($message, $id = 0)
    {
        $this->message = $message;
        $this->id = $id;
        $this->test = $id;
        Log::info(__METHOD__, [$this->id, $this->message]);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return
     */
    public function broadcastOn()
    {
        return new Channel('chat_' . 1);
    }

    public function broadcastAs()
    {
        return 'chat_' . 1;
    }

    public function broadcastWith()
    {
        return ['message' => 'test'];
    }
}
