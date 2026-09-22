@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">Liste des produits</h1>

    <a href="{{ route('produits.create') }}" class="btn btn-primary mb-3">
        Ajouter un produit
    </a>

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($produits as $produit)
            <tr>

                {{-- IMAGE --}}
                <td>
                    @if($produit->image)
                        <img src="{{ asset('images/produits/' . $produit->image) }}" width="80" class="rounded">
                    @else
                        <span class="text-muted">Aucune image</span>
                    @endif
                </td>

                {{-- NOM --}}
                <td>{{ $produit->nom }}</td>

                {{-- PRIX --}}
                <td>{{ $produit->prix }} €</td>

                {{-- CATÉGORIE --}}
                <td>
                    @if($produit->categorie)
                        <span class="badge bg-info">{{ $produit->categorie->nom }}</span>
                    @else
                        <span class="text-muted">Non définie</span>
                    @endif
                </td>

                {{-- STOCK --}}
                <td>
                    @if($produit->stock > 0)
                        <span class="badge bg-success">{{ $produit->stock }}</span>
                    @else
                        <span class="badge bg-danger">Rupture</span>
                    @endif
                </td>

                {{-- ACTIONS --}}
                <td>
                    <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-sm btn-success">
                        Voir
                    </a>

                    <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-sm btn-warning">
                        Modifier
                    </a>

                    <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            Supprimer
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
