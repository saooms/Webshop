<?php

use App\Articles;
use Faker\Generator as Faker;

$factory->define(App\Articles::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraphs(1, true),
        // 'description' => "made by: ".$faker->company,
        'price' => random_int(50, 200),
        'categories_id' => random_int(1, 5)
    ];
});
