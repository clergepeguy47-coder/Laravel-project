<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('admin')->except(['index', 'show']);
    }

    

    public function index()
    {
        
        $categories = Categorie::with('produits')->get();
        return view('categories.index', compact('categories'));
    }

    

    public function show($id)
    {
        $categorie = Categorie::with('produits')->findOrFail($id);
        return view('categories.show', compact('categorie'));
    }



    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|min:2|max:255',
        ]);

        Categorie::create([
            'nom' => $request->nom,
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée.');
    }


    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categories.edit', compact('categorie'));
    }

    

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|min:2|max:255',
        ]);

        $categorie = Categorie::findOrFail($id);

        $categorie->update([
            'nom' => $request->nom,
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour.');
    }


    public function destroy($id)
    {
        $categorie = Categorie::with('produits')->findOrFail($id);

        
        if ($categorie->produits->count() > 0) {
            return redirect()->route('categories.index')
                ->with('error', 'Impossible de supprimer : cette catégorie contient des produits.');
        }

        $categorie->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée.');
    }
}
