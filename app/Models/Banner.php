<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'id',
        'banner_category_id',
        'user_id',
        'src',
        'name',
        'original_name',
        'title',
        'is_published',
        'from',
        'to',
    ];

    public function category(){
        return $this->belongsTo(BannerCategory::class, 'banner_category_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
