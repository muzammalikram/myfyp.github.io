<?php

use Faker\Generator as Faker;

$factory->define(App\UserInterest::class, function (Faker $faker) {
    return [
        //
        'interest' => $faker->name,
        'user_id' => $faker->numberBetween($min = 1, $max = 3)
    ];
});
