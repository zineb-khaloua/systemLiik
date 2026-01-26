<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User; // <--- THIS IS REQUIRED

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Forget cached permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // List of permissions
        $permissions = [
            'manage dashboard',
            'manage users',
            'manage roles',
            'manage permissions',
            'manage clients',
            'manage quotes',
            'manage orders',
            'manage invoices',
            'manage payments',
            'manage categories',
            'manage products',
            'manage suppliers',
            'manage ventes',
            'manage settings',
            'manage profile',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $commercial = Role::firstOrCreate(['name' => 'commercial']);
        $comptable = Role::firstOrCreate(['name' => 'comptable']);

        // Assign permissions to roles
        $admin->syncPermissions($permissions);

        $commercial->syncPermissions([
            'manage dashboard',
            'manage clients',
            'manage quotes',
            'manage orders',
            'manage ventes',
            'manage profile',
        ]);

        $comptable->syncPermissions([
            'manage dashboard',
            'manage invoices',
            'manage payments',
            'manage profile',
        ]);

        // --- assign roles to users if they exist ---
        $user1 = User::find(4);
        if ($user1) {
            $user1->assignRole('admin');
        }

        $user2 = User::find(6);
        if ($user2) {
            $user2->assignRole('commercial');
        }
    }
}
