<?php

use Illuminate\Database\Seeder;
use \App\Models\ReviewCategory;
use Illuminate\Support\Arr;

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
                'title' => [
                    'en' => 'Person',
                    'ru' => 'Людях',
                ],
                'slug' => \Illuminate\Support\Str::slug('person'),
                'is_published' => true,
                'enable_low_rating' => false
            ],
            [
                'title' => [
                    'en' => 'Company',
                    'ru' => 'Компаниях',
                ],
                'slug' => \Illuminate\Support\Str::slug('company'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Goods',
                    'ru' => 'Товарах',
                ],
                'slug' => \Illuminate\Support\Str::slug('goods'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Vacations',
                    'ru' => 'Курортах',
                ],
                'slug' => \Illuminate\Support\Str::slug('vocations'),
                'is_published' => true,
            ],
            [
                'title' => [
                    'en' => 'Sport Teams',
                    'ru' => 'Sport Teams',
                ],
                'slug' => \Illuminate\Support\Str::slug('sport teams'),
                'is_published' => true,
                'is_draft' => true,
            ],
            [
                'title' => [
                    'en' => 'Entertainment',
                    'ru' => 'Entertainment',
                ],
                'slug' => \Illuminate\Support\Str::slug('entertainment'),
                'is_published' => true,
                'is_draft' => true,
            ],
            [
                'title' => [
                    'en' => 'Election',
                    'ru' => 'Election',
                ],
                'slug' => \Illuminate\Support\Str::slug('election'),
                'is_published' => true,
                'is_draft' => true,
            ],
        ];

        foreach($categories as $category){
            $data = [
                'is_published' => $category['is_published'],
                'enable_low_rating' => Arr::get($category, 'enable_low_rating', true),
                'is_draft' => Arr::get($category, 'is_draft', false)
            ];
            foreach(app('laravellocalization')->getSupportedLocales() as $localeKey => $locale){
                $data[$localeKey] = [
                    'title' => Arr::get($category['title'], $localeKey, app('laravellocalization')->getDefaultLocale())
                ];
            }

            ReviewCategory::updateOrCreate(
                [
                    'slug' => $category['slug'],
                ],
                $data
            );
        }
    }
}
