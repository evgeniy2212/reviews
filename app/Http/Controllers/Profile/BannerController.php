<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\BannerCategory;
use App\Http\Requests\Profile\StoreBanner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index() {
        $bannerCategories = BannerCategory::all()->pluck('title', 'id');
//        dd($bannerCategories);

        return view('profile.banners', compact('bannerCategories'));
    }

    public function save(StoreBanner $request){
        dd($request->all());
        $request->merge(['user_id' => auth()->user()->id]);
        $review = Review::create($request->all());
        if($request->has('img')){
//            $imageInfo = ImageService::uploadImage($request, $review);
//            $imageInfo = array_merge($imageInfo, ['review_id' => $review->id]);
//            ReviewImage::create($imageInfo);
        }
        $bannerCategories = BannerCategory::all()->pluck('title', 'id');

        return redirect()->route('profile.banners')->with([
            'success' => 'Review Created',
            'bannerCategories' => $bannerCategories
        ]);
    }
}
