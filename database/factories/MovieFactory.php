<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Movie\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'name' => $faker->city . $faker->streetName . $faker->name,
        'description' => $faker->realText(rand(500, 800)),
        'release_date' => $faker->dateTimeBetween($startDate = '-10 years', $endDate = '+1 years', $timezone = null)->format('Y-m-d'),
        'length' => $faker->numberBetween($min = 15, $max = 360),

        'movie_nation_id' => $faker->numberBetween($min = 1, $max = 8),
        'movie_language_id' => $faker->numberBetween($min = 1, $max = 8),
        'movie_category_id' => $faker->numberBetween($min = 1, $max = 8),
    ];
});
