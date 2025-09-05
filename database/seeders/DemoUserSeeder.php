<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DemoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        
        User::create([
            'name' => 'Operator',
            'username' => 'operator',
            'email' => 'operator@example.com',
            'password' => bcrypt('password'),
            'role' => 'operator',
        ]);
    }
}
