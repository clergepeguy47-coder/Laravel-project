<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Création d'un administrateur
        $this->call([
    CategorieSeeder::class,
    ProduitSeeder::class,
    PanierSeeder::class,
    CommandeSeeder::class,
]);

        User::create([
            'name' => 'Admin',
            'email' => 'clergepeguy47@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Création d'un utilisateur client
        User::create([
            'name' => 'Client Test',
            'email' => 'client@example.com',
            'password' => Hash::make('client123'),
            'role' => 'client',
        ]);

        // Si tu veux générer plusieurs clients automatiquement :
        User::factory(5)->create([
            'role' => 'client',
        ]);
    }
}
