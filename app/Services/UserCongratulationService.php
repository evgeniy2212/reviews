<?php

namespace App\Services;

use App\Models\ContentImage;
use App\Models\Country;
use App\Models\DefaultImage;
use App\Models\ReviewFilter;
use App\Models\ReviewVideo;
use App\Models\UserCongratulation;
use App\Models\UserCongratulationCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserCongratulationService {
    public static function getCountries(){
        return (new Country())->getCountriesContainRegions();
    }

    public static function getCategories(){
        return UserCongratulationCategory::all();
    }

    public static function difToMinRangeDate(){
        return Carbon::now()->diffInDays(UserCongratulation::min('created_at'));
    }

    public static function difToMaxRangeDate(){
        return Carbon::now()->diffInDays(UserCongratulation::max('created_at'));
    }

    public static function createCongratulation(Request $request){
        $request->merge(['user_id' => auth()->user()->id]);
        $userCongratulation = UserCongratulation::create($request->all());
        if($request->has('img_default')){
            $defaultImage = DefaultImage::findOrFail($request->img_default);
            $imageDefaultInfo = [
                'src' => $defaultImage->src,
                'original_name' => $defaultImage->original_name,
                'name' => $defaultImage->name,
                'content_id' => $userCongratulation->id,
                'content_type' => UserCongratulation::class,
            ];
            ContentImage::create($imageDefaultInfo);
        }
        if($request->has('img')){
            $imageInfo = ImageService::uploadImage($request, 'congratulations');
            $imageInfo = array_merge($imageInfo, [
                'content_id' => $userCongratulation->id,
                'content_type' => UserCongratulation::class,
            ]);
            ContentImage::create($imageInfo);
        }
        if($request->has('video')){
            $videoInfo = VideoService::uploadVideo($request, 'congratulations');
            $videoInfo = array_merge($videoInfo, [
                'content_id' => $userCongratulation->id,
                'content_type' => UserCongratulation::class,
            ]);
            ReviewVideo::create($videoInfo);
        }

        return $userCongratulation;
    }

    public static function getUserFilteredCongratulations($user_id, $filter = '', $sort = '', $search = '', $perPage = 10) {
        $sort_by = self::getSortMethod($sort);

        $result = UserCongratulation::whereUserId($user_id)
            ->where(DB::raw('CONCAT_WS(" ", name, second_name)'), 'like', "%{$search}%")
            ->when(!empty($filter), function($q) use ($filter){
                $q->whereYear('created_at', $filter);
            })
            ->with(['image', 'video'])
            ->when(!empty($sort), function($q) use($sort_by){
                $q->orderBy($sort_by);
            })
            ->when(empty($sort), function($q){
                $q->orderBy('created_at', 'DESC');
            })
            ->where(function($q){
                $q->whereIsPublished(true);
            })
            ->paginate($perPage);

        return $result;
    }

    protected static function getSortMethod($sort = ''){
        if($sort){
            switch ($sort){
                case ReviewFilter::SORT_BY_RATING:
                    $sort = ReviewFilter::SORT_BY_RATING;
                    break;
                case ReviewFilter::SORT_BY_ALPHABET:
                    $sort = 'name';
                    break;
            }
        } else {
            $sort = '';
        }

        return $sort;
    }

}