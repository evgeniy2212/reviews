<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerCategory extends Model
{
    const FILTERS = [
        'ACTIVITY' => [
            'ALL' => [],
            'PUBLISHED' => ['is_published' => true],
            'UNPUBLISHED' => ['is_published' => false],
        ]
    ];

    protected $fillable = [
        'id',
        'title',
        'slug',
        'is_published'
    ];

    public function banners() {
        return $this->hasMany(Banner::class, 'banner_id', 'id');
    }
}
