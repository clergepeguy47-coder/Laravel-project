<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories'; 

    protected $fillable = [
        'nom', 
    ];

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'categorie_produit');
    }
}
