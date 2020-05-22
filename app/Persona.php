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
   /*  public function contrato(){

        return $this->hasManyThrough('App\Contrato', 'App\EstadoLaboral'); //relacion muchos a muchos "una persona tiene muchos cargos y un cargo tiene muchas personas"
    } */

    public function empresa()
    {
        return $this->belongsToMany('App\Empresa','contratos','persona_id','empresa_id')->withTimestamps();
    }

}
