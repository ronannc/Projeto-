<?php

use App\Models\City;
use App\Models\Company;
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

$factory->define(Company::class, function (Faker $faker) {
    return [
        'id'            => Uuid::uuid4(),
        'name'          => $faker->word,
        'social_reason' => $faker->companySuffix,
        'cnpj'          => $faker->creditCardNumber,
        'phone'         => $faker->phoneNumber,
        'street'        => $faker->streetName,
        'neighborhood'  => $faker->word,
        'number'        => $faker->numberBetween(1, 500),
        'complement'    => $faker->company,
        'zipcode'       => rand(90000, 99999) . '-' . rand(1, 999),
        'city_id'       => City::with([])->inRandomOrder()->first()->id,
    ];
});
