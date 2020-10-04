<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'review',
        'region_id',
        'country_id',
        'city',
        'review_category_id',
        'category_by_review_id',
        'review_group_id',
        'email',
        'name',
        'second_name',
        'rating',
        'likes',
        'dislikes',
        'user_sign',
        'is_published',
        'created_at'
    ];

    public function category(){
        return $this->belongsTo(ReviewCategory::class, 'review_category_id', 'id');
    }

    public function region(){
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category_group(){
        return $this->belongsTo(GroupByReview::class, 'review_group_id', 'id');
    }

    public function category_by_review(){
        return $this->belongsTo(CategoryByReview::class, 'category_by_review_id', 'id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'review_id', 'id');
    }

    public function messages(){
        return $this->hasMany(Message::class, 'review_id', 'id');
    }

    public function image(){
        return $this->hasOne(ReviewImage::class, 'review_id', 'id');
    }

    public function video(){
        return $this->hasOne(ReviewVideo::class, 'review_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function characteristics()
    {
        return $this->belongsToMany(ReviewCharacteristic::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m-d-Y');
    }

    public function getFullNameAttribute(){
        return $this->second_name
            ? $this->name . ' ' . $this->second_name
            : $this->name;
    }

    public function isHasUnreadMessages(){
        return $this->messages()
            ->where('is_read', false)
            ->count();
    }
}
