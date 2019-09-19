<?php

use App\Models\Goal;
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

$factory->define(Goal::class, function (Faker $faker) {
    return [
        'id'          => Uuid::uuid4(),
        'name'        => $faker->name,
        'description' => $faker->name,
    ];
});
