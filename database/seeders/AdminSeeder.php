<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'DPMD Administrator',
            'email' => 'admin@dpmd.bali.go.id',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}
