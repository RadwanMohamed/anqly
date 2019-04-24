<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->phoneNumber,
        'city' => $faker->city,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        "role" => $role =  $faker->randomElement([\App\User::DRIVER,App\User::CLIENT]),
        "status" => $faker->randomElement([\App\User::ON,\App\User::OFF]),
        "balance"=> $faker->randomElement([100,200,300,400,500,0,0,0]),
        "category_id" => ($role != \App\User::DRIVER) ? null : \App\Category::all()->random()->id,
    ];
});
