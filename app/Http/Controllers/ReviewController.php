<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveReviewRequest;
use App\Models\Country;
use App\Models\Review;
use App\Models\ReviewCategory;
use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    protected $half = 9;

    /**
     * @var ReviewRepository
     */
    protected $reviewRepository;

    public function __construct()
    {
        $this->reviewRepository = app(ReviewRepository::class);
    }

    public function index($slug) {
        $reviews = $this->reviewRepository->getAllWithPaginateByCategory($slug);

        return view('reviews.index', compact('reviews', 'slug'));
    }

    public function create($slug) {
        $countries = (new Country())->getCountries();
        $reviewCategory = new ReviewCategory();
        $positiveCharacteristics = $reviewCategory
            ->getCharacteristicsByCategorySlug($slug, true)
            ->chunk($this->half);
        $negativeCharacteristics = $reviewCategory
            ->getCharacteristicsByCategorySlug($slug, false)
            ->chunk($this->half);
        $reviewCategory = $reviewCategory->whereSlug($slug)->first();

        return view('reviews.create', compact(
            'countries',
            'positiveCharacteristics',
            'negativeCharacteristics',
            'reviewCategory',
            'slug'
        ));
    }

    public function save(SaveReviewRequest $request) {
        $request->merge(['user_id' => auth()->user()->id]);
        $review = Review::create($request->all());
        $review->characteristics()->attach($request->characteristics);
        $slug = $request->category_slug;

        return redirect()->route('reviews',['review_item' => $slug]);
    }

    public function reviewReaction(Request $request){
        Review::whereId($request->id)
            ->update([$request->reaction => $request->value]);
    }
}
