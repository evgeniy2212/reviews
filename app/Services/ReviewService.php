<?php

namespace App\Services;

use App\Models\CategoryByReview;
use App\Models\Country;
use App\Models\Review;
use App\Models\ReviewCategory;
use App\Models\ReviewFilter;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReviewService {
    public static function getReviewCountriesBySlug(string $slug){
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

    public static function getFilteredReviews($category, $filter = '', $sort = '', $search = '', $perPage = 5) {
        $sort_by = self::getSortMethod($sort);

        $result = Review::whereHas('category', function ($query) use($category) {
                $query->where('slug', $category);
            })
            ->whereHas('user', function ($query) {
                $query->where('is_blocked', false);
            })
            ->when(!empty($search), function($q) use ($search){
                $q->where(DB::raw('CONCAT_WS(" ", name, second_name)'), '=', "{$search}");
            })
//            ->where(DB::raw('CONCAT_WS(" ", name, second_name)'), 'like', "%{$search}%")
            ->whereIsPublished(true)
            ->when(!empty($filter), function($q) use ($filter){
                $q->whereYear('created_at', $filter);
            })
            ->with(['characteristics:name'])
            ->with(['comments'])
            ->with(['image'])
            ->when(!empty($sort), function($q) use($sort_by){
                $q->orderBy($sort_by, 'DESC');
            })
            ->when(empty($sort), function($q){
                $q->orderBy('created_at', 'DESC');
            })
            ->paginate($perPage);

        return $result;
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
            ->with(['characteristics:name'])
            ->with(['comments'])
            ->with(['image'])
//            ->when(!empty($sort), function($q) use($sort_by){
//                $q->orderBy($sort_by);
//            })
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
        ->where(DB::raw('CONCAT_WS(" ", name, second_name)'), 'like', "%{$search}%")
//            ->when(!empty($filter), function($q) use ($filter){
//                $q->whereYear('created_at', $filter);
//            })
            ->with(['characteristics:name'])
            ->with(['comments'])
            ->with(['image'])
//            ->when(!empty($sort), function($q) use($sort_by){
//                $q->orderBy($sort_by);
//            })
//            ->when(empty($sort), function($q){
//                $q->orderBy('created_at', 'DESC');
//            })
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
}
