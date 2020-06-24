<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'id',
        'country',
        'is_enable'
    ];

    public function regions(){
        return $this->hasMany(Region::class, 'country_id', 'id');
    }
}
