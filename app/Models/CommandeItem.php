<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandeItem extends Model
{
    protected $fillable = [
        'commande_id',
        'produit_id',
        'quantite',
        'prix',
    ];

    // -------------------------
    // RELATIONS
    // -------------------------

    // Un item appartient à une commande
    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    // Un item appartient à un produit
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    // -------------------------
    // CASTS
    // -------------------------

    protected $casts = [
        'quantite' => 'integer',
        'prix' => 'float',
    ];

    // -------------------------
    // CALCULS UTILES
    // -------------------------

    // Sous-total de cet item
    public function getSousTotalAttribute()
    {
        return $this->prix * $this->quantite;
    }

   
    public function getNomProduitAttribute()
    {
        return $this->produit ? $this->produit->nom : 'Produit supprimé';
    }

    
    public function getPrixFormatAttribute()
    {
        return number_format($this->prix, 2, ',', ' ') . ' €';
    }

    
    public function getSousTotalFormatAttribute()
    {
        return number_format($this->sous_total, 2, ',', ' ') . ' €';
    }
}
