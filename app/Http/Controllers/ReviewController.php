<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveReviewRequest;
use App\Models\Comment;
use App\Models\Review;
use App\Models\ReviewCategory;
use App\Models\ReviewFilter;
use App\Models\ReviewImage;
use App\Models\ReviewVideo;
use App\Repositories\ReviewFilterRepository;
use App\Services\ImageService;
use App\Services\ReviewService;
use App\Services\VideoService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $half = 9;

    /**
     * @var ReviewFilterRepository
     */
    protected $reviewFilterRepository;

    public function __construct()
    {
        $this->reviewFilterRepository = app(ReviewFilterRepository::class);
    }

    public function index($slug) {
        $filter_alias = ReviewFilter::DATE_FILTER;
        $sort_alias = ReviewFilter::SORT_BY_FILTER;

        $filter = request()->$filter_alias;
        $sort = request()->$sort_alias;

        $reviews = ReviewService::getFilteredReviews($slug, $filter, $sort);

        $paginateParams = [
            $filter_alias => request()->$filter_alias,
            $sort_alias => request()->$sort_alias,
        ];
        $filters = $this->reviewFilterRepository->getAllCategoryFilters($slug);

        return view('reviews.index', compact('reviews', 'slug', 'filters', 'paginateParams'));
    }

    public function search(Request $request) {
        $filter_alias = ReviewFilter::DATE_FILTER;
        $sort_alias = ReviewFilter::SORT_BY_FILTER;

        $reviews = ReviewService::getFilteredReviews(
            $request->category,
            $request->$filter_alias,
            $request->$sort_alias,
            $request->search
        );

        $paginateParams = [
            'search' => $request->search,
            'category' => $request->category,
            $filter_alias => request()->$filter_alias,
            $sort_alias => request()->$sort_alias,
        ];
        $filters = $this->reviewFilterRepository->getAllCategoryFilters($request->category);

        return view('reviews.index')->with([
            'reviews' =>$reviews,
            'slug' => $request->category,
            'search' => $request->search,
            'search_category' => $request->category,
            'filters' => $filters,
            'paginateParams' => $paginateParams
        ]);
    }

    public function create($slug) {
        $countries = ReviewService::getReviewCountriesBySlug($slug);
        $reviewCategory = new ReviewCategory();
        $reviewCategory = $reviewCategory->whereSlug($slug)->first();
        $categories = ReviewService::getReviewCategoriesBySlug($slug);
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
            'slug',
            'categories'
        ));
    }

    public function save(SaveReviewRequest $request) {
        $request->merge(['user_id' => auth()->user()->id]);
        $review = Review::create($request->all());
        $review->characteristics()->attach($request->characteristics);
        if($request->has('img')){
            $imageInfo = ImageService::uploadImage($request, $review);
            $imageInfo = array_merge($imageInfo, ['review_id' => $review->id]);
            ReviewImage::create($imageInfo);
        }
        if($request->has('video')){
            $videoInfo = VideoService::uploadVideo($request, $review);
            $videoInfo = array_merge($videoInfo, ['review_id' => $review->id]);
            ReviewVideo::create($videoInfo);
        }
        $slug = $request->category_slug;

        return redirect()->route('reviews',['review_item' => $slug]);
    }

    public function reviewReaction(Request $request){
        $review = Review::find($request->id);
        $review->update([$request->reaction => $request->value]);
        $request->user_reaction_increase
            ? auth()->user()->increment('reaction_count', 1)
            : auth()->user()->decrement('reaction_count', 1);
    }

    public function reviewReadMessages(Request $request){
        $review = Review::find($request->review_id);
        $review->messages()->update(['is_read' => true]);
    }
}
