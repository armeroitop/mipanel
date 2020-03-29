<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Obra;
use Faker\Generator as Faker;

$factory->define(Obra::class, function (Faker $faker) {
    return [
        'nombre'            => $faker->name,
        'descripcion'       => $faker->sentence,
        'direccion'         => $faker->address,
        'proyecto'          => $faker->boolean,
        'inicio_previsto'   => $faker->dateTimeAD,
        'fin_previsto'      => $faker->dateTimeAD,

    ];
});
