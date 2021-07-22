<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupByReview extends Model
{
    const OTHER_GROUP_ALIAS = 'other';

    protected $fillable = [
        'id',
        'name',
        'category_id',
        'is_published'
    ];

    public function category(){
        return $this->belongsTo(CategoryByReview::class, 'category_id', 'id');
    }
}
