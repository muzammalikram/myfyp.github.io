<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {

    return [
        'user_id' => $faker->unique()->randomDigit,
        'university' => 'GCUF',
        'edu_to' => 2013,
        'edu_from' => 2018,
        'edu_description'=>'Software Engineer',
        'graduate' => 'Y',
        'work_company' => 'Divine IT house',
        'work_designation'=>'Developer',
        'work_from'=>2017,
        'work_to'=>2019,
        'work_city'=>'faisalabad',
        'work_description'=>'working as software engineer'
    ];


});
