@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">Ajouter un produit</h1>

    <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- NOM --}}
        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>

        {{-- PRIX --}}
        <div class="mb-3">
            <label class="form-label">Prix (€)</label>
            <input type="number" name="prix" class="form-control" step="0.01" required>
        </div>

        {{-- DESCRIPTION --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        {{-- CATÉGORIE --}}
        <div class="mb-3">
            <label class="form-label">Catégorie</label>

            
            <select name="categorie_id" class="form-select">
                <option value="">-- Choisir une catégorie --</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>

            <p class="mt-2 text-muted">Ou créer une nouvelle catégorie :</p>

            
            <input type="text" name="new_categorie" class="form-control" placeholder="Nouvelle catégorie (optionnel)">
        </div>

        {{-- STOCK --}}
        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" min="0" required>
        </div>

        {{-- IMAGE --}}
        <div class="mb-3">
            <label class="form-label">Image du produit</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success">Enregistrer</button>
    </form>

</div>
@endsection
