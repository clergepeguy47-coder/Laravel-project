<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();                                // Identifiant du produit
            $table->string('nom');                       // Nom du produit
            $table->text('description')->nullable();     // Description
            $table->decimal('prix', 8, 2);               // Prix (ex: 199.99)
            $table->integer('stock')->default(0);
            $table->string('image')->nullable();         // Image du produit

            // Catégorie du produit (clé étrangère)
            $table->foreignId('categorie_id')
                  ->constrained('categories')
                  ->onDelete('cascade');

            $table->timestamps();                        // created_at / updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
