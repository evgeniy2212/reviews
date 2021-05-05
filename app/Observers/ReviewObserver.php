<?php

namespace App\Observers;

use App\Mail\ReviewNotificationEmail;
use App\Models\Review;
use App\Notifications\ReviewCommentUpdate;
use App\Notifications\ReviewCreateNotification;
use App\Services\CongratsService;
use Illuminate\Support\Facades\Mail;

class ReviewObserver
{
    /**
     * Handle the review "created" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function created(Review $review)
    {
        $review->user()->update(['congratulation_id' => CongratsService::checkUserCongratulation($review->user)]);

        if($review->email){
            Mail::to($review->email)
                ->send(
                    new ReviewNotificationEmail($review)
                );;
        }
    }

    /**
     * Handle the review "updated" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function updated(Review $review)
    {
        $review->user->notify(new ReviewCommentUpdate());
    }

    /**
     * Handle the review "deleted" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function deleted(Review $review)
    {
        //
    }

    /**
     * Handle the review "restored" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function restored(Review $review)
    {
        //
    }

    /**
     * Handle the review "force deleted" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function forceDeleted(Review $review)
    {
        //
    }

    /**
     * @param \App\Models\Review  $product
     */
    public function creating(Review $review){
//        $review->is_published = true;
    }

}
