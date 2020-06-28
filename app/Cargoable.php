<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargoable extends Model
{
    protected $fillable = [
        'cargo_id',
        'persona_id',
        'cargoable_type',
        'cargoable_id'
    ];

    public function persona()
    {        
        return $this->belongsTo('App\Persona','persona_id');
    }
    public function cargo()
    {        
        return $this->belongsTo('App\Cargo','cargo_id');
    }
}
