<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Repositories\ReviewFilterRepository;
use App\Repositories\ReviewRepository;

class MessageController extends Controller
{
    /**
     * @var ReviewFilterRepository
     */
    protected $reviewFilterRepository;

    /**
     * @var ReviewRepository
     */
    protected $reviewRepository;

    public function __construct()
    {
        $this->reviewFilterRepository = app(ReviewFilterRepository::class);
        $this->reviewRepository = app(ReviewRepository::class);
    }

    public function index() {
        $reviews = $this->reviewRepository->getAllUserReviewWithMessages();
//dd($reviews);
        return view('profile.messages', compact('reviews'));
    }
}