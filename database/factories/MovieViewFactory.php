<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Movie\MovieView;
use Faker\Generator as Faker;

$factory->define(MovieView::class, function (Faker $faker) {
    return [
        'date' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null)->format('Y-m-d'),
        'count' => $faker->numberBetween(10, 1000),
        'movie_id' => $faker->numberBetween(10, 3000)
    ];
});
