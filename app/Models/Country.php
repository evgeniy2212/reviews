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

    public function reviews(){
        return $this->hasMany(Review::class, 'country_id', 'id');
    }

    public function getRegionsByCountry($id){
        return $this->whereId($id)
            ->first()
            ->regions()
            ->get(['region', 'region_naming', 'id'])
            ->toArray();
    }

    public function getAllCountries(){
        return $this->all()
            ->pluck('country', 'id');
    }

    public function getCountriesContainRegions(){
        return $this->whereHas('regions')
            ->pluck('country', 'id');
    }
}
