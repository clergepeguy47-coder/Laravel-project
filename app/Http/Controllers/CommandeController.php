<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\CommandeItem;
use App\Models\Panier;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    
    public function index()
    {
        $commandes = Commande::with('user')->get();
        return view('commandes.index', compact('commandes'));
    }

    

    public function creer()
    {
        $panier = Panier::with('produit')->get();

        if ($panier->isEmpty()) {
            return redirect()->route('panier.index')->with('error', 'Votre panier est vide.');
        }

        
        foreach ($panier as $item) {
            if ($item->quantite > $item->produit->stock) {
                return redirect()->route('panier.index')
                    ->with('error', 'Stock insuffisant pour : ' . $item->produit->nom);
            }
        }

        
        $total = 0;
        foreach ($panier as $item) {
            $total += $item->produit->prix * $item->quantite;
        }

        
        $commande = Commande::create([
            'user_id' => auth()->id() ?? 1,
            'total' => $total,
            'statut' => 'En attente',
        ]);

        

        foreach ($panier as $item) {

            CommandeItem::create([
                'commande_id' => $commande->id,
                'produit_id' => $item->produit_id,
                'quantite' => $item->quantite,
                'prix' => $item->produit->prix,
            ]);

            
            $produit = $item->produit;
            $produit->stock -= $item->quantite;
            $produit->save();
        }

        
        Panier::truncate();

        return redirect()->route('commandes.index')->with('success', 'Commande créée avec succès.');
    }

    

    public function show($id)
    {
        $commande = Commande::with(['user', 'items.produit'])->findOrFail($id);

        $total = $commande->items->sum(function ($item) {
            return $item->prix * $item->quantite;
        });

        return view('commandes.show', compact('commande', 'total'));
    }

    

    public function destroy($id)
    {
        $commande = Commande::findOrFail($id);
        $commande->delete();

        return redirect()->route('commandes.index')->with('success', 'Commande supprimée.');
    }
}
