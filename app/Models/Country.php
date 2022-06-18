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
        return $this->hasMany(Region::class, 'country_id', 'id')->orderByDesc('region');
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
        return $this->enabled()
            ->get()
            ->mapWithKeys(function($item, $key) {
                return [$item->id => $item->country];
            });
    }

    public function getCountriesContainRegions(){
        return $this->enabled()
            ->whereHas('regions')
            ->get()
            ->mapWithKeys(function($item, $key) {
                return [$item->id => $item->country];
            });
    }

    public function scopeEnabled($query){
        return $query->where('is_enable', true);
    }
}
