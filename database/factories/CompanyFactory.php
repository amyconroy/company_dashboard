<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\company;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(company::class, function (Faker $faker) {
    return [
        'companyName' => $faker->name,
        'companyDescription' => Str::random(10),
        'userId' => Int::random(1)
    ];
});

