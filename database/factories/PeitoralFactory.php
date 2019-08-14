<?php

use App\Models\Peitoral;
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

$factory->define(Peitoral::class, function (Faker $faker) {
    return [
        'exercicio' => $faker->name,
        'descricao' => $faker->text(15)
    ];
});
