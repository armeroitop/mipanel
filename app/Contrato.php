<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $fillable = [
        
    ];

    //Relacion con tabla pivote "contrato_estado_laboral"
    
    public function estadoLaboral()
    {
        //return $this->belongsToMany('App\EstadoLaboral')->withPivot('fecha')->withTimestamps();
        
        return $this->belongsToMany('App\EstadoLaboral','contrato_estado_laboral','contrato_id','estado_laboral_id')->withTimestamps();
    }
    
    public function persona()
    {
        
        return $this->belongsTo('App\Persona','persona_id');
    }

   /*  public function activo()
    {
        return $this->belongsToMany('App\EstadoLaboral')->withPivot('fecha')->withTimestamps();
    } */
}
