@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">Modifier le produit</h1>

    <form action="{{ route('admin.produits.update', $produit->id) }}" 
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- NOM --}}
        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" 
                   value="{{ $produit->nom }}" required>
        </div>

        {{-- PRIX --}}
        <div class="mb-3">
            <label class="form-label">Prix (€)</label>
            <input type="number" name="prix" class="form-control" step="0.01" 
                   value="{{ $produit->prix }}" required>
        </div>

        {{-- DESCRIPTION --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">
                {{ $produit->description }}
            </textarea>
        </div>

        {{-- CATÉGORIE --}}
        <div class="mb-3">
            <label class="form-label">Catégorie</label>
            <select name="categorie_id" class="form-select" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}"
                        @if($produit->categorie_id == $categorie->id) selected @endif>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- STOCK --}}
        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" min="0"
                   value="{{ $produit->stock }}" required>
        </div>

        {{-- IMAGE --}}
        <div class="mb-3">
            <label class="form-label">Image du produit</label>
            <input type="file" name="image" class="form-control">

            @if($produit->image)
                <div class="mt-3">
                    <img src="{{ asset('images/produits/' . $produit->image) }}" 
                         width="150" class="rounded">
                </div>
            @endif
        </div>

        <button class="btn btn-warning">Mettre à jour</button>
    </form>

</div>
@endsection
