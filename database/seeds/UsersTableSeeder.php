<?php

use Carbon\Carbon;
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
        $inserts = array(
            [
                'name' => 'Wolfgang',
                'second_name' => 'Dielingen',
                'email' => 'wolfrainx@gmail.com',
                'password' => bcrypt('1234'),
                'remember_token' => str_random(10),
                'role_id' => 1,
                'user_id' => null,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Fabrizio',
                'second_name' => 'Dielingen',
                'email' => 'fabriziod704@gmail.com',
                'password' => bcrypt('1234'),
                'remember_token' => str_random(10),
                'role_id' => 2,
                'user_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Madeline',
                'second_name' => 'Rodríguez',
                'email' => 'made1306@gmail.com',
                'password' => bcrypt('1234'),
                'remember_token' => str_random(10),
                'role_id' => 3,
                'user_id' => 2,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Boris',
                'second_name' => 'Treccani',
                'email' => 'bps139@gmail.com',
                'password' => bcrypt('1234'),
                'remember_token' => str_random(10),
                'role_id' => 2,
                'user_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Alejandro',
                'second_name' => 'Del Mar',
                'email' => 'alejandro.delmar@gmail.com',
                'password' => bcrypt('1234'),
                'remember_token' => str_random(10),
                'role_id' => 3,
                'user_id' => 4,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Claudia',
                'second_name' => 'Bruno',
                'email' => 'claudibru@gmail.com',
                'password' => bcrypt('1234'),
                'remember_token' => str_random(10),
                'role_id' => 3,
                'user_id' => 4,
                'created_at' => Carbon::now()
            ]
        );
        DB::table('users')->insert($inserts);
    }
}
