<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
/*
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
*/


$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
    	'username' => 'ernesto',
    	'email' => 'ernesto@gmail.com',
    	'password' => bcrypt('secret'),
    	'active' => '1',
    ];
});



$factory->define(App\Post::class, function (Faker\Generator $faker) {

    return [
    	'title' => $faker->sentence,
    	'image_url' => $faker->imageUrl(800, 400, 'cats', true, 'Faker'),
    	'user_id' => '1',
    ];
});
