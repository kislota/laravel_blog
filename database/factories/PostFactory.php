<?php

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'head' => $faker->text(50),
        'text' => $faker->text(500),
        'img' => $faker->imageUrl(),
        'user_id_like' => '',
    ];
});
