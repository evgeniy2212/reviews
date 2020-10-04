<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewFilter extends Model
{
    const DATE_FILTER = 'filter-by-date';
    const SORT_BY_FILTER = 'sort-by';

    const SORT_BY_RATING = 'rating';
    const SORT_BY_ALPHABET = 'alphabet';

    protected $fillable = [
        'name',
        'slug',
        'review_category_id'
    ];

    public function category() {
        return $this->belongsTo(ReviewCategory::class, 'review_category_id', 'id');
    }

    public function filter_values(){
        return $this->hasMany(ReviewFilterValue::class, 'filter_id', 'id')->orderByDesc('value');
    }

    public function getFormatNameAttribute(){
        return ucwords($this->name);
    }
}
