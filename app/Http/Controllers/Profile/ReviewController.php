<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Review;
use App\Models\ReviewCategory;
use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;

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

    public function index() {
        $reviews = $this->reviewRepository->getAllUserReviews();

        return view('profile.reviews', compact('reviews', 'slug'));
    }

    public function edit($review)
    {
        $review = Review::with(['category', 'region', 'characteristics'])
            ->findOrFail($review);

        $countries = (new Country())->getCountriesContainRegions();
        $positiveCharacteristics = $review->category
            ->getCharacteristicsByCategorySlug($review->category->slug, true)
            ->chunk($this->half);
        $negativeCharacteristics = $review->category
            ->getCharacteristicsByCategorySlug($review->category->slug, false)
            ->chunk($this->half);
        $checkedCharacteristics = $review->characteristics->pluck('id');
dd($review);

        return view('reviews.edit', compact(
            'countries',
            'positiveCharacteristics',
            'negativeCharacteristics',
            'review',
            'checkedCharacteristics'
        ));
    }

    public function update(Request $request, Review $review)
    {
        $review->update($request->all());
        $review->characteristics()->sync($request->characteristics);

        return redirect()->route('profile-reviews.index');
    }

    public function destroy($review)
    {
        Review::destroy($review);

        return back();
    }
}
