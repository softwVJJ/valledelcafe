<?php

use Faker\Generator as Faker;

$factory->define(App\InputLot::class, function (Faker $faker) {
    return [
        'input_date' => $faker->date(),
        'kilos_number' => rand(50, 100),
        'available_kilos' => rand(0, 100),
        'estates_id' => rand(1, 20),
        'cup_profiles_id' => rand(1, 10),
        'yield_factors_id' => rand(1, 10) 
    ];
});
