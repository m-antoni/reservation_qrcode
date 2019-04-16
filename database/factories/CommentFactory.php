<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function(Faker $faker){
	return [
		'name' => $faker->name,
		'email' => $faker->unique()->email,
		'message' => $faker->text
	];
});
