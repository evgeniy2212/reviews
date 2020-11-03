<?php

namespace App\Services;

use App\User;

class CongratsService {
    public static function getUserCongratulation(User $user){
        return asset($user->congratulation->src);
    }
}
