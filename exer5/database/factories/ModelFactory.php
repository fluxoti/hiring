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


$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [

        'name' => $faker->name(),
        'birth' => $faker->date(),
        'address' => $faker->streetAddress(),
        'phone' => '42'.$faker->randomNumber(8),
    ];
});
