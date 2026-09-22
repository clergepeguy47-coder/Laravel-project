@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">Gestion des catégories</h1>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">
        Ajouter une catégorie
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $categorie)
                <tr>
                    <td>{{ $categorie->nom }}</td>

                    <td>
                        <a href="{{ route('admin.categories.edit', $categorie->id) }}" class="btn btn-warning btn-sm">
                            Modifier
                        </a>

                        <form action="{{ route('admin.categories.destroy', $categorie->id) }}" method="POST" class="d-inline">
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
@endsection
