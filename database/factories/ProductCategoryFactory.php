<?php

use Faker\Generator as Faker;

$factory->define(App\ProductCategory::class, function (Faker $faker) {
    return [
        'nomcat' => $faker->name,
        'image' => "/storage/files/divya.jpg",
		'description' => $faker->text,
    ];
});
