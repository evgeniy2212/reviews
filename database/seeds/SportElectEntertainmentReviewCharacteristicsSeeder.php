<?php

use Illuminate\Database\Seeder;
use \App\Models\ReviewCharacteristic;
use \App\Models\ReviewCategory;

class SportElectEntertainmentReviewCharacteristicsSeeder extends Seeder
{
    /**
     * @return void
     * @throws Exception
     */
     public function run()
     {
         $characteristics = [
             'sport-teams' => [
                 ['name' => 'Best', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Competitive', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Determined', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Disciplined', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Dynamic', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Inspiring', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Excellent coach', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Great stadium', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Lovely uniform', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Resilient', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Resolute', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Skillful', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Tactful team', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Tenacious', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'United', 'is_positive' => true, 'is_published' => true,],
//                 ['name' => 'Peaceful', 'is_positive' => true, 'is_published' => true,],
//                 ['name' => 'Picturesque', 'is_positive' => true, 'is_published' => true,],
//                 ['name' => 'Unspoiled', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Disappointing', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Frustrating', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Incompetent', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Ineffective', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Inept', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Lackluster', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Not Excellent Coach', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Not Great Stadium', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Not lovely uniform', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Mediocre', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Sluggish', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Undisciplined', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Unimpressive', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Unmotivated', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Weak', 'is_positive' => false, 'is_published' => true,],
//                 ['name' => 'Pricey', 'is_positive' => false, 'is_published' => true,],
//                 ['name' => 'Stormy', 'is_positive' => false, 'is_published' => true,],
//                 ['name' => 'Terrible', 'is_positive' => false, 'is_published' => true,],
             ],
             'election' => [
                 ['name' => 'Accessible', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Accountable', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Caring', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Collaborative', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Compassionate', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Dedicated', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Empowering', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Ethical', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Forward-looking', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Inclusive', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Innovative', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Knowledgeable', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Resilient', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Responsive', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Results-Oriented', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Transparent', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Trustworthy', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Visionary', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Arrogant', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Authoritarian', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Corrupt', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Dishonest', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Divisive', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Inaccessible', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Incompetent', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Ineffective', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Inflexible', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Irresponsible', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Lacking Transparency', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Partisan', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Scandalous', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Self-serving', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Stubborn', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Unresponsive', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Untrustworthy', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Wasteful', 'is_positive' => false, 'is_published' => true,],
             ],
             'entertainment' => [
                 ['name' => 'Entertaining', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Informative', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Diverse', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Engaging', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Popular', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Specialized', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Innovative', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Interactive', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Cinematic', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Authentic', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Engrossing', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Culturally Aware', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Global', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Acclaimed', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Inclusive', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Family-Friendly', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Cutting-Edge', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Nostalgic', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Boring', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Hyped', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Insipid', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Lackluster', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Mediocre', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Monotonous', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Offencive', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Overrated', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Predictable', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Stagnant', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Tasteless', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Tawdry', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Tedious', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Tiresome', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Trite', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Underwhelming', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Uninteresting', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Unoriginal', 'is_positive' => false, 'is_published' => true,],
             ],
         ];

         foreach($characteristics as $characteristic_category => $categoryCharacteristics){
             ReviewCharacteristic::query()
                 ->whereHas('category', function($q) use($characteristic_category){
                     $q->where('slug', $characteristic_category);
                 })->delete();
             $category_id = ReviewCategory::where('slug', '=', $characteristic_category)->first()->id;
             foreach($categoryCharacteristics as $characteristic){
                 $characteristic['review_category_id'] = $category_id;
                 $charactData = [
                     'review_category_id' => $category_id,
                     'is_positive' => $characteristic['is_positive'],
                     'is_published' => $characteristic['is_published'],
                 ];
                 foreach(app('laravellocalization')->getSupportedLocales() as $localeKey => $locale){
                     $charactData[$localeKey] = [
                         'name' => $characteristic['name']
                     ];
                 }
                 ReviewCharacteristic::create($charactData);
             }
         }
     }
}
