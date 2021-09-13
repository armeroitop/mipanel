<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $fillable = [
        'nombre',        
        'descripcion',
        'direccion',
        'proyecto',
        'localidad_id',
        'inicio_previsto',
        'fin_previsto'
    ];

    // tiene muchas subcontrataciones
    public function subcontratacion(){
        
        return $this->hasMany('App\Subcontratacion','obra_id');        
    }

    // pertenece a una localidad
    public function localidad(){
        
        return $this->belongsTo('App\Localidad');        
    }

    // pertenece a una provincia a traves de localidad

    public function cargos()
    {
        return $this->morphToMany(Cargo::class,'cargoable');
    }

    //Una obra tiene muchos códigos, el del cliente/promotor y el de las empresas que quieran codificar la obra
    public function codigoObra(){
        return $this->hasMany('App\Codigo','obra_id','empresa_id');
    }
}
