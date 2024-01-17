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
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $manager = Role::create(['name' => 'Manager']);
        $user = Role::create(['name' => 'User']);
        $admin->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'create-dep',
            'edit-dep',
            'delete-dep',
            'create-email',
            'edit-email',
            'delete-email'
        ]);

        $manager->givePermissionTo([
            'create-dep',
            'edit-dep',
            'delete-dep',
            'create-email',
            'edit-email',
            'delete-email'
        ]);
        $user->givePermissionTo([
            'show-email'
        ]);
    }
}
