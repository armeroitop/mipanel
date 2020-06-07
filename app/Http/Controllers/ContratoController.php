<?php

namespace App\Http\Controllers;

use App\Contrato;
use App\Persona;
use App\Empresa;
use Illuminate\Http\Request;

class ContratoController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show(Contrato $contrato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contrato $contrato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contrato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrato $contrato)
    {
        //
    }

    /**
     * Asigna un trabajador a una empresa.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function altaTrabajador(Request $request)
    {
        //filtramos el dni de caracteres que no nos interesan
        $dni = preg_replace('/[^0-9a-zA-Z_]/', '', $request->dni);      # Strip all whitespaces
        //dd($dni);
       
        //Si el trabajador ya existe en la tabla de 'personas' simplemente lo asignamos y sino lo creamos
        if (Persona::where( 'dni', '=',  $dni)->get()->count()>0) {
            $persona = Persona::where( 'dni', '=',  $dni)->get()->first();
            
            // Asignar la relacion del trabajador y la empresa en la tabla "contratos"
            $empresa = Empresa::find($request->empresa_id);
           

            // Asignar un estado de activo en la tabla "contrato_estado_laboral" solo si 
            $persona = $persona->fresh();      
                          
            $contrato = Contrato::where('persona_id', 'like', $persona->id)
                                ->where('empresa_id', 'like', $empresa->id)
                                ->get()
                                ->last();
            if(!$contrato){
                $persona->empresa()->attach($empresa->id);
                
                $contrato = Contrato::where('persona_id', 'like', $persona->id)
                                ->where('empresa_id', 'like', $empresa->id)
                                ->get()
                                ->last();
            }
          
            //dar alta  si no tenia ya el alta
            if($contrato->estadoLaboral->count() == 0 ){
                $contrato->estadoLaboral()->attach([1 => ['fecha' => $request->fecha_alta]]);
            }elseif($contrato->estadoLaboral->last()->estado != 'alta'){
                $contrato->estadoLaboral()->attach([1 => ['fecha' => $request->fecha_alta]]);
            }else{
                $notification = array(
                    'message' => 'el trabajador ' .$persona->nombre,
                    'titulo' => 'Ya pertenece',
                    'alert-type' => 'warning'
                ); 
                
                return back()->with($notification);                
            }

        }else {
           // dd($request->all());
            //Crear el trabajador
            $persona = new Persona($request->all());
            $persona->dni = preg_replace('/[^0-9a-zA-Z_]/', '', $request->dni); # Strip all whitespaces
            $persona->save();

            //Asignar la relacion del trabajador y la empresa en la tabla "contratos"
            $empresa = Empresa::find($request->empresa_id);
            $persona->empresa()->attach($empresa->id);

            // Asignar un estadoLaboral "activo" en la tabla "contrato_estado_laboral"
            $persona = $persona->fresh();      
                          
            $contrato = Contrato::where('persona_id', 'like', $persona->id)
                                ->where('empresa_id', 'like', $empresa->id)
                                ->get()
                                ->last();
          
            $contrato->estadoLaboral()->attach([1 => ['fecha' => $request->fecha_alta]]);
        }
        

        $notification = array(
            'message' => 'el trabajador ' .$persona->nombre ,
            'titulo' => 'Se ha dado de alta',
            'alert-type' => 'success'
        ); 
        
        return back()->with($notification);
    }

    public function bajaTrabajador(Request $request, Contrato $contrato){
       // dd($request);
        $contrato->estadoLaboral()->attach([2 => ['fecha' => now()]]);

        $notification = array(
            'message' => 'el trabajador ' ,
            'titulo' => 'Se ha dado de baja',
            'alert-type' => 'success'
        ); 
        
        return back()->with($notification);
    }



}
