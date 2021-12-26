<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserCongratulation;
use App\Services\DataService;
use App\Services\ReviewService;
use Carbon\Carbon;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        $year = request()->year ?? DataService::getDataYearsFilter()->min();
        for($i=1;$i<=12;$i++){
            if($i == 1){
                $test = Carbon::create($year-1, 12)->format('Y-m-d H:i:s');
                $days = Carbon::parse($test)->daysInMonth;
                $date = Carbon::create($year-1, 12, $days)->format('Y-m-d H:i:s');

                $beforeMonthCnt = User::where('created_at', '<=', $date)
                    ->whereNotNull('email_verified_at')
                    ->count();

                $test = Carbon::create($year, $i)->format('Y-m-d H:i:s');
                $days = Carbon::parse($test)->daysInMonth;
                $date = Carbon::create($year, $i, $days)->format('Y-m-d H:i:s');

                $lastMonthCnt = User::where('created_at', '<=', $date)
                    ->whereNotNull('email_verified_at')
                    ->count();

                $count = User::whereYear('created_at', '=', $year)
                    ->whereMonth('created_at', '=', $i)
                    ->whereNotNull('email_verified_at')
                    ->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)) - 100, 1);
                if($beforeMonthCnt == 0 && $lastMonthCnt == 1){
                    $percent = 100;
                }
                $data['users'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 0 ? $percent : 0,
                ];

                $beforeMonthCnt = ReviewService::getReviewRangeByYearMonth($year-1, 12, 'person')->count();
                $lastMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $i, 'person')->count();
                $count = ReviewService::getReviewByYearMonth($year, $i, 'person')->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)) - 100, 1);
                if($beforeMonthCnt == 0 && $lastMonthCnt == 1){
                    $percent = 100;
                } else if($beforeMonthCnt === $lastMonthCnt){
                    $percent = 0;
                }
                $data['persons'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 0 ? $percent : 0,
                ];
                $beforeMonthCnt = ReviewService::getReviewRangeByYearMonth($year-1, 12, 'company')->count();
                $lastMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $i, 'company')->count();
                $count = ReviewService::getReviewByYearMonth($year, $i, 'company')->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)) - 100, 1);
                if($beforeMonthCnt == 0 && $lastMonthCnt == 1){
                    $percent = 100;
                }else if($beforeMonthCnt === $lastMonthCnt){
                    $percent = 0;
                }
                $data['companies'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 0 ? $percent : 0,
                ];
                $beforeMonthCnt = ReviewService::getReviewRangeByYearMonth($year-1, 12, 'goods')->count();
                $lastMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $i, 'goods')->count();
                $count = ReviewService::getReviewByYearMonth($year, $i, 'goods')->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)) - 100, 1);
                if($beforeMonthCnt == 0 && $lastMonthCnt == 1){
                    $percent = 100;
                }else if($beforeMonthCnt === $lastMonthCnt){
                    $percent = 0;
                }
                $data['goods'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 0 ? $percent : 0,
                ];
                $beforeMonthCnt = ReviewService::getReviewRangeByYearMonth($year-1, 12, 'vocations')->count();
                $lastMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $i, 'vocations')->count();;
                $count = ReviewService::getReviewByYearMonth($year, $i, 'vocations')->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)) - 100, 1);
                if($beforeMonthCnt == 0 && $lastMonthCnt == 1){
                    $percent = 100;
                }else if($beforeMonthCnt === $lastMonthCnt){
                    $percent = 0;
                }
                $data['vacations'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 0 ? $percent : 0,
                ];

                $test = Carbon::create($year-1, 12)->format('Y-m-d H:i:s');
                $days = Carbon::parse($test)->daysInMonth;
                $date = Carbon::create($year-1, 12, $days)->format('Y-m-d H:i:s');

                $beforeMonthCnt = UserCongratulation::where('created_at', '<=', $date)
                    ->count();

                $test = Carbon::create($year, $i)->format('Y-m-d H:i:s');
                $days = Carbon::parse($test)->daysInMonth;
                $date = Carbon::create($year, $i, $days)->format('Y-m-d H:i:s');

                $lastMonthCnt = UserCongratulation::where('created_at', '<=', $date)
                    ->count();

                $count = UserCongratulation::whereYear('created_at', '=', $year)
                    ->whereMonth('created_at', '=', $i)
                    ->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)) - 100, 1);
                if($beforeMonthCnt == 0 && $lastMonthCnt == 1){
                    $percent = 100;
                }else if($beforeMonthCnt === $lastMonthCnt){
                    $percent = 0;
                }
                $data['congratulations'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 0 ? $percent : 0,
                ];
            } else {
                $test = Carbon::create($year, $i-1)->format('Y-m-d H:i:s');
                $days = Carbon::parse($test)->daysInMonth;
                $date = Carbon::create($year, $i-1, $days)->format('Y-m-d H:i:s');

                $beforeMonthCnt = User::where('created_at', '<=', $date)
                    ->whereNotNull('email_verified_at')
                    ->count();

                $test = Carbon::create($year, $i)->format('Y-m-d H:i:s');
                $days = Carbon::parse($test)->daysInMonth;
                $date = Carbon::create($year, $i, $days)->format('Y-m-d H:i:s');

                $lastMonthCnt = User::where('created_at', '<=', $date)
                    ->whereNotNull('email_verified_at')
                    ->count();

                $count = User::whereYear('created_at', '=', $year)
                    ->whereMonth('created_at', '=', $i)
                    ->whereNotNull('email_verified_at')
                    ->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)) - 100, 1);
                if($beforeMonthCnt == 0 && $lastMonthCnt == 1){
                    $percent = 100;
                }else if($beforeMonthCnt === $lastMonthCnt){
                    $percent = 0;
                }
                $data['users'][$i] = [
                        'count' => $count,
                        'percent' => $percent > 0 ? $percent : 0,
                    ];

                $data['persons'][$i] = [
                    'count' => $this->getReviewCount($year, $i, 'person'),
                    'percent' => $this->getReviewPercent($year, $i, 'person'),
                ];

                $data['companies'][$i] = [
                    'count' => $this->getReviewCount($year, $i, 'company'),
                    'percent' => $this->getReviewPercent($year, $i, 'company'),
                ];

                $data['goods'][$i] = [
                    'count' => $this->getReviewCount($year, $i, 'goods'),
                    'percent' => $this->getReviewPercent($year, $i, 'goods'),
                ];

                $data['vacations'][$i] = [
                    'count' => $this->getReviewCount($year, $i, 'vocations'),
                    'percent' => $this->getReviewPercent($year, $i, 'vocations'),
                ];

                $test = Carbon::create($year, $i-1)->format('Y-m-d H:i:s');
                $days = Carbon::parse($test)->daysInMonth;
                $date = Carbon::create($year, $i-1, $days)->format('Y-m-d H:i:s');

                $beforeMonthCnt = UserCongratulation::where('created_at', '<=', $date)
                    ->count();

                $test = Carbon::create($year, $i)->format('Y-m-d H:i:s');
                $days = Carbon::parse($test)->daysInMonth;
                $date = Carbon::create($year, $i, $days)->format('Y-m-d H:i:s');

                $lastMonthCnt = UserCongratulation::where('created_at', '<=', $date)
                    ->count();
                $count = UserCongratulation::whereYear('created_at', '=', $year)
                    ->whereMonth('created_at', '=', $i)
                    ->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)) - 100, 1);
                if($beforeMonthCnt == 0 && $lastMonthCnt == 1){
                    $percent = 100;
                }else if($beforeMonthCnt === $lastMonthCnt){
                    $percent = 0;
                }
                $data['congratulations'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 0 ? $percent : 0,
                ];
            }
        }

        $beforeYearCnt = User::whereYear('created_at', '<=', $year - 1)
            ->whereNotNull('email_verified_at')
            ->count();
        $lastYearCnt = User::whereYear('created_at', '<=', $year)
            ->whereNotNull('email_verified_at')
            ->count();
        $count = User::whereYear('created_at', '=', $year)
            ->whereNotNull('email_verified_at')
            ->count();
        $percent = round(($lastYearCnt * 100 / ($beforeYearCnt ? $beforeYearCnt : 1)) - 100, 1);
        $data['users']['total'] = [
            'total_count' => $count,
            'total_percent' => $percent > 0 ? $percent : 0,
        ];

        $data['persons']['total'] = [
            'total_count' => $this->getReviewTotalCount($year, 'person'),
            'total_percent' => $this->getReviewTotalPercent($year, 'person'),
        ];

        $data['companies']['total'] = [
            'total_count' => $this->getReviewTotalCount($year, 'company'),
            'total_percent' => $this->getReviewTotalPercent($year, 'company'),
        ];

        $data['goods']['total'] = [
            'total_count' => $this->getReviewTotalCount($year, 'goods'),
            'total_percent' => $this->getReviewTotalPercent($year, 'goods'),
        ];

        $data['vacations']['total'] = [
            'total_count' => $this->getReviewTotalCount($year, 'vocations'),
            'total_percent' => $this->getReviewTotalPercent($year, 'vocations'),
        ];

        $beforeYearCnt = UserCongratulation::whereYear('created_at', '<=', $year-1)->count();
        $lastYearCnt = UserCongratulation::whereYear('created_at', '<=', $year)->count();
        $count = UserCongratulation::whereYear('created_at', '=', $year)->count();
        $percent = round(($lastYearCnt * 100 / ($beforeYearCnt ? $beforeYearCnt : 1)) - 100, 1);

        $data['congratulations']['total'] = [
            'total_count' => $count,
            'total_percent' => $percent > 0 ? $percent : 0,
        ];

        $currentFilter = [
            'year' => $year
        ];

        return view('admin.data', compact('currentFilter', 'data'));
    }

    private function getReviewPercent(int $year, int $month, string $type)
    {
        $beforeMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $month - 1, $type)->count();
        $lastMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $month, $type)->count();
        $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)) - 100, 1);
        if($beforeMonthCnt == 0 && $lastMonthCnt == 1){
            $percent = 100;
        }

        return $percent > 0 ? $percent : 0;
    }

    private function getReviewTotalPercent(int $year, string $type)
    {
        $beforeYearCnt = ReviewService::getReviewRangeByYear($year-1, $type)->count();
        $lastYearCnt = ReviewService::getReviewRangeByYear($year, $type)->count();
        $percent = round(($lastYearCnt * 100 / ($beforeYearCnt ? $beforeYearCnt : 1)) - 100, 1);
        if($beforeYearCnt == 0 && $lastYearCnt == 1){
            $percent = 100;
        }
        return $percent > 0 ? $percent : 0;
    }

    private function getReviewCount(int $year, int $month, string $type)
    {
        return ReviewService::getReviewByYearMonth($year, $month, $type)->count();
    }

    private function getReviewTotalCount(int $year, string $type)
    {
        return ReviewService::getReviewByYear($year, $type)->count();
    }
}
