<?php

use Faker\Generator as Faker;

$factory->define(App\Posts::class, function (Faker $faker) {
        return [
        'title' => $faker->sentence,
        'description' => $faker->text,
        'image' => "/storage/files/posts.jpg",
        'idcat' => rand(1, 5),
    	];
});
