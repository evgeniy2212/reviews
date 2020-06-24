<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'id',
        'region',
        'region_naming',
        'country_id',
        'is_enable'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
