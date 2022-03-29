<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
            return [
                'id'                => $this->id,
                'createdAt'         => $this->created_at,
                'chatUsers'         => UserChatResource::collection($this->chatUsers),
                'lastMessage'       => new MessageResource($this->lastMessage)
            ];
    }

}
