<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Hikmal Falah',
            'email' => 'hikmal@gmail.com',
            'password' => Hash::make('hikmal123'),
            'roles' => 'Admin'
        ]);

        User::create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('staff123'),
            'roles' => 'Staff'
        ]);
    }
}
