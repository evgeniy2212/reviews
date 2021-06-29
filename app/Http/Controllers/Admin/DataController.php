<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use App\Models\UserCongratulation;
use App\Services\DataService;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $year = request()->year ?? DataService::getDataYearsFilter()->min();
        for($i=1;$i<=12;$i++){
            $data['users'][$i] = [
                'count' => User::whereYear('created_at', '=', $year)
                    ->whereMonth('created_at', '=', $i)
                    ->whereNotNull('email_verified_at')
                    ->count(),
                'percent' => 0,
            ];
            $data['persons'][$i] = [
                'count' => ReviewService::getReviewByYearMonth($year, $i, 'person')->count(),
                'percent' => 0,
            ];
            $data['companies'][$i] = [
                'count' => ReviewService::getReviewByYearMonth($year, $i, 'company')->count(),
                'percent' => 0,
            ];
            $data['goods'][$i] = [
                'count' => ReviewService::getReviewByYearMonth($year, $i, 'goods')->count(),
                'percent' => 0,
            ];
            $data['vacations'][$i] = [
                'count' => ReviewService::getReviewByYearMonth($year, $i, 'vocations')->count(),
                'percent' => 0,
            ];
            $data['congratulations'][$i] = [
                'count' => UserCongratulation::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $i)->count(),
                'percent' => 0,
            ];
        }

        $data['users']['total'] = [
            'total_count' => ReviewService::getReviewByYear($year, 'user')->count(),
            'total_percent' => 0,
        ];
        $data['persons']['total'] = [
            'total_count' => ReviewService::getReviewByYear($year, 'person')->count(),
            'total_percent' => 0,
        ];
        $data['companies']['total'] = [
            'total_count' => ReviewService::getReviewByYear($year, 'company')->count(),
            'total_percent' => 0,
        ];
        $data['goods']['total'] = [
            'total_count' => ReviewService::getReviewByYear($year, 'good')->count(),
            'total_percent' => 0,
        ];
        $data['vacations']['total'] = [
            'total_count' => ReviewService::getReviewByYear($year, 'vacation')->count(),
            'total_percent' => 0,
        ];
        $data['congratulations']['total'] = [
            'total_count' => ReviewService::getReviewByYear($year, 'congratulation')->count(),
            'total_percent' => 0,
        ];
//        dd($data);
        $currentFilter = [
            'year' => $year
        ];
        return view('admin.data', compact('currentFilter', 'data'));
    }
}
