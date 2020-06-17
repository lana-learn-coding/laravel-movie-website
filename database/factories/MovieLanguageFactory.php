<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Movie\MovieLanguage;
use Faker\Generator as Faker;

$factory->define(MovieLanguage::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->sentence(1, false)
    ];
});
