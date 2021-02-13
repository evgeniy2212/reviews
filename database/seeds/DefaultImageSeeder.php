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
                'src' => 'images/upload_images/default_images/default_congratulation.jpg',
                'name' => 'image_1',
                'original_name' => 'default_image'
            ],
        ];

        foreach($defaultImages as $defaultImage){
            \App\Models\DefaultImage::firstOrCreate($defaultImage);
        }
    }
}
