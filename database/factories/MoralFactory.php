<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Moral;
use Faker\Generator as Faker;

$factory->define(Moral::class, function (Faker $faker) {

    return [
        'nomEmpl' => $faker->word,
        'ninea' => $faker->word,
        'rc' => $faker->word,
        'adressEmpl' => $faker->word,
        'raisonSocial' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
