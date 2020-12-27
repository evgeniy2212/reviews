<?php

namespace App\Services;


use App\Http\Requests\Admin\UpdateBannerRequest;
use App\Http\Requests\SaveReviewRequest;
use App\Models\Banner;
use App\Models\Logo;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ImageService {
    public static function uploadImage(SaveReviewRequest $request){
        $file = $request->file('img');
        $originalName = $file->getClientOriginalName();
        $originalName = str_replace(' ', '', $originalName);
        $fileName = time().'_'.$originalName;
        Storage::disk('public')->putFileAs('images/upload_images/reviews/', $file, $fileName);
        Storage::disk('public')->makeDirectory('images/resize_images/reviews/');
        Image::make($file->getRealPath())
            ->resize(150, 150, function($img){
                $img->aspectRatio();
            })->resizeCanvas(150, 150)
            ->save(storage_path('app/public/images/resize_images/reviews/' . $fileName));

        return [
            'src' => 'images/upload_images/reviews/' . $fileName,
            'original_name' => $originalName,
            'name' => $fileName
        ];
    }

    public static function updateImage(SaveReviewRequest $request, Review $review){
        $imageInfo = self::uploadImage($request);
        if($review->image){
            $filePath = 'images/upload_images/reviews/' . $review->image->name;
            $is_exist = Storage::disk('public')->exists($filePath);
            if($is_exist){
                Storage::disk('public')->delete($filePath);
                $resizeFilePath = 'images/resize_images/reviews/' . $review->image->name;
                if(Storage::disk('public')->delete($resizeFilePath)){
                    Storage::disk('public')->delete($resizeFilePath);
                }
            }
        }

        return $imageInfo;
    }

    public static function uploadBanner($request){
        $file = $request->file('img');
        $originalName = $file->getClientOriginalName();
        $originalName = str_replace(' ', '', $originalName);
        $fileName = time().'_'.$originalName;
        Storage::disk('public')->putFileAs('images/upload_images/banners/', $file, $fileName);
//        Storage::disk('public')->makeDirectory('images/resize_images/reviews/');
//        Image::make($file->getRealPath())
//            ->resize(150, 150, function($img){
//                $img->aspectRatio();
//            })->resizeCanvas(150, 150)
//            ->save(storage_path('app/public/images/resize_images/reviews/' . $fileName));

        return [
            'src' => 'images/upload_images/banners/' . $fileName,
            'original_name' => $originalName,
            'name' => $fileName
        ];
    }

    public static function updateBanner(UpdateBannerRequest $request, Banner $banner){
        $imageInfo = self::uploadBanner($request);
        if($banner->src){
            $filePath = 'images/upload_images/banners/' . $banner->name;
            $is_exist = Storage::disk('public')->exists($filePath);
            if($is_exist){
                Storage::disk('public')->delete($filePath);
//                $resizeFilePath = 'images/resize_images/reviews/' . $review->image->name;
//                if(Storage::disk('public')->delete($resizeFilePath)){
//                    Storage::disk('public')->delete($resizeFilePath);
//                }
            }
        }

        return $imageInfo;
    }

    public static function uploadLogo($request){
        $file = $request->file('img');
        $originalName = $file->getClientOriginalName();
        $originalName = str_replace(' ', '', $originalName);
        $fileName = time().'_'.$originalName;
        Storage::disk('public')->putFileAs('images/upload_images/logos/', $file, $fileName);
//        Storage::disk('public')->makeDirectory('images/resize_images/reviews/');
//        Image::make($file->getRealPath())
//            ->resize(150, 150, function($img){
//                $img->aspectRatio();
//            })->resizeCanvas(150, 150)
//            ->save(storage_path('app/public/images/resize_images/reviews/' . $fileName));

        return [
            'src' => 'images/upload_images/logos/' . $fileName,
//            'original_name' => $originalName,
            'name' => $fileName
        ];
    }

    public static function updateLogo(Request $request, Logo $logo){
        $imageInfo = self::uploadLogo($request);
        if($logo->src){
            $filePath = 'images/upload_images/logos/' . $logo->name;
            $is_exist = Storage::disk('public')->exists($filePath);
            if($is_exist){
                Storage::disk('public')->delete($filePath);
//                $resizeFilePath = 'images/resize_images/reviews/' . $review->image->name;
//                if(Storage::disk('public')->delete($resizeFilePath)){
//                    Storage::disk('public')->delete($resizeFilePath);
//                }
            }
        }

        return $imageInfo;
    }

    public static function deleteLogo(Logo $logo){
        if($logo->src){
            $filePath = 'images/upload_images/logos/' . $logo->name;
            $is_exist = Storage::disk('public')->exists($filePath);
            if($is_exist){
                Storage::disk('public')->delete($filePath);
            }
        }
    }
}
