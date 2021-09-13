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
            $filterData = [];
            foreach(app('laravellocalization')->getSupportedLocales() as $localeKey => $locale){
                $filterData[$localeKey] = [
                    'name' => $filter['name']
                ];
            }
            ReviewFilter::updateOrCreate(
                [
                    'slug' => $filter['slug']
                ],$filterData);
        }
    }
}
