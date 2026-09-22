<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Produit;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    

    public function index()
    {
        $items = Panier::with('produit')->get();
        return view('panier.index', compact('items'));
    }

    

    public function ajouter($id)
    {
        $produit = Produit::findOrFail($id);

        
        if ($produit->stock <= 0) {
            return redirect()->back()->with('error', 'Ce produit est en rupture de stock.');
        }

        
        $item = Panier::where('produit_id', $id)->first();

        if ($item) {

            
            if ($item->quantite + 1 > $produit->stock) {
                return redirect()->back()->with('error', 'Stock insuffisant pour ajouter un autre exemplaire.');
            }

            $item->quantite++;
            $item->save();

        } else {

            Panier::create([
                'produit_id' => $id,
                'quantite' => 1,
            ]);
        }

        return redirect()->route('panier.index')->with('success', 'Produit ajouté au panier.');
    }

    

    public function supprimer($id)
    {
        $item = Panier::findOrFail($id);
        $item->delete();

        return redirect()->route('panier.index')->with('success', 'Produit retiré du panier.');
    }

    

    public function vider()
    {
        Panier::truncate();
        return redirect()->route('panier.index')->with('success', 'Panier vidé.');
    }
}
