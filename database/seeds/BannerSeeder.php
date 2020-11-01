<?php

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = [
            [
                'banner_category_id' => \App\Models\BannerCategory::firstWhere('slug', '=' ,'other')->id,
                'user_id' => \App\User::firstWhere('is_admin', '=',true)->id,
                'src' => 'images/upload_images/banners/default_banner.png',
                'name' => 'admin_banner',
                'original_name' => 'default_banner',
                'is_published' => false,
            ],
        ];

        foreach($banners as $banner){
            Banner::firstOrCreate($banner);
        }
    }
}
