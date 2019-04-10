<?php

use Illuminate\Database\Seeder;

class Heads extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory('App\User' , 10)->create();
        factory('App\Profile' , 10)->create();
        factory('App\Post' , 10)->create();
        factory('App\UserImage' , 10)->create();
        factory('App\UserInterest' , 10)->create();
        factory('App\Chat' , 4)->create();
        factory('App\Friends' , 3)->create();

    }
}
