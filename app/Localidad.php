<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    // pertenece a una provincia
    public function provincia()
    {
        //return $this->belongsTo('App\Provincia','provincia_id');
        return $this->belongsTo('App\Provincia');
    }

    // tiene muchas obras

    // tiene muchas empresas



}
