<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class BadWord extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = [
        'id',
        'review_category_id',
    ];

    public $translatedAttributes = [
        'word'
    ];

    public $with = [
        'translations',
    ];

    public function category(){
        return $this->belongsTo(ReviewCategory::class, 'review_category_id', 'id');
    }
}
