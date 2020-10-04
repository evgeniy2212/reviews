<?php

use Illuminate\Database\Seeder;
use \App\Models\ReviewFilterValue;

class ReviewFilterValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filter_values = [
            [
                'value' => '2018',
                'slug' => \Illuminate\Support\Str::slug('2018'),
                'filter_id' => 1,
            ],
            [
                'value' => '2019',
                'slug' => \Illuminate\Support\Str::slug('2019'),
                'filter_id' => 1,
            ],
            [
                'value' => '2020',
                'slug' => \Illuminate\Support\Str::slug('2020'),
                'filter_id' => 1,
            ],
            [
                'value' => 'alphabet',
                'slug' => \Illuminate\Support\Str::slug('alphabet'),
                'filter_id' => 2,
            ],
            [
                'value' => 'stars',
                'slug' => \Illuminate\Support\Str::slug('rating'),
                'filter_id' => 2,
            ],
        ];

        foreach($filter_values as $filter_value){
            ReviewFilterValue::firstOrCreate($filter_value);
        }
    }
}
