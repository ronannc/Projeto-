<?php

use Faker\Generator as Faker;
use App\Models\Ombro;

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

$factory->define(Ombro::class, function (Faker $faker) {
    return [
        'exercicio' => $faker->name,
        'descricao' => $faker->text(15)
    ];
});
