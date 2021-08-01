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


    // tiene muchos cargos a traves de polimorfico
    public function cargos(){

        return $this->morphToMany(Cargo::class, 'cargoable'); //relacion muchos a muchos "una persona tiene muchos cargos y un cargo tiene muchas personas"
    }


     // tiene una relacion laboral con una empresa
    public function contrato(){

        return $this->hasMany('App\Contrato'); //relacion muchos a muchos "una persona tiene muchos cargos y un cargo tiene muchas personas"
    } 

    // tiene una relacion laboral con una o varias empresas a trabes de la tabla "contrato"
    public function empresa()
    {
        return $this->belongsToMany('App\Empresa','contratos','persona_id','empresa_id')->withPivot('id')->withTimestamps();
        /* return $this->belongsToMany('App\Empresa','contratos','persona_id','empresa_id')->withTimestamps(); */
    }

   

}
