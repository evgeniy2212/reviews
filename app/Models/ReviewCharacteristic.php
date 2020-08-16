<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewCharacteristic extends Model
{
    protected $fillable = [
        'id',
        'review_category_id',
        'name',
        'is_positive',
        'is_published'
    ];

    public function category(){
        return $this->belongsTo(ReviewCategory::class, 'review_category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reviews()
    {
        return $this->belongsToMany(Review::class);
    }
}
