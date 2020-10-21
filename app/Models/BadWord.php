<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BadWord extends Model
{
    protected $fillable = [
        'id',
        'review_category_id',
        'word'
    ];

    public function category(){
        return $this->belongsTo(ReviewCategory::class, 'review_category_id', 'id');
    }
}
