@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">Gestion des produits</h1>

    <a href="{{ route('admin.produits.create') }}" class="btn btn-primary mb-3">
        Ajouter un produit
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle" id="tableProduits">
        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Stock</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($produits as $produit)
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
                        @if($produit->stock == 0)
                            <span class="badge bg-danger">Rupture</span>
                        @elseif($produit->stock <= 5)
                            <span class="badge bg-warning text-dark">Stock faible ({{ $produit->stock }})</span>
                        @else
                            <span class="badge bg-success">{{ $produit->stock }}</span>
                        @endif
                    </td>

                    {{-- DESCRIPTION --}}
                    <td>{{ $produit->description }}</td>

                    {{-- ACTIONS --}}
                    <td>
                        <a href="{{ route('admin.produits.show', $produit->id) }}" 
                           class="btn btn-success btn-sm">
                            Voir
                        </a>

                        <a href="{{ route('admin.produits.edit', $produit->id) }}" 
                           class="btn btn-warning btn-sm">
                            Modifier
                        </a>

                        <form action="{{ route('admin.produits.destroy', $produit->id) }}" 
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                Supprimer
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

</div>

{{-- DATATABLES --}}
<script>
$(document).ready(function() {
    $('#tableProduits').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
        }
    });
});
</script>

@endsection
