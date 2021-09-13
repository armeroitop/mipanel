<?php

namespace App\Http\Controllers;

use App\Codigo;
use App\Persona;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CodigoController extends Controller
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
     * Muestra en el Select2 las empresas en las que el usuario tiene un contrato laboral activo
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = Auth::user();
        $persona = $usuario->persona()->get()->last();
        $contratos = $persona->contrato()->with('estadoLaboral')->get()->all();
             
        //Creamos unos contenedores
        $empresas = collect([]);
        
        foreach ($contratos as $contrato) {           
            if ( $contrato->estadoLaboral->last()->estado == 'alta' ) {  
                $empresas->push($contrato->empresa);      
            }            
        }
       
        //Formateamos la respuesta para que la lea SELECT2
        $contenedor = [];      
        
        foreach ($empresas as $empresa) {
                       
            $contenedor[]= ['id' => $empresa->id, 'text' => $empresa->nombre];            
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
        //dd($request);
        $codigo = new Codigo($request->all());
        $codigo->save();
        
        $notification = array(
            'titulo' => 'Se ha guardado',
            'message' => 'el código ',
            'alert-type' => 'success'
        );         
        return back()->with($notification);        
    }

    /**
     * Display the specified resource.
     * //TODO deberia mostrar si la obra tiene ya un codigo tanto de cliente como de la propia empresa
     *
     * @param  \App\Codigo  $codigo
     * @return \Illuminate\Http\Response
     */
    public function show(Codigo $codigo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Codigo  $codigo
     * @return \Illuminate\Http\Response
     */
    public function edit(Codigo $codigo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Codigo  $codigo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codigo $codigo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Codigo  $codigo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Codigo $codigo)
    {
        //
    }
}
