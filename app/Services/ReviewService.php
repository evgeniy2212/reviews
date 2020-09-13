<?php

namespace App\Services;

use App\Models\CategoryByReview;
use App\Models\Country;
use App\Models\ReviewCategory;

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
}
