<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Creating Super Admin User
        $superAdmin = User::create([
        'name' => 'Thiet',
        'email' => 'minhthiet@tythanh.com.vn',
        'password' => Hash::make('231196')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@tythanh.com.vn',
            'password' => Hash::make('123465')
        ]);
        $admin->assignRole('Admin');

        // Creating Manager User
        $productManager = User::create([
            'name' => 'Manager',
            'email' => 'manager@tythanh.com.vn',
            'password' => Hash::make('456123')
        ]);
        $productManager->assignRole('Manager');

        // Creating User
        $productManager = User::create([
            'name' => 'User',
            'email' => 'user@tythanh.com.vn',
            'password' => Hash::make('123456789')
        ]);
        $productManager->assignRole('User');
        }
}
