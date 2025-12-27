<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class VeterinarioUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $veterinarioUser = User::query()->create([
            'name' => 'Dr. Veterinario',
            'email' => 'veterinario@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
        ]);

        $roleVeterinario = Role::findByName('veterinario');
        $veterinarioUser->assignRole($roleVeterinario);
    }
}
