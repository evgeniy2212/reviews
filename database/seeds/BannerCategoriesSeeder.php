<?php

use Illuminate\Database\Seeder;
use App\Models\BannerCategory;

class BannerCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'CONGRATULATION',
                'slug' => \Illuminate\Support\Str::slug('congratulation'),
                'is_published' => true,
            ],
            [
                'title' => 'THANK YOU NOTE',
                'slug' => \Illuminate\Support\Str::slug('thank you note'),
                'is_published' => true,
            ],
            [
                'title' => 'SELLING',
                'slug' => \Illuminate\Support\Str::slug('selling'),
                'is_published' => true,
            ],
            [
                'title' => 'BUSINESS SERVICE AD',
                'slug' => \Illuminate\Support\Str::slug('business service ad'),
                'is_published' => true,
            ],
            [
                'title' => 'REVIEW',
                'slug' => \Illuminate\Support\Str::slug('review'),
                'is_published' => true,
            ],
            [
                'title' => 'OTHER',
                'slug' => \Illuminate\Support\Str::slug('other'),
                'is_published' => true,
            ],
        ];

        foreach($categories as $category){
            BannerCategory::firstOrCreate($category);
        }
    }
}
