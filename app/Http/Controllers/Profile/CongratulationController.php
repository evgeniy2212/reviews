<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\DefaultImage;
use App\Models\ReviewFilter;
use App\Models\UserCongratulation;
use App\Http\Repositories\ReviewFilterRepository;
use App\Services\UserCongratulationService;
use Illuminate\Http\Request;

class CongratulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filter_alias = ReviewFilter::DATE_FILTER;
        $sort_alias = ReviewFilter::SORT_BY_FILTER;

        $filter = request()->$filter_alias;
        $sort = request()->$sort_alias;
        $user_id = auth()->user()->id;
        $congratulations = UserCongratulationService::getUserFilteredCongratulations($user_id, $filter, $sort);
        $filters = (new ReviewFilterRepository())->getAllCategoryFilters();
        $paginateParams = [
            $filter_alias => request()->$filter_alias,
            $sort_alias => request()->$sort_alias,
        ];

        return view('profile.congratulation.index', compact('congratulations', 'filters', 'paginateParams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $countries = UserCongratulationService::getCountries();
        $categories = UserCongratulationService::getCategories();
        $defaultImages = DefaultImage::all();

        return view('profile.congratulation.create', compact(
            'countries',
            'categories',
            'defaultImages'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UserCongratulationService::createCongratulation($request);

        return  redirect()->back()->withSuccess([__('service/profile.congratulation.request_success')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UserCongratulation  $congratulation
     */
    public function destroy(UserCongratulation $congratulation)
    {
        $congratulation->image()->delete();
        $congratulation->delete();

        return  redirect()->back()->withSuccess([__('service/profile.congratulation.delete_success')]);
    }
}
