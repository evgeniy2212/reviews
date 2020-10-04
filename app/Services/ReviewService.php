<?php

namespace App\Services;

use App\Models\CategoryByReview;
use App\Models\Country;
use App\Models\Review;
use App\Models\ReviewCategory;
use App\Models\ReviewFilter;
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
            ->where(DB::raw('CONCAT_WS(" ", name, second_name)'), 'like', "%{$search}%")
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

    public static function getUserFilteredReviews($filter = '', $sort = '', $search = '', $perPage = 5) {
        $sort_by = self::getSortMethod($sort);

        $result = Review::whereUserId(auth()->user()->id)
            ->where(DB::raw('CONCAT_WS(" ", name, second_name)'), 'like', "%{$search}%")
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
}
