<?php

use Faker\Generator as Faker;

$factory->define(App\YieldFactor::class, function (Faker $faker) {
    return [
        'yield_factor' => rand(85, 100),
        'pasilla_percentage' => rand(0, 100),
        'white_percentage' => rand(0, 100),
        'fermented_percentage' => rand(0, 100),
        'berry_borer_percentage' => rand(0, 100)
    ];
});
