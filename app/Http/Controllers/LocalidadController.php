<?php

namespace App\Http\Controllers;

use App\Localidad;
use Illuminate\Http\Request;

class LocalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $localidades = Localidad::where('nombre','LIKE','%'.$request->q.'%')->get();

       //Formateamos la respuesta para que la lea SELECT2
        $contenedor = [];
        $nombreProv = "desconocido";
        
        foreach ($localidades as $localidad) {
            //dd($localidad->provincia()->get()->nombre);            
           
            if($localidad->provincia){
                $nombreProv = $localidad->provincia->nombre;
            }else{
                $nombreProv = "Provincia desconocida";
            }
           // $contenedor[]= ['id' => $localidad->id, 'text' => [$localidad->nombre,' - ', $nombreProv ]];
            $contenedor[]= ['id' => $localidad->id, 'text' => [$localidad->nombre.' ('.$nombreProv.')']];
            //$contenedor[]= ['id' => $localidad->id, 'text' => [$localidad->nombre,'-', $localidad->provincia->nombre]];
            
            //$contenedor[]= ['id' => $localidad->id, 'text' => [$localidad->nombre]];
        }
      
       return response()->json($contenedor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Localidad  $localidad
     * @return \Illuminate\Http\Response
     */
    public function show(Localidad $localidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Localidad  $localidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Localidad $localidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Localidad  $localidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Localidad $localidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Localidad  $localidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Localidad $localidad)
    {
        //
    }
}
