<?php

use Faker\Generator as Faker;

$factory->define(App\CupProfile::class, function (Faker $faker) {
    return [
        'cup_score' => rand(80, 90),
        'aroma' => $faker->text(10),
        'flavor' => $faker->text(10),
        'acidity' => $faker->text(10),
        'body' => $faker->text(10),
        'sweetness' => $faker->text(10),
        'balance_value' => rand(1, 10),
        'balance_description' => $faker->text(10),
        'total_input_weight' => rand(100, 300),
        'estimated_output' => rand(100, 300)
    ];
});
