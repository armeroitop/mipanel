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
}
