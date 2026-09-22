<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produits';

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'image',
        'categorie_id',
        'stock',   
    ];

    
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    
    public function commandeItems()
    {
        return $this->hasMany(CommandeItem::class);
    }
}
