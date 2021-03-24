<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cinema;
use Faker\Generator as Faker;

$factory->define(Cinema::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'image' => $faker->image('public/cinema_images',640,480, null, false),
    ];
});
