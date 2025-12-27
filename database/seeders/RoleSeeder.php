<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Rol Super Admin - tiene todos los permisos
        $roleAdmin = Role::create(['name' => 'super-admin']);
        $permissionsAdmin = Permission::query()->pluck('name');
        $roleAdmin->syncPermissions($permissionsAdmin);

        // Rol Veterinario - permisos limitados
        $roleVeterinario = Role::create(['name' => 'veterinario']);
        $permissionsVeterinario = [
            'ver mascotas',
            'ver mascotas',
            'crear mascotas',
            'editar mascotas',
        ];
        $roleVeterinario->syncPermissions($permissionsVeterinario);
    }
}
