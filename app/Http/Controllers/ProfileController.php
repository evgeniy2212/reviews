<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @var LessonRepository
     */
    private $profileRepository;

    public function __construct()
    {
        $this->profileRepository = app(ProfileRepository::class);
    }

    public function info(){
        $user_info = $this->profileRepository->getProfileInfo();
        $countries = Country::all()->pluck('country', 'id');

        return view('profile.personal_info', compact('user_info', 'countries'));
    }


}
