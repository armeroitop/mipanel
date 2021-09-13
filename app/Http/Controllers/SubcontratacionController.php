<?php

namespace App\Http\Controllers;

use App\Subcontratacion;
use Illuminate\Http\Request;

class SubcontratacionController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $subcontratacion = new Subcontratacion();        
        $subcontratacion->orden = $request->orden;
        $subcontratacion->nivel = $request->nivel+1;
        $subcontratacion->contratante_id = $request->contratante_id;
        $subcontratacion->contratado_id = $request->contratado_id;
        $subcontratacion->obra_id = $request->obra_id;
        $subcontratacion->save();

        $notification = array(
            'message' => 'la subcontratación' ,
            'titulo' => 'Se ha registrado',
            'alert-type' => 'success'
        );       
        return back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcontratacion  $subcontratacion
     * @return \Illuminate\Http\Response
     */
    public function show(Subcontratacion $subcontratacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcontratacion  $subcontratacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcontratacion $subcontratacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcontratacion  $subcontratacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcontratacion $subcontratacion)
    {
        //
    }

    /**
     * Elimina una subcontratación
     *
     * @param  \App\Subcontratacion  $subcontratacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcontratacion $subcontratacion)
    {
        //dd($subcontratacion->contratado->nombre);
        
        $notification = array(
            'message' => 'la subcontratacion de '.$subcontratacion->contratado->nombre ,
            'titulo' => 'Se ha borrado',
            'alert-type' => 'success'
        ); 
        $subcontratacion->delete();
        return back()->with($notification);
    }
}
