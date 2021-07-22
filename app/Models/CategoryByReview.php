<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryByReview extends Model
{
    protected $fillable = [
        'id',
        'review_category_id',
        'name',
        'is_published'
    ];

    public function review_category(){
        return $this->belongsTo(ReviewCategory::class, 'review_category_id', 'id');
    }

    public function groups(){
        return $this->hasMany(GroupByReview::class, 'category_id', 'id')->orderBy('name');
    }

    public function getGroupsByCategory($id){
        $sorted = $this->whereId($id)
            ->first()
            ->groups()
            ->whereIsPublished(true)
            ->get(['name', 'id']);
        $sorted = $sorted->sort(function ($a, $b) {
            return strtolower($a->name) == GroupByReview::OTHER_GROUP_ALIAS ? -1 : 1;
        });
        return $sorted->values();
    }

    public function getAllCategories(){
        return $this->all()
            ->pluck('name', 'id');
    }

    public function getCategoriesByReviewCategory($id = null){
        return $this->whereReviewCategoryId($id)
            ->pluck('name', 'id');
    }
}
