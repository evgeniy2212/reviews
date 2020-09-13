<?php

namespace App;

use App\Models\Comment;
use App\Models\Region;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    const NAME_SIGN = 1;
    const NICKNAME_SIGN = 2;
    const DEFAULT_SIGN = 3;

    const DEFAULT_NAME = 'User';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'last_name',
        'nickname',
        'city',
        'region_id',
        'zip_code',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function region(){
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    /**
     * Get the comments for the reviews.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function getFullNameAttribute(){
        return $this->name . ' ' . $this->last_name;
    }

    public function getUserSign($userSign){
        switch ($userSign) {
            case self::NAME_SIGN:
                $result = $this->full_name;
                break;
            case self::NICKNAME_SIGN:
                $result = $this->nickname;
                break;
            case self::DEFAULT_SIGN:
                $result = self::DEFAULT_NAME;
                break;
            default: $result = self::DEFAULT_NAME;
        }

        return $result;
    }
}
