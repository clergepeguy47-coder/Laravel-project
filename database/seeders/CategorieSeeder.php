<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'nom' => 'Informatique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Accessoires',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Smartphones',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Audio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
