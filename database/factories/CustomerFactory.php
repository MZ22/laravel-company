<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'tel' => $faker->randomNumber(9),
        'password' => '123456',
        'delivery_address' => $faker->streetAddress,
    ];
});


