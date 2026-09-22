@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">Liste des catégories</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
        Ajouter une catégorie
    </a>

    @if($categories->isEmpty())
        <div class="alert alert-info">
            Aucune catégorie disponible.
        </div>
    @else

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Produits</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->nom }}</td>

                        <td>
                            @if($categorie->produits && $categorie->produits->count() > 0)
                                @foreach($categorie->produits as $prod)
                                    <span class="badge bg-info">{{ $prod->nom }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">Aucun produit</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('categories.show', $categorie->id) }}" class="btn btn-sm btn-success">
                                Voir
                            </a>

                            <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-sm btn-warning">
                                Modifier
                            </a>

                            <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" class="d-inline">
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

    @endif

</div>
@endsection
