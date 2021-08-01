<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Codigo extends Model
{
    //Le decimos a Eloquent que la tabla de la base de datos para este modelo es la siguiente
    protected $table = 'codigo_empresa_obra';
    
    protected $fillable = [
        'empresa_id',
        'obra_id',
        'codigo'
    ];
}
