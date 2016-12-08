<?php
use App\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstNameMale,
        'second_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'role_id' => 1
    ];
});

$factory->define(App\Student::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'second_name' => $faker->lastName,
        'address' => $faker->address,
        'dni' => $faker->randomNumber(8),
        'email' => $faker->unique()->freeEmail,
        'phone' => '0212' . $faker->randomNumber(7),
        'mobile' => '0416' . $faker->randomNumber(7)
    ];
});
