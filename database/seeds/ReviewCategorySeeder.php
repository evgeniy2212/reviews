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
                'title' => 'People',
                'slug' => \Illuminate\Support\Str::slug('person'),
                'is_published' => true,
                'enable_low_rating' => false
            ],
            [
                'title' => 'Companies',
                'slug' => \Illuminate\Support\Str::slug('company'),
                'is_published' => true,
            ],
            [
                'title' => 'Goods',
                'slug' => \Illuminate\Support\Str::slug('goods'),
                'is_published' => true,
            ],
            [
                'title' => 'Vacations',
                'slug' => \Illuminate\Support\Str::slug('vocations'),
                'is_published' => true,
            ],
        ];

        foreach($categories as $category){
            ReviewCategory::updateOrCreate(
                [
                    'slug' => $category['slug']
                ],
                [
                    'title' => $category['title'],
                    'is_published' => $category['is_published']
                ]
            );
        }
    }
}
