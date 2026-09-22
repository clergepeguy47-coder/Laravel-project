<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Commande;
use App\Models\CommandeItem;
use App\Models\Produit;

class CommandeSeeder extends Seeder
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

        // Calcul du total
        $total = $produits->sum(fn($p) => $p->prix * 1); // quantité 1 pour chaque produit

        // Création de la commande
        $commande = Commande::create([
            'user_id' => $client->id,
            'total' => $total,
            'statut' => 'Payée',
        ]);

        // Création des items de la commande
        foreach ($produits as $produit) {
            CommandeItem::create([
                'commande_id' => $commande->id,
                'produit_id' => $produit->id,
                'quantite' => 1,
                'prix' => $produit->prix,
            ]);

            // Décrémentation du stock
            $produit->stock -= 1;
            $produit->save();
        }
    }
}
