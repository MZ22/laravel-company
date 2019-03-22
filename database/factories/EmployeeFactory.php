<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birthdate' => $faker->dateTimeThisCentury->format('d-m-Y'),
        'workdate' => $faker->dateTimeThisCentury->format('d-m-Y'),
        'email' => $faker->unique()->email,
        'phone' => $faker->phoneNumber,
        'cv' => "/storage/files/cv.pdf",
        'jobtitle' => $faker->jobTitle,
        'salary' => $faker->randomNumber(4),
        'iddprt' => rand(1, 5),
    ];

 
});