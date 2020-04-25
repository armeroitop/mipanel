<?php

namespace App\Http\Controllers;

use App\Obra;
use App\Subcontratacion;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return datatables()
        ->eloquent(Obra::query())
        ->addColumn('columna_botones','administrador\obra\partials\botonesDT')
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
        
       $respuesta = Obra::where('nombre','LIKE','%'.$request->q.'%')->get();

       //Formateamos la respuesta para que la lea SELECT2
        $formateado_obra = [];
        foreach ($respuesta as $res) {
            $formateado_obra[]= ['id' => $res->id, 'text' => $res->nombre];
        }
      
       return response()->json($formateado_obra);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obra = new Obra($request->all());
        $obra->proyecto = $request->proyecto == 'con' ? 1:0;
        
        $obra->save(); //falta meter la asignación del promotor.

        $subcontratacion = new Subcontratacion($request->all());
        $subcontratacion->orden = -1;
        $subcontratacion->nivel = -1;
        $subcontratacion->contratante_id = $request->promotor;
        $subcontratacion->contratado_id = $request->promotor;
        $subcontratacion->obra_id = $obra->id;
        $subcontratacion->save();


        $notification = array(
            'message' => 'la obra '.$obra->nombre ,
            'titulo' => 'Se ha guardada',
            'alert-type' => 'success'
        ); 
        
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function show(Obra $obra)
    {
        //$promotor= $obra->subcontratacion()->where('nivel', -1)->first()->contratante;
        $promotor= $obra->subcontratacion()->where('nivel', -1)->first();
        if($promotor){
            //$promotor->contratante;
            $contenedor[]= ['id' => $promotor->contratante->id, 'text' => $promotor->contratante->nombre];
        }else{
            //$contenedor[]= ['id' => 2, 'text' => 'Escayolas Martínez S.A.'];
            $contenedor[]= ['id' => null, 'text' => 'No has seleccionado ningún promotor todavia'];
        }
                
        return response()->json($contenedor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function edit(Obra $obra)
    {

        //return redirect('home');
        return $obra;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obra $obra)
    {            
        $obra->update([
                'nombre'        =>  $request->nombre,        
                'descripcion'   =>  $request->descripcion,
                'direccion'     =>  $request->direccion,
                'proyecto'      =>  $request->proyecto == 'con' ? 1:0,                
                'localidad_id'  =>  json_decode($request->localidad_id),
                'inicio_previsto' =>$request->inicio_previsto,
                'fin_previsto'  =>  $request->fin_previsto
        ]);
        
        if($request->promotor != 'null'){
            $subcontratacion = $obra->subcontratacion()->where('nivel', -1)->first();
            $subcontratacion->update([
                'contratante_id' =>  $request->promotor,
                'contratado_id'  =>  $request->promotor
            ]);            
        }      
        

        $notification = array(
            'message'   => 'la obra '.$obra->nombre ,
            'titulo'    => 'Se ha actualizado',
            'alert-type' => 'success'
        ); 
        return back()->with($notification);
        dd($obra); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obra $obra)
    {
        $obra->delete();
        $notification = array(
            'message' => 'la obra '.$obra->nombre ,
            'titulo' => 'Se ha borrado',
            'alert-type' => 'success'
        );       
        return back()->with($notification);
    }
}
