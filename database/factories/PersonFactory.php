<?php

use Faker\Generator as Faker;

$factory->define(App\Person::class, function (Faker $faker) {
    return [
        'names' => $faker->firstNameMale,
        'surnames' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'address' => $faker->text(20),
        'email' => $faker->email,
        'identification_types_id' => rand(1, 5) 
    ];
});
