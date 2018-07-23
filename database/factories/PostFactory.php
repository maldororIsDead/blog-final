<?php

use Faker\Generator as Faker;
use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'summary' => $faker->paragraph,
        'body' => $faker->text(500),
        'created_at' => $faker->dateTime
    ];
});
