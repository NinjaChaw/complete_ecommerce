<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'photo' =>  'book.png',
        'price' => $faker->numberBetween(100, 10000),
        'description' => $faker->paragraph(4),
    ];
});
