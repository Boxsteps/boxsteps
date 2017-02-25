<?php

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
        'name' => $faker->name,
        'second_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'role_id' => $faker->numberBetween($min = 1, $max = 3)
    ];
});

$factory->define(App\Student::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'second_name' => $faker->lastName,
        'address' => $faker->address,
        'dni' => $faker->numberBetween($min = 25000000, $max = 30000000),
        'email' => $faker->unique()->userName . '@gmail.com',
        'phone' => '0212' . $faker->randomNumber(7),
        'mobile' => '0416' . $faker->randomNumber(7)
    ];
});

$factory->define(App\Message::class, function (Faker\Generator $faker) {
    return [
        'message' => $faker->sentence($nbWords = 15, $variableNbWords = true),
        'user_id' => $faker->numberBetween($min = 1, $max = 6)
    ];
});

$factory->define(App\Condition::class, function (Faker\Generator $faker) {
    return [
        'state_id' => $faker->numberBetween($min = 4, $max = 5),
        'user_id' => $faker->numberBetween($min = 1, $max = 6),
        'message_id' => $faker->unique()->numberBetween($min = 2, $max = 10)
    ];
});
