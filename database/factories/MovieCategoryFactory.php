<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Movie\MovieCategory;
use Faker\Generator as Faker;

$factory->define(MovieCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->sentence(1, false)
    ];
});
