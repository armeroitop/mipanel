<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Cargoable;
use Illuminate\Http\Request;

class CargoController extends Controller
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
        $cargos = Cargo::where('nombre','LIKE','%'.$request->q.'%')->get();

        //Formateamos la respuesta para que la lea SELECT2
        $contenedor = [];      
        
        foreach ($cargos as $cargo) {
                       
            $contenedor[]= ['id' => $cargo->id, 'text' => $cargo->nombre];            
        }
        
       // dd($contenedor);
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
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargo $cargo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        //
    }

    /**
     * Guarda un cargo para una persona en una obra.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function asignaCargoParticipante(Request $request)
    {
        $cargoable = new Cargoable($request->all());
        //dd($cargoable);
        $cargoable->cargoable_type = 'App\Obra';
        $cargoable->cargoable_id = $request->obra_id;
        $cargoable->save();

        $notification = array(
            'message' => 'el participante ' ,
            'titulo' => 'Se ha guardado',
            'alert-type' => 'success'
        ); 
        
        return back()->with($notification);

        //dd($cargoable);
    }



}
