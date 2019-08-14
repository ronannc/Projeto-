<?php

use App\Models\Shoulder;
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

$factory->define(Shoulder::class, function (Faker $faker) {
    return [
        'exercise'    => $faker->name,
        'description' => $faker->text(15)
    ];
});