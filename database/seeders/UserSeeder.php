<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Este seeder orquesta la creación de permisos, roles y usuarios
     * en el orden correcto para mantener las dependencias.
     */
    public function run(): void
    {
        // 1. Primero crear los permisos
        $this->call(PermissionSeeder::class);
        
        // 2. Luego crear los roles y asignar permisos
        $this->call(RoleSeeder::class);
        
        // 3. Finalmente crear usuarios y asignar roles
        $this->call([
            AdminUserSeeder::class,
            VeterinarioUserSeeder::class,
        ]);
    }
}
