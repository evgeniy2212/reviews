<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCongratulationCategory extends Model
{
    protected $fillable = [
        'title',
        'name',
        'slug',
        'is_published',
    ];
}
