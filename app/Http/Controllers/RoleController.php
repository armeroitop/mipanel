<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return datatables()
        ->eloquent(Role::query())
        ->addColumn('columna_botones','panel.rol.partials.botonesDT')
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
        $permissions = Permission::get();
        return response()->json($permissions);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(Request $request)
    {        
        $role = Role::create($request->all());
        //Actualización de permisos
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.edit',$role->id)
        ->with('info','Role guardado exitosamente');
    } */
    public function store(Request $request)
    {        
        $role = Role::create($request->all());

        //Actualización de permisos
        $role->permissions()->sync($request->get('permisos'));

        $notification = array(
            'message' => 'el rol '.$role->name ,
            'titulo' => 'Ha sido creado',
            'alert-type' => 'success'
        ); 
        
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        $rol = Role::find($request->rol);
        return response()->json($rol);
        //return view('roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    /* public function edit(Role $role)
    {
        $permissions = Permission::get();       
        return view('roles.edit',compact('role', 'permissions'));
    } */
    public function edit(Request $request)
    {
        //$permissions = Permission::get();
        $permissions = Permission::orderBy('id','desc')->get();
        $rol = Role::find($request->rol);
        $permisos_activos = $rol->permissions()->get()->pluck('id');
        $permiso_especial = $rol->special;
        
        return response()->json([$permisos_activos, $permissions, $permiso_especial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
  
    public function update(Request $request, Role $role)
    {        
        //Actualización del role
        //dd($request->get('special'));
        $role = Role::find($request->rol);
        $role->update($request->all());
        $role->update(['special' => $request->get('special') ]);

        //Actualización de permisos
        $role->permissions()->sync($request->get('permisos'));

        $notification = array(
            'message' => 'el rol '.$role->name ,
            'titulo' => 'Ha sido actualizado',
            'alert-type' => 'success'
        ); 
        
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Role $role)
    {
        $role = Role::find($request->rol);
        $role->delete();

        $notification = array(
            'message' => 'el rol '.$role->name ,
            'titulo' => 'Ha sido eliminado',
            'alert-type' => 'success'
        ); 
        
        return back()->with($notification);
    }
}
