<?php

use App\Models\LowerMember;
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

$factory->define(LowerMember::class, function (Faker $faker) {
    return [
        'exercise'    => $faker->name,
        'description' => $faker->text(15)
    ];
});
