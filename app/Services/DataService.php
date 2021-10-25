<?php

namespace App\Services;

use App\Models\Review;
use App\Models\User;
use App\Models\UserCongratulation;
use Carbon\Carbon;

class DataService {
    public static function getDataYearsFilter() {
        $years = collect([]);
        $filterYears = collect([]);
        $currentYear = Carbon::now();
        $years->push(Carbon::parse(Review::oldest()->first()->created_at)->format('Y-m-d'));
        $years->push(Carbon::parse(UserCongratulation::oldest()->first()->created_at)->format('m-d-Y'));
        $years->push(Carbon::parse(User::oldest()->first()->created_at)->format('Y-m-d'));
        $diffYears = $currentYear->diffInYears($years->min()) + 1;
        $minYear = Carbon::parse($years->min())->format('Y');
        for($i=1; $i<=$diffYears;$i++){
            $filterYears->push($minYear++);
        }

        return $filterYears;
    }
}
