<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\UserCongratulation;
use App\Models\User;
use App\Services\UserCongratulationService;
use Illuminate\Http\Request;

class UserCongratulationController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $congratulationFilter = array_intersect_key(request()->all(), UserCongratulation::ADMIN_FILTERS);
        $congratulations = UserCongratulationService::getAdminFilteredCongratulations($congratulationFilter);
        $paginateParams = $congratulationFilter;

        return view(
            'admin.congratulations',
            compact(
                'congratulations',
                'paginateParams')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $congratulationFilter = array_intersect_key(request()->all(), Review::ADMIN_FILTERS);
        $congratulations = UserCongratulationService::getUserFilteredCongratulations($user->id, false, $congratulationFilter);
        $paginateParams = $congratulationFilter;

        return view('admin.user_congratulations', compact('congratulations', 'paginateParams', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $congratulation = UserCongratulation::findOrFail($id);
        $congratulation->update($request->all());

        return redirect()->back()->withSuccess([__('service/admin.congratulation_updated_successfully')]);
    }

    public function search(Request $request) {
        $congratulationFilter = array_intersect_key(request()->all(), UserCongratulation::ADMIN_FILTERS);
        $congratulations = UserCongratulationService::getAdminFilteredCongratulations($congratulationFilter, $request->search);
        $paginateParams = array_merge($congratulationFilter, ['search' => $request->search]);

        return view('admin.congratulations', compact('congratulations', 'paginateParams'));
    }
}
