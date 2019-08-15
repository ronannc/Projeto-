<?php

use App\Models\Client;
use App\Models\Workout;
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

$factory->define(Workout::class, function (Faker $faker) {
    return [
        'start'        => $faker->date(),
        'next_workout' => $faker->date(),
        'note'         => $faker->name,
        'goal'         => $faker->name,
        'interval'     => $faker->name,
        'frequency'    => $faker->name,
        'client_id'    => Client::with([])->inRandomOrder()->first()->id,
    ];
});
