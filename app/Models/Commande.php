<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = 'commandes';

    protected $fillable = [
        'user_id',
        'total',
        'statut',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function items()
    {
        return $this->hasMany(CommandeItem::class);
    }
}
