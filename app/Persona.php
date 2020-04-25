<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'nombre',        
        'apellidos',
        'dni',
        'fecha_nacimiento',        
    ];
}
