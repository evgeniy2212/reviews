<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserImportantDateType extends Model
{
    protected $fillable = [
        'title',
        'name',
        'slug',
        'is_published',
    ];
}
