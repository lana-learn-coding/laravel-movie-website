<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Movie\MovieGenre;
use Faker\Generator as Faker;

$factory->define(MovieGenre::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->sentence(rand(1, 2), false)
    ];
});
