<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Empresa;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    return [
        
        'nombre'            => $faker->name,            
        'cif'               => $faker->name,            
        'direccion'         => $faker->address,
               
        
    ];
});
