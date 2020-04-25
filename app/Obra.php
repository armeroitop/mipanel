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

    public function subcontratacion(){
        
        return $this->hasMany('App\Subcontratacion','obra_id');        
    }
}
