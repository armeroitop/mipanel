<?php

namespace App\Http\Controllers;

use App\Persona;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //dd($user =  User::with('roles')) ; 
        $user =  User::with('roles')->select(['id','name','email']);

        return datatables()
        ->eloquent($user)
        ->editColumn('roles', function($user){return $user->roles->pluck('name')->all();})        
        ->addColumn('columna_botones','panel.usuario.partials.botonesDT')
        ->rawColumns(['columna_botones'])
        ->toJson();
    }
    /* public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $user = User::create($request->all());

        return redirect()->route('users.edit',$user->id)
        ->with('info','Usero guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //dd($user->id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {        
        //$roles = Role::all()->pluck('id','name','description');
        $roles = Role::select('id','name','description')->get();
        $roles_activos = User::find($request->usuario)->roles->pluck('id')->all();
        
        return response()->json([$roles, $roles_activos]);
    }
   /*  public function edit(User $user)
    {
        
        $roles = Role::get();
        return view('users.edit',compact('user', 'roles'));
    } */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::find($request->usuario); 
        //dd($user);
        //Actualización del usuario
        $user->update($request->all());

        //Actualización de roles
        $user->roles()->sync($request->get('roles'));

        $notification = array(
            'message' => 'el usuario '.$user->name ,
            'titulo' => 'Ha sido actualizado',
            'alert-type' => 'success'
        );         
        return back()->with($notification);    

        //Retorno a la vista
        /* return redirect()->route('users.edit',$user->id)
        ->with('info','Usurero actualizado exitosamente'); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {        
        $usuario = User::find($request->usuario);       
        $usuario->delete();

        $notification = array(
            'message' => 'el usuario '.$usuario->name ,
            'titulo' => 'Ha sido eliminado',
            'alert-type' => 'success'
        );         
        return back()->with($notification);        
    }

    /**
     * Asigna un perfil al nuevo usuario registrado. Primero consultamos si ya existia un perfil y si existia, lo asignamos. Si no, lo creamos.
     *
     * 
     * 
     */
    public function asignapersona(Request $request)
    {         
        //$persona = Persona::where('dni', 'LIKE','%'.$request->dni.'%')->get();
        //
        $persona_existente = Persona::where('dni', '=', $request->dni)->first();
        $user = User::find($request->userId);

        if($persona_existente){

            //El perfil existe, pero ¿pertenece a otro usuario?
            if(User::where('persona_id', '=', $persona_existente->id)){
                return back()->with('info','Lo sentimos, pero ya existe un usuario para este perfil. Debes recuperar tu clave o contactar con el administrador');
            }else{
                $user->update([
                    'persona_id' =>  $persona_existente->id,
                    'name' => $request->nombre,
                ]);
                return back()->with('info','Enhorabuena, te has registrado correctamente');
            }
            
        }else{
            $persona_nueva = Persona::create($request->all());
            
            $user->update([
                'persona_id' =>  $persona_nueva->id,
                'name' => $request->nombre,
            ]);
            return back()->with('info','Enhorabuena, te has registrado correctamente');
        }               
        
    }
    
}
