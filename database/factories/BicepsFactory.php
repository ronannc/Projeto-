<?php

use App\Models\Biceps;
use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

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

$factory->define(Biceps::class, function (Faker $faker) {
    return [
        'id'          => Uuid::uuid4(),
        'exercise'    => $faker->name,
        'description' => $faker->text(15)
    ];
});
