<?php

use Faker\Generator as Faker;

$factory->define(App\Chat::class, function (Faker $faker) {
    return [
        'sender_id' => 1,
        'receiver_id' => 2,
        'conversation_id' => '1_2',
        'message'=>'I am Securing my Degree of BS(SE) from GCUF',
    ];
});
