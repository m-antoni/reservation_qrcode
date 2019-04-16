<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Log::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'time_in' => $faker->date(),
        'time_out' => $faker->date(),
        'status' => $faker->randomElement(array('Active', 'Inactive'))
    ];
});
