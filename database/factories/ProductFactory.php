<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'detail' => $faker->text(20),
        'price' => $faker->numberBetween(30, 200),
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(2, 30)
    ];
});
