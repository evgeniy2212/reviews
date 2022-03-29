<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Resources\Json\JsonResource;

class UserChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->user->id,
            'name'       => $this->user->name,
            'email'      => $this->user->email,
            'type'       => $this->user->type,
            'device'     => $this->user->device,
//            'share'      => $this->user->share,
//            'bio'        => $this->user->bio,
//            'lat'        => $this->user->lat,
//            'lng'        => $this->user->lng,
//            'avatar'     => [
//                'xs' => $this->user->getAvatar('xs'),
//                'md' => $this->user->getAvatar('md'),
//                'sm' => $this->user->getAvatar('sm'),
//            ],
//            'is_blocked'  => auth()->user()->isBlockedByUser($this->user->id),
//            'is_blocked_by_user'  => $this->user->isBlockedByUser(auth()->id()),
        ];
    }
}
