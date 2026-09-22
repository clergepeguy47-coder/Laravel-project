<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;

class ProduitController extends Controller
{
    
    public function index()
    {
        
        $produits = Produit::with('categorie')->get();
        return view('produits.index', compact('produits'));
    }

    

    public function show($id)
    {
        $produit = Produit::with('categorie')->findOrFail($id);
        return view('produits.show', compact('produit'));
    }



    public function create()
    {
        $categories = Categorie::all();
        return view('produits.create', compact('categories'));
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|min:2|max:255',
            'prix' => 'required|numeric',
            'description' => 'nullable',
            'categorie_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        
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

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    

    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        $categories = Categorie::all();
        return view('produits.edit', compact('produit', 'categories'));
    }

    

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|min:2|max:255',
            'prix' => 'required|numeric',
            'description' => 'nullable',
            'categorie_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $produit = Produit::findOrFail($id);

        
        if ($request->hasFile('image')) {

            
            if ($produit->image && file_exists(public_path('images/produits/' . $produit->image))) {
                unlink(public_path('images/produits/' . $produit->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/produits'), $imageName);
            $produit->image = $imageName;
        }

        $produit->update([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'description' => $request->description,
            'categorie_id' => $request->categorie_id,
            'stock' => $request->stock,
            'image' => $produit->image,
        ]);

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour.');
    }

   

    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);

        
        if ($produit->image && file_exists(public_path('images/produits/' . $produit->image))) {
            unlink(public_path('images/produits/' . $produit->image));
        }

        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé.');
    }
}
