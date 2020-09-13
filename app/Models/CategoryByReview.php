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
        return $this->hasMany(GroupByReview::class, 'category_id', 'id');
    }

    public function getGroupsByCategory($id){
        return $this->whereId($id)
            ->first()
            ->groups()
            ->get(['name', 'id'])
            ->toArray();
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
