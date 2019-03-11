<?php

use Illuminate\Database\Seeder;
use App\Profile;

class UserPofileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	return Profile::create([
    		'user_id' => 1,
    		'university' => 'GCUF',
    		'edu_from' => 2015,
    		'edu_to' => 2019,
    		'edu_description'=>'I am Securing my Degree of BS(SE) from GCUF',
    		'graduate' => 'yes' ,
    		'work_company' => 'Divine IT House',
    		'work_designation' => 'web developer',
    		'work_from' => 2018,
    		'work_to' => 2019,
    		'work_city'=>'faisalabad',
    		'work_description'=>'I am a web devloper working in Divine IT House FSD',
    	]);
    }
}
