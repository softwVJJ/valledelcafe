<?php

use Faker\Generator as Faker;

$factory->define(App\OutputLot::class, function (Faker $faker) {
    return [
        'kilos_number' => rand(50, 100),
        'input_lots_id' => rand(1, 20),
        'coffee_lines_id' => rand(1, 4)
    ];
});
