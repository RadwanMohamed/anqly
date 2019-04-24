<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Charge;
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

$factory->define(Charge::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'code' => \App\Charge::generateChargeCode(),
        'count' => 5,
        'status'=>$faker->randomElement([\App\Charge::FIXED,\App\Charge::DYNAMIC]),
        'value' => $faker->randomElement([100,200,0,300,0,400,500]),
    ];
});
