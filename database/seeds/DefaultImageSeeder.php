<?php

use Illuminate\Database\Seeder;

class DefaultImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultImages = [
            [
                'src' => 'images/default_images/congratulations/christmas.jpg',
                'name' => 'christmas',
                'original_name' => 'christmas.jpg'
            ],
            [
                'src' => 'images/default_images/congratulations/fathers_day.jpg',
                'name' => 'fathers_day',
                'original_name' => 'fathers_day.jpg'
            ],
            [
                'src' => 'images/default_images/congratulations/happy_anniversary.jpg',
                'name' => 'happy_anniversary',
                'original_name' => 'happy_anniversary.jpg'
            ],
            [
                'src' => 'images/default_images/congratulations/happy_birthday.jpg',
                'name' => 'happy_birthday',
                'original_name' => 'happy_birthday.jpg'
            ],
            [
                'src' => 'images/default_images/congratulations/independence_day.jpg',
                'name' => 'independence_day',
                'original_name' => 'independence_day.jpg'
            ],
            [
                'src' => 'images/default_images/congratulations/mothers_day.jpg',
                'name' => 'mothers_day',
                'original_name' => 'mothers_day.jpg'
            ],
            [
                'src' => 'images/default_images/congratulations/thanksgiving.jpg',
                'name' => 'thanksgiving',
                'original_name' => 'thanksgiving.jpg'
            ],
            [
                'src' => 'images/default_images/congratulations/veterans_day.jpg',
                'name' => 'veterans_day',
                'original_name' => 'veterans_day.jpg'
            ],
        ];

        foreach($defaultImages as $defaultImage){
            \App\Models\DefaultImage::firstOrCreate($defaultImage);
        }
    }
}
