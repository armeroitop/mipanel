<?php

namespace App\Http\Controllers;

use App\Obra;
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
        ->addColumn('columna_botones','administrador\obra\botones_v')
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
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function show(Obra $obra)
    {
       
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obra $obra)
    {
        
        //Debemos intentar llamar al Toastr de success
        $notification = array(
            'message' => 'la obra '.$obra->nombre ,
            'titulo' => 'Se ha borrado',
            'alert-type' => 'success'
        ); 
        $obra->delete();
        //dd($obra);
        //return $obra;
        return back()->with($notification);
    }
}
