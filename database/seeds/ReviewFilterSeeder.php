<?php

use Illuminate\Database\Seeder;
use \App\Models\ReviewFilter;

class ReviewFilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filters = [
            [
                'name' => 'filter by date',
                'slug' => \Illuminate\Support\Str::slug('filter by date'),
            ],
            [
                'name' => 'sort by',
                'slug' => \Illuminate\Support\Str::slug('sort by'),
            ],
        ];

        foreach($filters as $filter){
            ReviewFilter::firstOrCreate($filter);
        }
    }
}
