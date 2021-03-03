<?php

namespace App\Services;

use App\Models\CategoryByReview;
use App\Models\Country;
use App\Models\Review;
use App\Models\ReviewCategory;
use App\Models\ReviewFilter;
use App\Models\ReviewImage;
use App\Models\ReviewVideo;
use App\Models\UserCongratulation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewService {
    public static function getReviewCountriesBySlug(string $slug = ''){
        switch ($slug) {
            case 'vocations':
                return (new Country())->getAllCountries();
            default:
                return (new Country())->getCountriesContainRegions();
        }
    }

    public static function getReviewCategoriesBySlug(string $slug){
        switch ($slug) {
            case 'goods':
                $categoryId = ReviewCategory::whereSlug($slug)->first()->id;
                return (new CategoryByReview())->getCategoriesByReviewCategory($categoryId);
            default:
                return (new CategoryByReview())->getCategoriesByReviewCategory();
        }
    }

    public static function getFilteredReviews(
        $category,
        $filter = '',
        $sort = '',
        $search = '',
        $contentFilterType = '',
        $perPage = 5)
    {
        $sort_by = self::getSortMethod($sort);
        $result = collect([]);
        $reviews = collect([]);
        if(empty($contentFilterType)
            ||$contentFilterType == ReviewFilter::REVIEWS_CONTENT_TYPE
            || $contentFilterType == ReviewFilter::ALL_CONTENT_TYPE){

            $reviews = Review::whereHas('category', function ($query) use($category) {
                $query->where('slug', $category);
            })
            ->whereHas('user', function ($query) {
                $query->where('is_blocked', false);
            })
            ->when(!empty($search), function($q) use ($search){
                $q->where(DB::raw('CONCAT_WS(" ", name, second_name)'), '=', "{$search}");
            })
            ->whereIsPublished(true)
            ->when(!empty($filter), function($q) use ($filter){
                $q->whereYear('created_at', $filter);
            })
            ->with(['characteristics:name'])
            ->with(['comments'])
            ->with(['image'])
            ->when(!empty($sort), function($q) use($sort_by, $sort){
                switch($sort){
                    case ReviewFilter::SORT_BY_RATING:
                        $q->orderBy($sort_by, 'DESC');
                        break;
                    case ReviewFilter::SORT_BY_ALPHABET:
                        $q->orderBy($sort_by);
                        break;
                }
            })
            ->when(empty($sort), function($q){
                $q->orderBy('created_at', 'DESC');
            })
                ->get();

            if(!empty($sort)){
                switch ($sort){
                    case ReviewFilter::SORT_BY_RATING:
                        $reviews = $reviews->groupBy(ReviewFilter::SORT_BY_RATING);
                        break;
                    case ReviewFilter::SORT_BY_ALPHABET:
                        $reviews = $reviews->groupBy(function($item, $key){
                            return $item['name'] . $item['second_name'];
                        });
                        break;
                }
            }
        }

        if(!empty($contentFilterType) && (
                $contentFilterType == ReviewFilter::CONGRATULATIONS_CONTENT_TYPE
                || $contentFilterType == ReviewFilter::ALL_CONTENT_TYPE
            ))
        {
            $congratulations = UserCongratulation::whereIsPublished(true)
                ->when(!empty($filter), function($q) use ($filter){
                    $q->whereYear('created_at', $filter);
                })
                ->orderBy('created_at', 'DESC')
                ->get();
            if(!empty($reviews) && !empty($sort)){
                $congratulations = $congratulations->groupBy('created_at');
                foreach($reviews as $key => $review){
                    $result = $result->concat($review);
                    $congratulations->whenNotEmpty(function (&$congratulations) use (&$result){
                        $result = $result->concat($congratulations->shift());
                    });
                }
                if($congratulations->isNotEmpty()){
                    $congratulations->map(function ($items, $key) use(&$result){
                        foreach($items as $item){
                            $result = $result->concat([$item]);
                        }
                    });
                }
            } elseif (!empty($reviews) && empty($sort)){
                $result = $reviews->concat($congratulations);
                $result = $result->sortByDesc(function ($product, $key) {
                    return Carbon::createFromFormat('m-d-Y', $product['created_at']);
                });
            }
            else {
                $result = $congratulations;
            }
        } else {
            if($reviews->isNotEmpty()){
                $reviews->map(function ($items, $key) use(&$result) {
                    if($items instanceof Collection){
                        foreach ($items as $item) {
                            $result = $result->concat([$item]);
                        }
                    } else {
                        $result = $result->concat([$items]);
                    }
                });
            }
        }
        return $result->paginate($perPage);
    }

    public static function getFilteredReviewsRating($category, $filter = '', $search = '') {
        $result = Review::whereHas('category', function ($query) use($category) {
            $query->where('slug', $category);
        })
        ->whereHas('user', function ($query) {
            $query->where('is_blocked', false);
        })
        ->where(DB::raw('CONCAT_WS(" ", name, second_name)'), '=', "{$search}")
        ->whereIsPublished(true)
        ->when(!empty($filter), function($q) use ($filter){
            $q->whereYear('created_at', $filter);
        })
        ->avg('rating');

        return $result;
    }

    public static function getUserFilteredReviews($user_id, $filter = '', $sort = '', $search = '', $perPage = 10) {
        $sort_by = self::getSortMethod($sort);

        $result = Review::whereUserId($user_id)
            ->where(DB::raw('CONCAT_WS(" ", name, second_name)'), 'like', "%{$search}%")
            ->when(!empty($filter), function($q) use ($filter){
                $q->whereYear('created_at', $filter);
            })
            ->with(['characteristics:name'])
            ->with(['comments'])
            ->with(['image'])
            ->when(!empty($sort), function($q) use($sort_by){
                $q->orderBy($sort_by);
            })
            ->when(empty($sort), function($q){
                $q->orderBy('created_at', 'DESC');
            })
            ->where(function($q){
                $q->whereIsPublished(true)
                    ->orWhere(function($query){
                        $query->whereIsPublished(false)
                            ->whereHas('complains');
                    });
            })
            ->paginate($perPage);

        return $result;
    }

    public static function getAdminUserFilteredReviews($user_id, $filters = [], $sort = '', $search = '', $perPage = 10) {
        $reviewFilters = self::getFilterMethod($filters);

        $result = Review::whereUserId($user_id)
            ->where(DB::raw('CONCAT_WS(" ", name, second_name)'), 'like', "%{$search}%")
            ->when(!empty($reviewFilters), function($q) use ($reviewFilters){
                foreach ($reviewFilters as $filter) {
                    $key = array_key_first($filter);
                    if(!empty($filter)){
                        switch ($key){
                            case 'from':
                                $q->where('created_at', '>=', Carbon::parse($filter['from'])->toDateString());
                                break;
                            case 'to':
                                $q->whereDate('created_at', '<=', Carbon::parse($filter['to'])->toDateString());
                                break;
                            default:
                                $q->where($key, $filter[$key]);
                        }
                    }
                }
            })
            ->where(function($q){
                $q->whereIsPublished(true)
                    ->orWhere(function($query){
                        $query->whereIsPublished(false)
                            ->whereHas('complains');
                    });
            })
            ->with(['characteristics:name'])
            ->with(['comments'])
            ->with(['image'])
            ->when(empty($sort), function($q){
                $q->orderBy('created_at', 'DESC');
            })
            ->paginate($perPage);

        return $result;
    }

    protected static function getSortMethod($sort = ''){
        if($sort){
            switch ($sort){
                case ReviewFilter::SORT_BY_RATING:
                    $sort = ReviewFilter::SORT_BY_RATING;
                    break;
                case ReviewFilter::SORT_BY_ALPHABET:
                    $sort = 'name';
                    break;
            }
        } else {
            $sort = '';
        }

        return $sort;
    }

    public static function getAdminFilteredReviews($filters = [], $search = '', $perPage = 10) {
        $reviewFilters = self::getFilterMethod($filters);
        $result = Review::when(!empty($reviewFilters), function($q) use ($reviewFilters){
            foreach ($reviewFilters as $filter) {
                $key = array_key_first($filter);
                if(!empty($filter)){
                    switch ($key){
                        case 'from':
                            $q->where('created_at', '>=', Carbon::parse($filter['from'])->toDateString());
                            break;
                        case 'to':
                            $q->whereDate('created_at', '<=', Carbon::parse($filter['to'])->toDateString());
                            break;
                        default:
                            $q->where($key, $filter[$key]);
                    }
                }
            }
        })
        ->where(function($q){
            $q->whereIsPublished(true)
                ->orWhere(function($query){
                    $query->whereIsPublished(false)
                        ->whereHas('complains');
                });
        })
        ->where(DB::raw('CONCAT_WS(" ", name, second_name)'), 'like', "%{$search}%")
            ->with(['characteristics:name'])
            ->with(['comments'])
            ->with(['image'])
            ->orderBy('created_at', 'DESC')
            ->paginate($perPage);

        return $result;
    }

    protected static function getFilterMethod($filters = []){
        $result = [];
        foreach($filters as $key => $filter){
            $result[] = Review::ADMIN_FILTERS[$key][$filters[$key]] ?? [$key => $filter];
        }

        return $result;
    }

    public static function difToMinRangeDate(){
        return Carbon::now()->diffInDays(Review::min('created_at'));
    }

    public static function difToMaxRangeDate(){
        return Carbon::now()->diffInDays(Review::max('created_at'));
    }

    public static function getSameLogoReviews($category, $search){
        return Review::whereHas('category', function ($query) use($category) {
            $query->where('slug', $category);
        })->where(
            DB::raw('CONCAT_WS(" ", name, second_name)'), '=', "{$search}"
        )->get();
    }

    public static function createReview(Request $request){
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

        return $review;
    }
}
