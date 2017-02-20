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
    	'image_url' => 'public/images/image.jpeg',
    	'user_id' => 1,
        'category_id' => $faker->numberBetween(1, 4),
        'votes' => $faker->randomNumber(4)
    ];
});


$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
    	'body' => $faker->text,
        'active' => 1,
        'post_id' => 1,
        'user_id' => 1
    ];
});


$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'active' => 1
    ];
});


