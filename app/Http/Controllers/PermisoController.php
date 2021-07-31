<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return datatables()
        ->eloquent(Permission::query())
        ->addColumn('columna_botones','panel.permiso.partials.botonesDT')
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
        $permiso = Permission::create($request->all());

        $notification = array(
            'message' => 'el persmiso '.$permiso->name ,
            'titulo' => 'Ha sido creado',
            'alert-type' => 'success'
        ); 
        
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd( $request->all());
        $permiso = Permission::find($id);
        $permiso->update($request->all());

        $notification = array(
            'message' => 'el rol '.$permiso->name ,
            'titulo' => 'Ha sido actualizado',
            'alert-type' => 'success'
        ); 
        
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $permiso = Permission::find($id);
        $permiso->delete();

        $notification = array(
            'message' => 'el permiso '.$permiso->name ,
            'titulo' => 'Ha sido eliminado',
            'alert-type' => 'success'
        ); 
        
        return back()->with($notification);
    }
}
