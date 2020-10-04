<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'review_id',
        'body',
        'likes',
        'dislikes',
    ];

    public function review(){
        return $this->belongsTo(Review::class, 'review_id', 'id');
    }
}
