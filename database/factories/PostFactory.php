<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->numberBetween($min = 1, $max = 3),
        'caption'=>$faker->text($maxNbChars = 200),
        'image' => 'abc.png',
        'price'=>20
    ];



});
