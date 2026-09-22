@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">Détails du produit</h1>

    <div class="card shadow-sm">
        <div class="row g-0">

            {{-- IMAGE --}}
            <div class="col-md-4 p-3">
                @if($produit->image)
                    <img src="{{ asset('images/produits/' . $produit->image) }}" 
                         class="img-fluid rounded" alt="Image du produit">
                @else
                    <div class="text-muted">Aucune image disponible</div>
                @endif
            </div>

            {{-- INFORMATIONS --}}
            <div class="col-md-8 p-4">

                <h3>{{ $produit->nom }}</h3>

                <p class="mt-3">
                    <strong>Prix :</strong> {{ number_format($produit->prix, 2, ',', ' ') }} €
                </p>

                <p>
                    <strong>Catégorie :</strong>
                    @if($produit->categorie)
                        <span class="badge bg-info">{{ $produit->categorie->nom }}</span>
                    @else
                        <span class="text-muted">Non définie</span>
                    @endif
                </p>

                <p>
                    <strong>Stock :</strong>
                    @if($produit->stock > 0)
                        <span class="badge bg-success">{{ $produit->stock }}</span>
                    @else
                        <span class="badge bg-danger">Rupture</span>
                    @endif
                </p>

                <p class="mt-3">
                    <strong>Description :</strong><br>
                    {{ $produit->description ?? 'Aucune description' }}
                </p>

                {{-- EXTRA INFORMATIONS --}}
                <hr>

                <p>
                    <strong>Date d’ajout :</strong> {{ $produit->created_at->format('d/m/Y H:i') }}
                </p>

                <p>
                    <strong>Dernière modification :</strong> {{ $produit->updated_at->format('d/m/Y H:i') }}
                </p>

                {{-- ACTIONS --}}
                <div class="mt-4">
                    <a href="{{ route('admin.produits') }}" class="btn btn-secondary">
                        Retour
                    </a>

                    <a href="{{ route('admin.produits.edit', $produit->id) }}" class="btn btn-warning">
                        Modifier
                    </a>

                    <form action="{{ route('admin.produits.destroy', $produit->id) }}" 
                          method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Supprimer ce produit ?')">
                            Supprimer
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
