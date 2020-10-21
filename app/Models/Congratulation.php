<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Congratulation extends Model
{
    protected $fillable = [
        'src',
        'name',
        'original_name',
        'alt',
        'id'
    ];

    /**
     * Get user for the reviews.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'congratulation_id', 'id');
    }
}
