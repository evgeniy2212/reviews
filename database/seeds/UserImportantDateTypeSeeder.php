<?php

use Illuminate\Database\Seeder;

class UserImportantDateTypeSeeder extends Seeder
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
                'title' => 'Christmas',
                'name' => 'Christmas',
                'slug' => \Illuminate\Support\Str::slug('Christmas'),
                'is_published' => true,
            ],
            [
                'title' => 'Columbus Day',
                'name' => 'Columbus Day',
                'slug' => \Illuminate\Support\Str::slug('Columbus Day'),
                'is_published' => true,
            ],
            [
                'title' => 'Easter',
                'name' => 'Easter',
                'slug' => \Illuminate\Support\Str::slug('Easter'),
                'is_published' => true,
            ],
            [
                'title' => 'Engagements',
                'name' => 'Engagements',
                'slug' => \Illuminate\Support\Str::slug('Engagements'),
                'is_published' => true,
            ],
            [
                'title' => 'Father`s Day',
                'name' => 'Father`s Day',
                'slug' => \Illuminate\Support\Str::slug('Father`s Day'),
                'is_published' => true,
            ],
            [
                'title' => 'Good Friday',
                'name' => 'Good Friday',
                'slug' => \Illuminate\Support\Str::slug('Good Friday'),
                'is_published' => true,
            ],
            [
                'title' => 'Graduation',
                'name' => 'Graduation',
                'slug' => \Illuminate\Support\Str::slug('Graduation'),
                'is_published' => true,
            ],
            [
                'title' => 'Happy anniversary',
                'name' => 'Happy anniversary',
                'slug' => \Illuminate\Support\Str::slug('Happy anniversary'),
                'is_published' => true,
            ],
            [
                'title' => 'Happy birthday',
                'name' => 'Happy birthday',
                'slug' => \Illuminate\Support\Str::slug('Happy birthday'),
                'is_published' => true,
            ],
            [
                'title' => 'Independence Day',
                'name' => 'Independence Day',
                'slug' => \Illuminate\Support\Str::slug('Independence Day'),
                'is_published' => true,
            ],
            [
                'title' => 'Juneteenth',
                'name' => 'Juneteenth',
                'slug' => \Illuminate\Support\Str::slug('Juneteenth'),
                'is_published' => true,
            ],
            [
                'title' => 'Labor Day',
                'name' => 'Labor Day',
                'slug' => \Illuminate\Support\Str::slug('Labor Day'),
                'is_published' => true,
            ],
            [
                'title' => 'Martin Luther King Jr. Day',
                'name' => 'Martin Luther King Jr. Day',
                'slug' => \Illuminate\Support\Str::slug('Martin Luther King Jr. Day'),
                'is_published' => true,
            ],
            [
                'title' => 'Memorial Day',
                'name' => 'Memorial Day',
                'slug' => \Illuminate\Support\Str::slug('Memorial Day'),
                'is_published' => true,
            ],
            [
                'title' => 'Mother`s Day',
                'name' => 'Mother`s Day',
                'slug' => \Illuminate\Support\Str::slug('Mother`s Day'),
                'is_published' => true,
            ],
            [
                'title' => 'New Business',
                'name' => 'New Business',
                'slug' => \Illuminate\Support\Str::slug('New Business'),
                'is_published' => true,
            ],
            [
                'title' => 'New Year’s Day',
                'name' => 'New Year’s Day',
                'slug' => \Illuminate\Support\Str::slug('New Year’s Day'),
                'is_published' => true,
            ],
            [
                'title' => 'Newborn',
                'name' => 'Newborn',
                'slug' => \Illuminate\Support\Str::slug('Newborn'),
                'is_published' => true,
            ],
            [
                'title' => 'Promotion',
                'name' => 'Promotion',
                'slug' => \Illuminate\Support\Str::slug('Promotion'),
                'is_published' => true,
            ],
            [
                'title' => 'Thanksgiving',
                'name' => 'Thanksgiving',
                'slug' => \Illuminate\Support\Str::slug('Thanksgiving'),
                'is_published' => true,
            ],
            [
                'title' => 'Valentine’s Day',
                'name' => 'Valentine’s Day',
                'slug' => \Illuminate\Support\Str::slug('Valentine’s Day'),
                'is_published' => true,
            ],
            [
                'title' => 'Veterans Day',
                'name' => 'Veterans Day',
                'slug' => \Illuminate\Support\Str::slug('Veterans Day'),
                'is_published' => true,
            ],
            [
                'title' => 'Wedding',
                'name' => 'Wedding',
                'slug' => \Illuminate\Support\Str::slug('Wedding'),
                'is_published' => true,
            ]
        ];

        foreach(\App\Models\UserImportantDateType::all() as $importantType){
            $importantType->delete();
        }

        foreach($categories as $category){
            $userCongratData = [
                'is_published' => true,
            ];
            foreach(app('laravellocalization')->getSupportedLocales() as $localeKey => $locale){
                $userCongratData[$localeKey] = [
                    'title' => $category['title'],
                    'name' => $category['name'],
                ];
            }
            \App\Models\UserImportantDateType::updateOrCreate(
                [
                    'slug' => $category['slug']
                ], $userCongratData);
        }
    }
}
