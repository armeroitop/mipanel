<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    
    public function provincia()
    {
        return $this->belongsTo('App\Provincia','provincia_id');
    }
}
