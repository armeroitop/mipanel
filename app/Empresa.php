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
}
