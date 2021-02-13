<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use Faker\Generator as Faker;

    $factory->define(Review::class, function (Faker $faker) {
    $user = \App\User::all()->random();
    $date = \Carbon\Carbon::create(2019, 5, 28, 0, 0, 0);
    $category_id = rand(1, 4);
    $review_group_id = $category_id == 3 ? rand(1, 40) : null;
    $category_by_review_id = $category_id == 4 ? rand(4, 11) : null;

    return [
        'user_id' => $user->id,
        'review' => $faker->realText(rand(100, 300)),
        'region_id' => \App\Models\Region::all()->first()->id,
        'city' => $faker->city,
        'review_category_id' => $category_id,
        'review_group_id' => $review_group_id,
        'email' => $faker->email,
        'name' => $faker->firstName,
        'second_name' => $faker->lastName,
        'rating' => rand(1, 5),
        'likes' => rand(1, 100),
        'dislikes' =>rand(1, 100),
        'user_sign' => rand(1, 3),
        'is_published' => rand(0, 1),
        'created_at' => $date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s')
    ];
});
