<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcontratacion extends Model
{
    protected $fillable = [
        'orden',        
        'obra_id',
        'contratante_id',
        'contratado_id',
        'nivel',
        'representante_contratante_id',
        'representante_contratado_id'
    ];

    public function contratante(){

        return $this->belongsTo('App\Empresa','contratante_id');
    }
    public function contratado(){

        return $this->belongsTo('App\Empresa','contratado_id');
    }

    public function obra(){
        return $this->belongsTo('App\Obra');
    }
}
