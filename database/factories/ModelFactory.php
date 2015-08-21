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

$factory->define(App\User::class, function ($faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => str_random(10),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Post::class, function ($faker) {
    return [
        'slug'      => $faker->slug(),
        'title'     => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'body'      => $faker->text,
        'published' => $faker->boolean($chanceOfGettingTrue = 75)
    ];
});


$factory->define(App\Tag::class, function ($faker) {
    return [
        'name' => $faker->word(),
    ];
});
