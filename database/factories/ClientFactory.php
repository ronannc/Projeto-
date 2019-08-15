<?php

use App\Models\City;
use App\Models\Client;
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

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name'         => $faker->name,
        'cpf'          => rand(10000000, 99999999),
        'phone'        => rand(10000000, 99999999),
        'birthday'     => $faker->date(),
        'avatar'       => $faker->imageUrl(),
        'street'       => $faker->streetName,
        'neighborhood' => $faker->word,
        'number'       => $faker->numberBetween(1, 500),
        'complement'   => $faker->company,
        'zipcode'      => rand(90000, 99999) . '-' . rand(1, 999),
        'city_id'      => City::with([])->inRandomOrder()->first()->id,
    ];
});
