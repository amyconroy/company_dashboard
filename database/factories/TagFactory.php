<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\tags;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(tags::class, function (Faker $faker) {
    return [
        'tagName' => $faker->name,
    ];
});
