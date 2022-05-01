<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use HAE\Coordination;
use Faker\Generator as Faker;

$factory->define(Coordination::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle(),
        'slug' => $faker->word(),
        'status' => $faker->randomElement([0, 1]),
    ];
});
