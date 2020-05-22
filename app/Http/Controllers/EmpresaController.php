<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Contrato;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::with('localidad');        
        
        return datatables()
        ->eloquent($empresas)        
        ->editColumn('localidad_id', function($empresas){return $empresas->localidad->nombre;})
        ->addColumn('columna_botones','administrador\empresa\partials\botonesDT')
        ->rawColumns(['columna_botones'])
        ->toJson();
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $respuesta = Empresa::where('nombre','LIKE','%'.$request->q.'%')->get();

        //Formateamos la respuesta para que la lea SELECT2
         $formateado_respuesta = [];
         foreach ($respuesta as $res) {
             $formateado_respuesta[]= ['id' => $res->id, 'text' => $res->nombre];
         }
       
        return response()->json($formateado_respuesta);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa = new Empresa($request->all());
        $empresa->save();

        $notification = array(
            'message' => 'la empresa '.$empresa->nombre ,
            'titulo' => 'Se ha guardado',
            'alert-type' => 'success'
        ); 
        return back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        dd($empresa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $empresa->update($request->all());

        $notification = array(
            'message' => 'La empresa '.$empresa->nombre ,
            'titulo' => 'Se ha actualizado',
            'alert-type' => 'success'
        ); 
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        $notification = array(
            'message' => 'la empresa '.$empresa->nombre ,
            'titulo' => 'Se ha borrado',
            'alert-type' => 'success'
        ); 
        return back()->with($notification);
    }

    /**
     * Devuelve la vista empresa.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function ver(Empresa $empresa)
    {
       
        //$contratos = Contrato::where( 'empresa_id', '=', $empresa->id)->get();
        $contratos = Contrato::where( 'empresa_id', '=', $empresa->id)->with('estadoLaboral','persona')->get();
       // dd($contratos);
        $trabajadores=collect([]);
         
        foreach ($contratos as $contrato) {
            //dd($contrato);
            if ($contrato->estadoLaboral->last() && $contrato->estadoLaboral->last()->estado != 'baja' ) {
                
                $trabajadores->push($contrato->persona);
            }            
        }

        //dd($trabajadores);
        return view('administrador.empresa.ver',[
            'empresa' => $empresa,
            'trabajadores' =>  $trabajadores
        ]);
    }

}
