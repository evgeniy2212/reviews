<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Message;
use App\Models\Review;
use App\Observers\CommentObserver;
use App\Observers\MessageObserver;
use App\Observers\ReviewObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

        Review::observe(ReviewObserver::class);
        Comment::observe(CommentObserver::class);
        Message::observe(MessageObserver::class);
    }
}
