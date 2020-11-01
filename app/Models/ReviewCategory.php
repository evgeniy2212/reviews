<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewCategory extends Model
{
    protected $fillable = [
        'id',
        'title',
        'slug',
        'is_published',
        'enable_low_rating'
    ];

    public function characteristics(){
        return $this->hasMany(ReviewCharacteristic::class, 'review_category_id', 'id');
    }

    public function category_by_reviews(){
        return $this->hasMany(CategoryByReview::class, 'review_category_id', 'id');
    }

    public function filters() {
        return $this->hasMany(ReviewFilter::class, 'review_category_id', 'id')->orderByDesc('value');
    }

    public function getCharacteristicsByCategorySlug($slug, $is_positive = null){
        return $this->whereSlug($slug)
            ->first()
            ->characteristics()
            ->where('is_published', '=', true)
            ->when(!is_null($is_positive), function ($q) use($is_positive) {
                return $q->where('is_positive', $is_positive);
            })
            ->get(['name', 'id', 'is_positive']);
    }

    public function getLowerTitleAttribute(){
        return strtolower($this->title);
    }
}
