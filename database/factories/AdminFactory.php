<?php

use Faker\Generator as Faker;

 // Default Admin data to be seeded
$factory->define(App\Admin::class, function(Faker $faker){
	return [
		'name' => 'admin',
		'password' => bcrypt('administratormichaelantoni2019')			
	];
});
