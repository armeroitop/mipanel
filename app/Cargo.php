<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    
    // tiene muchos cargos a traves de polimorfico
    public function personas(){

        return $this->morphedByMany(Persona::class, 'cargoable'); //relacion muchos a muchos "una persona tiene muchos cargos y un cargo tiene muchas personas"
    }
}
