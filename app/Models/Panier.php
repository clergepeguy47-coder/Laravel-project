<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    protected $table = 'paniers';

    protected $fillable = [
        'produit_id',
        'quantite',
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}

