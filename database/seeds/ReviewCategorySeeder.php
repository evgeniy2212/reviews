<?php

use Illuminate\Database\Seeder;
use \App\Models\ReviewCategory;

class ReviewCategorySeeder extends Seeder
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
                'title' => 'PERSON',
                'slug' => \Illuminate\Support\Str::slug('person'),
                'is_published' => true,
            ],
            [
                'title' => 'COMPANY',
                'slug' => \Illuminate\Support\Str::slug('company'),
                'is_published' => true,
            ],
            [
                'title' => 'GOODS',
                'slug' => \Illuminate\Support\Str::slug('goods'),
                'is_published' => true,
            ],
            [
                'title' => 'VOCATIONS',
                'slug' => \Illuminate\Support\Str::slug('vocations'),
                'is_published' => true,
            ],
        ];

        foreach($categories as $category){
            ReviewCategory::firstOrCreate($category);
        }
    }
}
