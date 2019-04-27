<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creación de Usuarios
        Permission::create([
            'name'          =>'Ver Usuarios',
            'slug'          =>'users.index',
            'description'   =>'Ver todos los Usuarios',
        ]);
        Permission::create([
            'name'          =>'Ver detalle de Usuarios',
            'slug'          =>'users.show',
            'description'   =>'Ver Información del Usuario',
        ]);
        Permission::create([
            'name'          =>'Crear Usuarios',
            'slug'          =>'users.create',
            'description'   =>'Creación de Usuarios del Sistema',
        ]);
        Permission::create([
            'name'          =>'Edición de Usuarios',
            'slug'          =>'users.edit',
            'description'   =>'Edición de los Usuarios del Sistema',
        ]);
        Permission::create([
            'name'          =>'Eliminar Usuarios',
            'slug'          =>'users.destroy',
            'description'   =>'Eliminación de Usuarios del Sistema',
        ]);

        //Roles del Sistema
        Permission::create([
            'name'          =>'Ver Roles',
            'slug'          =>'roles.index',
            'description'   =>'Ver todos los Roles',
        ]);
        Permission::create([
            'name'          =>'Ver detalle de Roles',
            'slug'          =>'roles.show',
            'description'   =>'Ver rol del sistema',
        ]);
        Permission::create([
            'name'          =>'Crear Roles',
            'slug'          =>'roles.create',
            'description'   =>'Creación de Roles del Sistema',
        ]);
        Permission::create([
            'name'          =>'Edición de Roles',
            'slug'          =>'roles.edit',
            'description'   =>'Edición de los Roles del Sistema',
        ]);
        Permission::create([
            'name'          =>'Eliminar Rol',
            'slug'          =>'roles.destroy',
            'description'   =>'Eliminación de Rol del Sistema',
        ]);

        //permisos de empresas
        Permission::create([
            'name'          =>'Ver Empresas',
            'slug'          =>'empresas.index',
            'description'   =>'Ver todos los Empresas',
        ]);
        Permission::create([
            'name'          =>'Ver detalle de Empresas',
            'slug'          =>'empresas.show',
            'description'   =>'Ver Información del Usuario',
        ]);
        Permission::create([
            'name'          =>'Crear Empresas',
            'slug'          =>'empresas.create',
            'description'   =>'Creación de Empresas del Sistema',
        ]);
        Permission::create([
            'name'          =>'Edición de Empresas',
            'slug'          =>'empresas.edit',
            'description'   =>'Edición de los Empresas del Sistema',
        ]);
        Permission::create([
            'name'          =>'Eliminar Empresa',
            'slug'          =>'empresas.destroy',
            'description'   =>'Eliminación de Empresas del Sistema',
        ]);


Role::create([
    'name'          =>'Admin',
    'slug'          =>'admin',
    'special'   =>'all-access',
]);


    }
}


