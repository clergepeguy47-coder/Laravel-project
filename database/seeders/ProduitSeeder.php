<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produits')->insert([
            [
                'nom' => 'Ordinateur Portable HP',
                'description' => 'Un ordinateur portable performant pour le travail et les études.',
                'prix' => 799.99,
                'image' => 'hp_laptop.jpg',
                'stock' => 12,
                'categorie_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Smartphone Samsung Galaxy',
                'description' => 'Un smartphone moderne avec un excellent appareil photo.',
                'prix' => 599.99,
                'image' => 'samsung_galaxy.jpg',
                'stock' => 20,
                'categorie_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Casque Audio Sony',
                'description' => 'Casque Bluetooth avec réduction de bruit.',
                'prix' => 199.99,
                'image' => 'sony_headset.jpg',
                'stock' => 30,
                'categorie_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Clavier Mécanique RGB',
                'description' => 'Clavier mécanique avec rétroéclairage RGB pour gamers.',
                'prix' => 129.99,
                'image' => 'rgb_keyboard.jpg',
                'stock' => 15,
                'categorie_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
