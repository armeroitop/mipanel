<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoLaboral extends Model
{


    public function contrato()
    {
        return $this->belongsToMany('App\Contrato')->withPivot('fecha')->withTimestamps();
    }
}
