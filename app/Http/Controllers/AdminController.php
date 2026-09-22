<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Commande;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
public function produitsShow($id)
{
    $produit = Produit::with('categorie')->findOrFail($id);
    return view('admin.produits.show', compact('produit'));
}

    public function dashboard()
    {
        
        $produits = Produit::count();
        $categories = Categorie::count();
        $commandes = Commande::count();

        
        $months = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];

        
        $ordersCount = [];
        foreach (range(1, 12) as $monthNumber) {
            $ordersCount[] = Commande::whereMonth('created_at', $monthNumber)->count();
        }

        return view('admin.dashboard', [
            'produits' => $produits,
            'categories' => $categories,
            'commandes' => $commandes,
            'stats' => [
                'produits' => $produits,
                'categories' => $categories,
                'commandes' => $commandes,
            ],
            'months' => $months,
            'ordersCount' => $ordersCount
        ]);
    }

    public function produits()
    {
        $produits = Produit::with('categorie')->get();
        return view('admin.produits.index', compact('produits'));
    }

    public function produitsCreate()
    {
        $categories = Categorie::all();
        return view('admin.produits.create', compact('categories'));
    }

    public function produitsStore(Request $request)
    {
        
        $request->validate([
            'nom' => 'required|min:2|max:255',
            'prix' => 'required|numeric',
            'description' => 'nullable',
            'categorie_id' => 'nullable|exists:categories,id',
            'new_categorie' => 'nullable|min:2|max:255',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        
        if ($request->filled('new_categorie')) {
            $categorie = Categorie::create([
                'nom' => $request->new_categorie
            ]);

            
            $request->merge(['categorie_id' => $categorie->id]);
        }

    
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/produits'), $imageName);
        }

    
        Produit::create([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'description' => $request->description,
            'categorie_id' => $request->categorie_id,
            'stock' => $request->stock,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.produits')->with('success', 'Produit ajouté.');
    }
}
