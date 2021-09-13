<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/panel', function () {
        return view('admin_panel/admin');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Routes

Route::middleware(['auth'])->group(function(){

    Route::get('/panel', function () {return view('panel/home');});

 //Roles
    Route::post('roles/store', 'RoleController@store')  ->name('roles.store')           ->middleware('has.permission:roles.create');
    Route::get('roles', 'RoleController@index')         ->name('roles.index')           ->middleware('has.permission:roles.index');
    Route::get('roles/create', 'RoleController@create') ->name('roles.create')          ->middleware('has.permission:roles.create');
    Route::put('roles/{role}', 'RoleController@update') ->name('roles.update')          ->middleware('has.permission:roles.edit');
    Route::get('roles/{role}', 'RoleController@show')   ->name('roles.show')            ->middleware('has.permission:roles.show');
    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')      ->middleware('has.permission:roles.destroy');
    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')          ->middleware('has.permission:roles.edit');


 //Products
    Route::post('products/store', 'ProductController@store')->name('products.store')            ->middleware('has.permission:products.create');
    Route::get('products', 'ProductController@index')->name('products.index')                   ->middleware('has.permission:products.index');
    Route::get('products/create', 'ProductController@create')->name('products.create')          ->middleware('has.permission:products.create');
    Route::put('products/{product}', 'ProductController@update')->name('products.update')       ->middleware('has.permission:products.edit');
    Route::get('products/{product}', 'ProductController@show')->name('products.show')           ->middleware('has.permission:products.show');
    Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy')  ->middleware('has.permission:products.destroy');
    Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit')      ->middleware('has.permission:products.edit');        


 //Users  
    Route::get('users', 'UserController@index')->name('users.index')                            ->middleware('has.permission:users.index');   
    Route::put('users/{user}', 'UserController@update')->name('users.update')                   ->middleware('has.permission:users.edit');
    Route::get('users/{user}', 'UserController@show')->name('users.show')                       ->middleware('has.permission:users.show');
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')              ->middleware('has.permission:users.destroy');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')                  ->middleware('has.permission:users.edit'); 
    Route::post('users/asignapersona', 'UserController@asignapersona')->name('users.asignapersona');        

 //Usuario
    Route::get('paneladmin/usuario', function () {
        return view('panel/usuario/index');
    })->middleware(['has.role:administrador_sistema']);

    Route::resource('api/usuario', 'UserController')->middleware(['has.role:administrador_sistema']);


 //Obra
    Route::get('paneladmin/obra', function () {
        return view('panel/obra/index');
    })->middleware(['has.role:administrador_sistema']);
    
    Route::get('cliente/obras', 'ObraController@indexObraCliente')->name('obra.cliente');

    Route::get('css/obras', 'ObraController@indexObraCss')->name('obra.css');
    Route::get('obraCss/{obra}', 'ObraController@verObraCss')->name('obra.css.ver');

    Route::get('obra/{obra}', 'ObraController@ver')->name('obra.ver')->middleware('has.role:administrador_sistema');
    Route::resource('api/obra', 'ObraController')->middleware(['has.role:administrador_sistema']);
   
 //Codigo
    //Route::post('codigo/asignaCargoParticipante', 'CodigoController@store')->name('codigo.store');
    Route::resource('api/codigo', 'CodigoController');
 
 //Empresas
    Route::get('paneladmin/empresa', function () {
        return view('panel/empresa/index');
    })->middleware(['has.role:administrador_sistema']);

    Route::get('empresa/{empresa}', 'EmpresaController@ver')->name('empresa.ver')->middleware('has.role:administrador_sistema');
    Route::resource('api/empresa', 'EmpresaController');


 //Localidades
    Route::resource('api/localidad', 'LocalidadController');


 //Trabajadores
    Route::get('paneladmin/trabajador', function () {
        return view('panel/trabajador/index');
    })->middleware(['has.role:administrador_sistema']);
    Route::get('cliente/persona', 'PersonaController@personaCliente')->name('persona.cliente');
    Route::resource('api/persona', 'PersonaController');

 //Cargo
    Route::post('cargo/asignaCargoParticipante', 'CargoController@asignaCargoParticipante')->name('cargo.asignaCargoParticipante');
    Route::resource('api/cargo', 'CargoController');

 //Contrato
    Route::post('contrato/altaTrabajador', 'ContratoController@altaTrabajador')->name('contrato.altaTrabajador')->middleware('has.role:administrador_sistema');
    Route::put('contrato/{contrato}', 'ContratoController@bajaTrabajador')->name('contrato.bajaTrabajador')->middleware('has.role:administrador_sistema');

 //Subcontratacion
    Route::post('subcontratacion/store', 'SubcontratacionController@store')->name('subcontratacion.store')->middleware('has.role:administrador_sistema');
    //Route::delete('subcontratacion/{product}', 'SubcontratacionController@destroy')->name('subcontratacion.destroy');
    Route::resource('api/subcontratacion', 'SubcontratacionController');
 

 //Roles
    Route::get('paneladmin/rol', function () {
        return view('panel/rol/index');
    })->middleware(['has.role:administrador_sistema']);

    Route::resource('api/rol', 'RoleController');

 //Permisos
    Route::get('paneladmin/permiso', function () {
        return view('panel/permiso/index');
    })->middleware(['has.role:administrador_sistema']);

    Route::resource('api/permiso', 'PermisoController');

});

