<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'image' => "/storage/files/divya.jpg",
        'description' => $faker->jobTitle,
        'price' => $faker->randomNumber(2),
        'idpcat' => rand(1, 5),
    ];
});
