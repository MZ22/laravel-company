<?php

use Faker\Generator as Faker;

$factory->define(App\Tasks::class, function (Faker $faker) {
	return [
	'title' => $faker->sentence,
	'description' => $faker->text,
	'requirement' => $faker->text
	];
});
