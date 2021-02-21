<?php

namespace App\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    const MAX_BANNERS_COUNT = 11;

    protected $fillable = [
        'id',
        'banner_category_id',
        'user_id',
        'src',
        'name',
        'original_name',
        'title',
        'link',
        'is_published',
        'from',
        'to',
    ];

//    protected $dates = ['created_at'];
//
//    protected $casts = [
//        'created_at' => 'date:d/m/Y',
////        'to' => 'datetime:d/m/Y',
//    ];
////
//    protected $dateFormat = 'Y-m-d';

    public function category(){
        return $this->belongsTo(BannerCategory::class, 'banner_category_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function setFromAttribute($value)
    {
        $this->attributes['from'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function setToAttribute($value)
    {
        $this->attributes['to'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getImageUrl()
    {
        return asset('storage/' . $this->src);
    }
}
