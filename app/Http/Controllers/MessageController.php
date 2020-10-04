<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveMessageRequest;
use App\Http\Resources\MessageSendResource;
use App\Models\Message;
use App\Models\Review;

class MessageController extends Controller
{
    public function addReviewMessage(SaveMessageRequest $request){
        $request->merge(['from' => auth()->user()->id]);
        $toUser = Review::find($request->review_id)->user->id;
        $request->merge(['to' => $toUser]);
        $message = Message::create($request->all());

        return new MessageSendResource([
            $message
        ]);
    }
}
