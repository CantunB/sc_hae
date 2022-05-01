<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use HAE\Providers;

$factory->define(Providers::class, function (Faker $faker) {
    return [
        'name' => $faker->catchPhrase(),
        'email' => $faker->companyEmail(),
        'rfc' => $faker->swiftBicNumber(),
        'address' => $faker->address(),
        'phone' => $faker->tollFreePhoneNumber(),
        'website' => $faker->url(),
        'description' => $faker->word(),
        'status' => $faker->randomElement([0, 1]),
    ];
});
