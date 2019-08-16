<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create([
            'name'          => 'Navegar los usuarios', 
            'slug'          => 'user.index', 
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de usuarios', 
            'slug'          => 'user.show', 
            'description'   => 'Ver detalle de cada usuario del sistema',
        ]);
        Permission::create([
            'name'          => 'Edicion de usuarios', 
            'slug'          => 'user.edit', 
            'description'   => 'Editar cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar usuarios', 
            'slug'          => 'user.destroy', 
            'description'   => 'Eliminar usuarios del sistema',
        ]);


        //Roles
        Permission::create([
            'name'          => 'Navegar roles', 
            'slug'          => 'roles.index', 
            'description'   => 'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de roles', 
            'slug'          => 'roles.show', 
            'description'   => 'Ver detalle de cada rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Creacion de roles', 
            'slug'          => 'roles.create', 
            'description'   => 'Crear roles del sistema',
        ]);
        Permission::create([
            'name'          => 'Edicion de roles', 
            'slug'          => 'roles.edit', 
            'description'   => 'Editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar roles', 
            'slug'          => 'roles.destroy', 
            'description'   => 'Eliminar roles del sistema',
        ]);
    
         //Productos
         Permission::create([
            'name'          => 'Navegar productos', 
            'slug'          => 'Products.index', 
            'description'   => 'Lista y navega todos los productos del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de productos', 
            'slug'          => 'Products.show', 
            'description'   => 'Ver detalle de cada rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Creacion de productos', 
            'slug'          => 'Products.create', 
            'description'   => 'Crear productos del sistema',
        ]);
        Permission::create([
            'name'          => 'Edicion de productos', 
            'slug'          => 'Products.edit', 
            'description'   => 'Editar cualquier producto del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar productos', 
            'slug'          => 'Products.destroy', 
            'description'   => 'Eliminar roles del sistema',
        ]); 

    }
}
