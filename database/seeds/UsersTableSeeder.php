<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
            'f_name' => 'muzammal',
            'l_name' => 'ikram',
            'email' => 'muzammal@gmail.com',
            'password' => Hash::make('123456'),
            'date' => 1,
            'month' => 'january',
            'year' => '1997',
            'gender' => 'M',
            'city' => 'Faisalabad',
            'country' => 'Pakistan', 
        ]); 

        return User::create([
            'f_name' => 'mudassar',
            'l_name' => 'ikram',
            'email' => 'mudassar@gmail.com',
            'password' => Hash::make('123456'),
            'date' => 1,
            'month' => 'january',
            'year' => '1997',
            'gender' => 'M',
            'city' => 'Faisalabad',
            'country' => 'Pakistan', 
        ]); 
        
        return User::create([
            'f_name' => 'mubshar',
            'l_name' => 'ikram',
            'email' => 'mubshar@gmail.com',
            'password' => Hash::make('123456'),
            'date' => 1,
            'month' => 'january',
            'year' => '1997',
            'gender' => 'M',
            'city' => 'Faisalabad',
            'country' => 'Pakistan', 
        ]); 

    }
}
