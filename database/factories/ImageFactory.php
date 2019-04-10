<?php

use Faker\Generator as Faker;

$factory->define(App\UserImage::class, function (Faker $faker) {
    return [
        //
        'user_id' => $faker->numberBetween($min = 1, $max = 3) ,
        'image' => 'abc.png'
    ];
});


 