<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetInTouchRequest;
use App\Notifications\GetInTouch;
use App\User;
use Illuminate\Support\Facades\Log;

class InfoController extends Controller
{
    public function termOfService(){
        return view('term_of_service');
    }

    public function privacyPolicy(){
        return view('privacy_policy');
    }

    public function getInTouch(){
        return view('get_in_touch');
    }

    public function termOfConditions(){
        return view('term_of_conditions');
    }

    public function sendTouchInfo(GetInTouchRequest $request){
        User::whereIsAdmin(true)->first()->notify(new GetInTouch());

        return redirect()->route('home');
    }
}
