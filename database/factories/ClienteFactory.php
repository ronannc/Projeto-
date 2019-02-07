<?php

use Faker\Generator as Faker;
use App\Models\Cliente;

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

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'cpf' => $faker->numberBetween([10000000000], [99999999999]),
        'telefone' => $faker->numberBetween([10000000], [99999999]),
        'treino' => $faker->name

    ];
});
