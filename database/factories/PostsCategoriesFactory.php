<?php

use Faker\Generator as Faker;

$factory->define(App\PostsCategories::class, function (Faker $faker) {
    return [
        'catname' => $faker->sentence,
    ];
});
