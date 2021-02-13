<?php

namespace App\Services;


use App\Http\Requests\SaveReviewRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class VideoService {
    public static function uploadVideo(SaveReviewRequest $request, $path = 'reviews'){
        $file = $request->file('video');
        $originalName = $file->getClientOriginalName();
        $originalName = str_replace(' ', '', $originalName);
        $fileName = time().'_'.$originalName;
        Storage::disk('public')->putFileAs('videos/upload_videos/' . $path . DIRECTORY_SEPARATOR, $file, $fileName);
//        Storage::disk('public')->makeDirectory('images/resize_images/reviews/');
//        Image::make($file->getRealPath())
//            ->resize(150, 150, function($img){
//                $img->aspectRatio();
//            })->resizeCanvas(150, 150)
//            ->save(storage_path('app/public/images/resize_images/reviews/' . $fileName));

        return [
            'src' => 'videos/upload_videos/' . $path . DIRECTORY_SEPARATOR . $fileName,
            'original_name' => $originalName,
            'name' => $fileName
        ];
    }

    public static function updateImage(SaveReviewRequest $request, Review $review, $path = 'reviews'){
        $videoInfo = self::uploadVideo($request);
        if($review->video){
            $filePath = 'videos/upload_videos/' . $path . DIRECTORY_SEPARATOR . $review->video->name;
            $is_exist = Storage::disk('public')->exists($filePath);
            if($is_exist){
                Storage::disk('public')->delete($filePath);
//                $resizeFilePath = 'images/resize_images/reviews/' . $review->image->name;
//                if(Storage::disk('public')->delete($resizeFilePath)){
//                    Storage::disk('public')->delete($resizeFilePath);
//                }
            }
        }

        return $videoInfo;
    }
}
