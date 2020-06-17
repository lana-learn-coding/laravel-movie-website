<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cast;
use Faker\Generator as Faker;

$factory->define(Cast::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'birth_date' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
