<?php

use App\Models\PhysicalAssessment;
use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

$factory->define(PhysicalAssessment::class, function (Faker $faker) {
    return [
        'id'             => Uuid::uuid4(),
        'neck'           => $faker->numberBetween(1, 200),
        'shoulder'       => $faker->numberBetween(1, 200),
        'chest'          => $faker->numberBetween(1, 200),
        'right_arm'      => $faker->numberBetween(1, 200),
        'left_arm'       => $faker->numberBetween(1, 200),
        'right_forearm'  => $faker->numberBetween(1, 200),
        'left_forearm'   => $faker->numberBetween(1, 200),
        'waist'          => $faker->numberBetween(1, 200),
        'abdomen'        => $faker->numberBetween(1, 200),
        'hip'            => $faker->numberBetween(1, 200),
        'right_thigh'    => $faker->numberBetween(1, 200),
        'left_thigh'     => $faker->numberBetween(1, 200),
        'right_calf'     => $faker->numberBetween(1, 200),
        'left_calf'      => $faker->numberBetween(1, 200),
        'height'         => $faker->randomFloat(2, 0, 2),
        'weight'         => $faker->randomFloat(2, 2, 200),
        'blood_pressure' => $faker->name,
    ];
});
