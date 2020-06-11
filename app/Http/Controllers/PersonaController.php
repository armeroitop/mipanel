<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Empresa;
use App\Contrato;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return datatables()
        ->eloquent(Persona::query())
        ->addColumn('columna_botones','administrador\trabajador\partials\botonesDT')
        ->rawColumns(['columna_botones'])
        ->toJson();  
       
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
        $persona = new Persona($request->all());
        $persona->dni = preg_replace('/[^0-9a-zA-Z_]/', '', $request->dni); # Strip all whitespaces
        $persona->save();

        $notification = array(
            'message' => 'el trabajador '.$persona->nombre ,
            'titulo' => 'Se ha guardado',
            'alert-type' => 'success'
        ); 
        
        return back()->with($notification);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona) 
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Persona $persona)
    {
        $rol = Role::find(5);
        return response()->json($rol);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $persona->update($request->all());

        $notification = array(
            'message' => 'el trabajador '.$persona->nombre ,
            'titulo' => 'Se ha actualizado',
            'alert-type' => 'success'
        ); 
        
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();

        $notification = array(
            'message' => 'el trabajador '.$persona->nombre ,
            'titulo' => 'Ha sido eliminado',
            'alert-type' => 'success'
        ); 
        
        return back()->with($notification);

    }

    public function personaCliente(){
        //Obtener las empresas en las que esta contratado el usuario
        $usuario = Auth::user();
        $persona = $usuario->persona()->get()->last();

        //$empresas = $persona->empresa()->get();//FIXME no se esta consultando que el trabajador este activo
        //$empresas = $persona->empresa()->get();

        $contratos = Contrato::where( 'persona_id', '=', $persona->id)->with('estadoLaboral','persona','empresa')->get();
        $empresas = collect([]);

        foreach ($contratos as $contrato) {
            if($contrato->estadoLaboral->last()->estado == 'alta'){
                //dd($contrato->empresa);
                $empresas->push($contrato->empresa);
            }
        }
       
        $trabajadores = collect([]);
        $contratosID = collect([]);
        foreach($empresas as $empresa){
            //Traemos los contratos que tiene esta empresa
            $contratos = Contrato::where( 'empresa_id', '=', $empresa->id)->with('estadoLaboral','persona')->get();
            foreach ($contratos as $contrato) {
                if ($contrato->estadoLaboral->last() && $contrato->estadoLaboral->last()->estado == 'alta' ) { 
                    $trabajadores->push($contrato->persona);
                    $contratosID->push($empresa->id );
                }
            }
        }
        //dd( $trabajadores,$contratosID);

        return view('cliente.trabajador.index',[
            'contratos' => $contratosID,
            'empresas' => $empresas,
            'trabajadores' =>  $trabajadores
        ]);
    }
}
