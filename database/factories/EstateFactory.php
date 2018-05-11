<?php

use Faker\Generator as Faker;

$factory->define(App\Estate::class, function (Faker $faker) {
    return [
        'name' => $faker->text(20),
        'address' => $faker->address,
        'altitude' => rand(1000, 3000),
        'vereda' => $faker->text(20),
        'people_id' => rand(1, 100),
        'municipalities_id' => rand(1, 1100) 
    ];
});
