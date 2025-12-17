<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::query()->create([
            'name' => 'Super Admin',
            'email' => 'super-admin@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
        ]);
        
        $roleAdmin = Role::findByName('super-admin');
        $adminUser->assignRole($roleAdmin);
    }
}
