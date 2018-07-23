<?php

use Faker\Generator as Faker;
use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'summary' => $faker->paragraphs(1, true),
        'body' => $faker->paragraphs(7, true),
        'created_at' => $faker->dateTime
    ];
});
