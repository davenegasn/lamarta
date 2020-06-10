<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'image' => $faker->image('public/storage/images',640,480, null, false),
        'unit_price' => $faker->numberBetween($min = 1000, $max = 5000), 
        'display_order' => $faker->unique()->randomDigit(),
    ];
});
