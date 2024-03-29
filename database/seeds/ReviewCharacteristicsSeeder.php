<?php

use Illuminate\Database\Seeder;
use \App\Models\ReviewCharacteristic;
use \App\Models\ReviewCategory;

class ReviewCharacteristicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         $characteristics = [
             'person' => [
                 ['name' => 'Honest', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Loyal', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Responsible', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Respectful', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Humble', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Forgiving', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Compassionate', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Fair', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Authentic', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Courageous', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Generous', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Polite', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Kind', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Loving', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Reliable', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Conscientious', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Patient', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Thorough', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Dishonest', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Selfish', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Arrogant', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Rude', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Cruel', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Hypocritical', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Jealous', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Immoral', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Greedy', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Lazy', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Unscrupulous', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Vengeful', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Deceptive', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Unforgiving', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Nasty', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Aggressive', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Disrespectful', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Bossy', 'is_positive' => false, 'is_published' => true,],
             ],
             'company' => [
                 ['name' => 'Adventurous', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Agile', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Challenging', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Collaborative', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Creative', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Daring', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Energetic', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Energizing', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Fun', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Friendly', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Inclusive', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Innovate', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Inspiring', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Passionate', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Playful', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Progressive', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Respectful', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Rewarding', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Biased', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Boring', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Discriminatory', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Demanding', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Disengaged', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Disrespectful', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Messy', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Micromanaging', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Inflexible', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Deceptive', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Outdated', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Rigid', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Stressful', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Toxic', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Unethical', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Unforgiving', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Unrewarding', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Unsupportive', 'is_positive' => false, 'is_published' => true,],
             ],
             'goods' => [
                 ['name' => 'Comfortable', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Durable', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Effective', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Ideal', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Popular', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Quality', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Stylish', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Well-priced', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Useful', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Creamy', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Delicious', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Dangerous', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Fragrant', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Nutritious', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Organic', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Peculiar', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Smooth', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Tempting', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Bad', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Faulty', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Uncomfortable', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Low quality', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Outdated', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Impractical', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Overrated', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Primitive', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Useless', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Bitter', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Chewy', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Disgusting', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Harmful', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Horrible', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Tasteless', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Terrible', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Unpleasant', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Unusual', 'is_positive' => false, 'is_published' => true,],
             ],
             'vocations' => [
                 ['name' => 'Alive', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Attractive', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Beautiful', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Calm', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Comfortable', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Enchanting', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Exciting', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Exotic', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Fascinating', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Friendly', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Fun', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Homey', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Inexpensive', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Interesting', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Lively', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Peaceful', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Picturesque', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Unspoiled', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Bleak', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Boring', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Bustling', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Creepy', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Crowded', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Dangerous', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Desert', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Desolate', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Dirty', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Dull', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Hectic', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Horrifying', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Nightmarish', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Overcrowded', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Polluted', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Pricey', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Stormy', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Terrible', 'is_positive' => false, 'is_published' => true,],
             ]
         ];

         foreach(ReviewCharacteristic::all() as $characteristic){
             $characteristic->delete();
         }
         foreach($characteristics as $characteristic_category => $characteristics){
             $category_id = ReviewCategory::where('slug', '=', $characteristic_category)->first()->id;
             foreach($characteristics as $characteristic){
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
