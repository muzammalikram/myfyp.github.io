<?php

use Illuminate\Database\Seeder;
use App\Chat;

class UserImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        return Chat::create([
            'sender_id' => 1,
            'receiver_id' => 2,
            'conversation_id' => '1_2',
            'message'=>'I am Securing my Degree of BS(SE) from GCUF',
        ]);

    }
}
