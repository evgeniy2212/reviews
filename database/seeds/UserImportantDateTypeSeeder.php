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
                'title' => 'Birthday of Martin Luther King Jr.',
                'name' => 'Birthday of Martin Luther King Jr.',
                'slug' => \Illuminate\Support\Str::slug('Birthday of Martin Luther King Jr'),
                'is_published' => true,
            ],
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
                'title' => 'Labor Day',
                'name' => 'Labor Day',
                'slug' => \Illuminate\Support\Str::slug('Labor Day'),
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
                'title' => 'New born',
                'name' => 'New born',
                'slug' => \Illuminate\Support\Str::slug('New born'),
                'is_published' => true,
            ],
            [
                'title' => 'New home',
                'name' => 'New home',
                'slug' => \Illuminate\Support\Str::slug('New home'),
                'is_published' => true,
            ],
            [
                'title' => 'New year',
                'name' => 'New year',
                'slug' => \Illuminate\Support\Str::slug('New year'),
                'is_published' => true,
            ],
            [
                'title' => 'Promotion',
                'name' => 'Promotion',
                'slug' => \Illuminate\Support\Str::slug('Promotion'),
                'is_published' => true,
            ],
            [
                'title' => 'Starting a new business',
                'name' => 'Starting a new business',
                'slug' => \Illuminate\Support\Str::slug('Starting a new business'),
                'is_published' => true,
            ],
            [
                'title' => 'Thanksgiving',
                'name' => 'Thanksgiving',
                'slug' => \Illuminate\Support\Str::slug('Thanksgiving'),
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

        foreach($categories as $category){
            \App\Models\UserImportantDateType::firstOrCreate($category);
        }
    }
}
