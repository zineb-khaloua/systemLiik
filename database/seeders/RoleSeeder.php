<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run(): void
{
    // Create admin role if it doesn't exist
    $role = Role::where('name', 'admin')->first();
     $role->update(['is_protected' => true]);

    // Protect any other role by ID
    // Role::find($roleId)->update(['is_protected' => true]);
}
    
}
