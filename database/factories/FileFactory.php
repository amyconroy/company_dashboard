<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\files;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(files::class, function (Faker $faker) {
    return [
        'fileName' => $faker->name,
        'filePath' => $faker->unique()->safeEmail,
        'userId' => Int::random(1),
    ];
});
