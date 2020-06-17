<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Movie\MovieNation;
use Faker\Generator as Faker;

$factory->define(MovieNation::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->sentence(1, false)
    ];
});
