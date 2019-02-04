<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'category_id' => $faker->numberBetween(1, 3),
        'image' => 'images/products/tshirt.jpg',
        'description' => $faker->paragraph(4),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 2, $max = 50),
    ];
});
