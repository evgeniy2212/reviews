<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmSaveReviewRequest;
use App\Http\Requests\SaveReviewRequest;
use App\Http\Requests\SearchRequest;
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

    public function show(Review $review) {
        $reviews = collect([])->merge([$review]);

        return view('reviews.show_review', compact('reviews'));
    }

    public function search(SearchRequest $request) {
        $filter_alias = ReviewFilter::DATE_FILTER;
        $sort_alias = ReviewFilter::SORT_BY_FILTER;

        $reviews = ReviewService::getFilteredReviews(
            $request->category,
            $request->$filter_alias,
            $request->$sort_alias,
            $request->search
        );

        $avgRating = ReviewService::getFilteredReviewsRating(
            $request->category,
            $request->$filter_alias,
            $request->search
        );

        $paginateParams = [
            'search' => $request->search,
            'category' => $request->category,
            $filter_alias => request()->$filter_alias,
            $sort_alias => request()->$sort_alias,
        ];
        $filters = $this->reviewFilterRepository->getAllCategoryFilters($request->category);
        $starPercent = round($avgRating * 100 / 5.0);

        return view('reviews.index')->with([
            'reviews' =>$reviews,
            'slug' => $request->category,
            'search' => $request->search,
            'search_category' => $request->category,
            'filters' => $filters,
            'paginateParams' => $paginateParams,
            'avgRating' => $avgRating,
            'starPercent' => $starPercent
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
        if($request->has('category_slug')
            && $request->category_slug == 'person'
            && auth()->user()->isUserReviewAlreadyExist(
                $request->review_category_id,
                $request->name,
                $request->region_id,
                $request->city,
                $request->second_name)
        ) {
            return redirect()->back()->withErrors(['msg' => __('service/message.review_already_exist')]);
        }
        $request->merge(['is_published' => true]);
        ReviewService::createReview($request);
        $slug = $request->category_slug;

        return redirect()->route('reviews',['review_item' => $slug])->with(['success_review_creating' => 'Review Created']);
    }

    public function presaving(SaveReviewRequest $request) {
        if($request->has('category_slug')
            && $request->category_slug == 'person'
            && auth()->user()->isUserReviewAlreadyExist(
                $request->review_category_id,
                $request->name,
                $request->region_id,
                $request->city,
                $request->second_name)
        ) {
            return redirect()->back()->withErrors(['msg' => __('service/message.review_already_exist')]);
        }
        $request->merge(['is_published' => false]);
        $review = ReviewService::createReview($request);

        return redirect()->route('presavingShow-review', ['review' => $review->id]);
    }

    public function presavingShow(Review $review) {
        return view('reviews.presaving_show_review', compact('review'));
    }

    public function confirmSaving(ConfirmSaveReviewRequest $request) {
        $review = Review::findOrFail($request->review_id);
        $review->is_published = true;
        $review->save();
        $slug = $review->category->slug;

        return redirect()->route('reviews',['review_item' => $slug])->with(['success_review_creating' => 'Review Created']);
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
