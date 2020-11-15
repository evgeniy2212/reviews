<?php

namespace App\Services;

use App\Models\Congratulation;
use App\User;
use Illuminate\Support\Facades\Log;

class CongratsService {
    public static function getUserCongratulation(User $user){
        return asset($user->congratulation->src);
    }

    public static function checkUserCongratulation(User $user){
        switch ($count = $user->reviews_count){
            case ($count >= Congratulation::FIRST_CONGRATULATION
                && $count < Congratulation::SECOND_CONGRATULATION):
                return Congratulation::firstWhere('name', 'first')->id;
                break;
            case ($count >= Congratulation::SECOND_CONGRATULATION
                && $count < Congratulation::THIRD_CONGRATULATION_CONGRATULATION):
                return Congratulation::firstWhere('name', 'second')->id;
                break;
            case ($count >= Congratulation::THIRD_CONGRATULATION
                && $count < Congratulation::FOURTH_CONGRATULATION):
                return Congratulation::firstWhere('name', 'third')->id;
                break;
            case ($count >= Congratulation::FOURTH_CONGRATULATION
                && $count < Congratulation::FIFTH_CONGRATULATION):
                return Congratulation::firstWhere('name', 'fourth')->id;
                break;
            case ($count >= Congratulation::FIFTH_CONGRATULATION):
                return Congratulation::firstWhere('name', 'fifth')->id;
                break;
            default:
                return Congratulation::firstWhere('name', 'default')->id;
        }
    }
}
