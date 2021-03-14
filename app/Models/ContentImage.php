<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ContentImage extends Model
{
    protected $fillable = [
        'content_id',
        'content_type',
        'src',
        'name',
        'original_name',
    ];

    public function getImageUrl()
    {
        return asset('storage/' . $this->src);
    }

    public function getResizeImageUrl(string $path = '')
    {
        return Storage::disk('public')->has('storage/images/resize_images/' . $path . DIRECTORY_SEPARATOR . $this->name)
            ? asset('storage/images/resize_images/' . $path . DIRECTORY_SEPARATOR . $this->name)
            : asset('storage/images/upload_images/' . $path . DIRECTORY_SEPARATOR . $this->original_name);
    }
}
