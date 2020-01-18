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
        Permission::create([
            'name'      => 'Navegar usuarios',
            'slug'      => 'users.index',
            'description'      => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
            'name'      => 'Ver detalle del usuario',
            'slug'      => 'users.show',
            'description'      => 'Ver el detalle de cada usuario del sistema',
        ]);
        Permission::create([
            'name'      => 'Edicion de usuarios',
            'slug'      => 'users.edit',
            'description'      => 'Editar cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
            'name'      => 'Eliminar Usuarios',
            'slug'      => 'users.destroy',
            'description'      => 'Eliminar cualquier usuario del sistema',
        ]);
        /* ROles */
        Permission::create([
            'name'      => 'Navegar roles',
            'slug'      => 'roles.index',
            'description'      => 'Eliminar cualquier rol del sistema',
        ]);
        Permission::create([
            'name'      => 'Ver detalle de los roles',
            'slug'      => 'roles.show',
            'description'      => 'Ver cualquier rol del sistema',
        ]);
        Permission::create([
            'name'      => 'Crear roles',
            'slug'      => 'roles.create',
            'description'      => 'Crear cualquier rol del sistema',
        ]);
        Permission::create([
            'name'      => 'Editar roles',
            'slug'      => 'roles.edit',
            'description'      => 'Eliminar cualquier rol del sistema',
        ]);
        Permission::create([
            'name'      => 'Eliminar roles',
            'slug'      => 'roles.destroy',
            'description'      => 'Eliminar cualquier rol del sistema',
        ]);
        /* Productos */
        Permission::create([
            'name'      => 'Navegar productos',
            'slug'      => 'products.index',
            'description'      => 'Eliminar cualquier producto del sistema',
        ]);
        Permission::create([
            'name'      => 'Ver detalle de los productos',
            'slug'      => 'products.show',
            'description'      => 'Ver cualquier producto del sistema',
        ]);
        Permission::create([
            'name'      => 'Crear productos',
            'slug'      => 'products.create',
            'description'      => 'Crear cualquier producto del sistema',
        ]);
        Permission::create([
            'name'      => 'Editar productos',
            'slug'      => 'products.edit',
            'description'      => 'Eliminar cualquier producto del sistema',
        ]);
        Permission::create([
            'name'      => 'Eliminar productos',
            'slug'      => 'products.destroy',
            'description'      => 'Eliminar cualquier producto del sistema',
        ]);
    }
}
