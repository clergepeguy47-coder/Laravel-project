<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jean',
            'email' => 'admin@example.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);
    }
}

