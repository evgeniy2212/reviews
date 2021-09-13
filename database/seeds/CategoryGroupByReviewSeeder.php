<?php

use Illuminate\Database\Seeder;

use App\Models\CategoryByReview;
use App\Models\GroupByReview;
use App\Models\ReviewCategory;

class CategoryGroupByReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Convenience products' => [
                'Alcohol', 'Cigarettes', 'Fruit', 'Most food items', 'Snack foods and candy bars', 'Soft drinks', 'Vegetables', 'Other'
            ],
            'Shopping products' => [
                'Cameras', 'Camping equipment', 'Clothing', 'Computers', 'Electric Car', 'Electronics', 'Furniture', 'Golf equipment', 'Jewelry', 'Kitchen equipment', 'Luggage', 'Mobile phones', 'Perfumes and cosmetics', 'Plants', 'Sporting equipment', 'Tools', 'Toys', 'Vehicles', 'Washing machines and dishwashers', 'Other'
            ],
            'Specialty products' => [
                'Book', 'Cleaning & Detergents products', 'Flowers', 'Medicines and vitamins', 'Musical Instruments', 'Newspapers and magazines', 'Pet food', 'Solar Panel & Wind System', 'Toothpaste, soap, and shampoo', 'TV Chanel', 'Virtual Game', 'Other'
            ],
            'City' => [],
            'Cruise' => [],
            'Resort' => [],
            'Hotel' => [],
            'National parks' => [],
            'State parks' => [],
            'Beaches' => [],
            'Other' => [],
        ];

        $reviewCategory = ReviewCategory::whereSlug('goods')->first();
        foreach($categories as $category => $groups){
            $isNotRegionEmpty = !empty($groups);
            $reviewCategoryId = $isNotRegionEmpty ? $reviewCategory->id : null;

            $data = [
                'review_category_id' => $reviewCategoryId
            ];
            foreach(app('laravellocalization')->getSupportedLocales() as $localeKey => $locale){
                $data[$localeKey] = [
                    'name' => $category
                ];
            }
            $category = CategoryByReview::create($data);
            if($isNotRegionEmpty){
                foreach($groups as $group){
                    $groupData = [
                        'category_id' => $category->id,
                    ];
                    foreach(app('laravellocalization')->getSupportedLocales() as $localeKey => $locale){
                        $groupData[$localeKey] = [
                            'name' => $group
                        ];
                    }
                    GroupByReview::create($groupData);
                }
            }
        }
    }
}
