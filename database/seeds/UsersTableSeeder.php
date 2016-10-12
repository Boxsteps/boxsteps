<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            [
                'id' => 1,
                'name' => 'Wolfgang',
                'second_name' => 'Dielingen',
                'email' => 'wolfrainx@gmail.com',
                'password' => bcrypt('1234'),
                'remember_token' => str_random(10),
                'role_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Fabrizio',
                'second_name' => 'Dielingen',
                'email' => 'fabriziod704@gmail.com',
                'password' => bcrypt('1234'),
                'remember_token' => str_random(10),
                'role_id' => 2
            ],
            [
                'id' => 3,
                'name' => 'Madeline',
                'second_name' => 'Rodríguez',
                'email' => 'made1306@gmail.com',
                'password' => bcrypt('1234'),
                'remember_token' => str_random(10),
                'role_id' => 3
            ],
            [
                'id' => 4,
                'name' => 'Boris',
                'second_name' => 'Treccani',
                'email' => 'bps139@gmail.com',
                'password' => bcrypt('1234'),
                'remember_token' => str_random(10),
                'role_id' => 3
            ]
        );
        DB::table('users')->insert( $users );
    }
}
