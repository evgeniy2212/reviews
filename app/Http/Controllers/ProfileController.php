<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\PersonalInfoRequest;
use App\Models\Country;
use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @var ProfileRepository
     */
    private $profileRepository;

    public function __construct()
    {
        $this->profileRepository = app(ProfileRepository::class);
    }

    public function info(){
        $user_info = $this->profileRepository->getProfileInfo();
        $countries = (new Country())->getCountries();

        return view('profile.personal_info', compact('user_info', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePersonalInfo(PersonalInfoRequest $request)
    {
        $profile = $this->profileRepository->getProfileInfo();
        $personal_info = $request->all();

        $result = $profile->update($personal_info);

        if($result){
            return redirect()->route('profile-info');
        } else {
            return back()->withErrors(['msg' => 'Updating ERROR!'])->withInput();
        }
    }
}
