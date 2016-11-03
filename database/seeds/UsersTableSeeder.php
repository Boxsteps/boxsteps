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
        $dt = new DateTime;

        $inserts = array(
            [
                'name' => 'Wolfgang',
                'second_name' => 'Dielingen',
                'email' => 'wolfrainx@gmail.com',
                'password' => bcrypt('1234'),
                'remember_token' => str_random(10),
                'role_id' => 1,
                'user_id' => null,
                'created_at' => $dt->format('d-m-y H:i:s')
            ],
            [
                'name' => 'Fabrizio',
                'second_name' => 'Dielingen',
                'email' => 'fabriziod704@gmail.com',
                'password' => bcrypt('1234'),
                'remember_token' => str_random(10),
                'role_id' => 2,
                'user_id' => 1,
                'created_at' => $dt->format('d-m-y H:i:s')
            ],
            [
                'name' => 'Madeline',
                'second_name' => 'Rodríguez',
                'email' => 'made1306@gmail.com',
                'password' => bcrypt('1234'),
                'remember_token' => str_random(10),
                'role_id' => 3,
                'user_id' => 2,
                'created_at' => $dt->format('d-m-y H:i:s')
            ],
            [
                'name' => 'Boris',
                'second_name' => 'Treccani',
                'email' => 'bps139@gmail.com',
                'password' => bcrypt('1234'),
                'remember_token' => str_random(10),
                'role_id' => 3,
                'user_id' => 2,
                'created_at' => $dt->format('d-m-y H:i:s')
            ],
            [
                'name' => 'Marcos',
                'second_name' => 'Sanlo',
                'email' => 'mdsanlog@gmail.com',
                'password' => bcrypt('1234'),
                'remember_token' => str_random(10),
                'role_id' => 2,
                'user_id' => 1,
                'created_at' => $dt->format('d-m-y H:i:s')
            ]
        );
        DB::table('users')->insert( $inserts );
    }
}
