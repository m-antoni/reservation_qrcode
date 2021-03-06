<?php

use Faker\Generator as Faker;

$factory->define(App\Cash::class, function (Faker $faker) {
    return [
      'name' => $faker->unique()->name,
			'email' => $faker->unique()->email,
			'phone' => $faker->phoneNumber,
			'date' => $faker->date($format = 'Y-m-d', $max = 'now'), // '1979-06-09'
			'amount' => $faker->randomElement(array('1,200','2,700','7,000', '10,000')),
			'token' => str_random(60),
			'status' => $faker->randomElement(array('unpaid', 'paid'))
    ];
});
