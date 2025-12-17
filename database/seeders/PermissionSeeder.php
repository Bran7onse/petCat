<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permisos de usuarios
        Permission::create(['name' => 'ver usuarios']);
        Permission::create(['name' => 'crear usuarios']);
        Permission::create(['name' => 'editar usuarios']);
        Permission::create(['name' => 'eliminar usuarios']);

        // Permisos de mascotas
        Permission::create(['name' => 'ver mascotas']);
        Permission::create(['name' => 'crear mascotas']);
        Permission::create(['name' => 'editar mascotas']);
        Permission::create(['name' => 'eliminar mascotas']);
    }
}
