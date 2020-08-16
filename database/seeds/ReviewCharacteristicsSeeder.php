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
                 ['name' => 'Humility', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Forgive', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Compassionate', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Fairness', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Authentic', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Courageous', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Generous', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Polite', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Kind', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Loving', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Reliable', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Conscientious', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Forgiven', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Thorough', 'is_positive' => true, 'is_published' => true,],
                 ['name' => 'Dishonest', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Selfissness', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Arrogant', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Rude', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Cruel', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Hypocritical', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Jealousy', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Immoral', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Greedy', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Lazy', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Cheater', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Vengeful', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Deceptive', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Unforgiving', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Nasty', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Aggressive', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Disrespectful', 'is_positive' => false, 'is_published' => true,],
                 ['name' => 'Bossy', 'is_positive' => false, 'is_published' => true,],
             ]
         ];


         foreach($characteristics as $characteristic_category => $characteristics){
             $category_id = ReviewCategory::where('slug', '=', $characteristic_category)->first()->id;
             foreach($characteristics as $characteristic){
                 $characteristic['review_category_id'] = $category_id;
                 ReviewCharacteristic::firstOrCreate($characteristic);
             }
         }
     }
}
