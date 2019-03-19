<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birthdate' => $faker->dateTimeThisCentury->format('d-m-Y'),
        'workdate' => $faker->dateTimeThisCentury->format('d-m-Y'),
        'email' => $faker->unique()->email,
        'phone' => $faker->phoneNumber,
        'cv' => $faker->name,
        'jobtitle' => $faker->jobTitle,
        'salary' => $faker->randomNumber(4),
        'iddprt' => function(){
            return factory('App\Department')->create()->id;
        },

    ];

 
});