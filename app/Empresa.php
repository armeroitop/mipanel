<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nombre',  
        'cif',  
        'direccion',
        'localidad_id',
    ];
    
    
    public function localidad()
    {
        return $this->belongsTo('App\Localidad','localidad_id');
    }


    // tiene trabajadores con estado activo
    public function trabajador()
    {
        return $this->belongsToMany('App\Persona','contratos','empresa_id','persona_id')
            
            ->withTimestamps();
    }

    // tiene subcontrataciones
    public function subcontrataciones()
    {
        return $this->hasMany('App\Subcontratacion','contratado_id');
    }


    // tiene trabajadores con estado baja


    // tiene un codigo para una obra 
    public function codigoObra()
    {
        //return $this->hasOne('App\Codigo','empresa_id','obra_id');
        return $this->hasMany('App\Codigo');
    }
    
}
