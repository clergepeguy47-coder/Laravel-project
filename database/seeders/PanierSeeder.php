<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Produit;
use App\Models\Panier;

class PanierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Création d'un client si nécessaire
        $client = User::firstOrCreate(
            ['email' => 'client@example.com'],
            [
                'name' => 'Client Test',
                'password' => Hash::make('client123'),
                'role' => 'client',
            ]
        );

        // Vérifie qu'il y a des produits
        if (Produit::count() === 0) {
            $this->command->warn("⚠️ Aucun produit trouvé. Lance d'abord ProduitSeeder.");
            return;
        }

        // Sélection de quelques produits
        $produits = Produit::take(3)->get();

        // Ajout des produits au panier
        foreach ($produits as $produit) {
            Panier::create([
                'produit_id' => $produit->id,
                'quantite' => 1,
                'user_id' => $client->id,
            ]);
        }
    }
}
