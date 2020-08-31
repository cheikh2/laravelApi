<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Compte;
use Faker\Generator as Faker;

$factory->define(Compte::class, function (Faker $faker) {

    return [
        'numAgence' => $faker->word,
        'numCompte' => $faker->word,
        'rib' => $faker->word,
        'debutBlocage' => $faker->word,
        'finBlocage' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
