
@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">Gestion des commandes</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->user->name }}</td>
                    <td>{{ $commande->created_at->format('d/m/Y') }}</td>
                    <td>{{ $commande->statut }}</td>

                    <td>
                        <a href="{{ route('admin.commandes.show', $commande->id) }}" class="btn btn-info btn-sm">
                            Voir détails
                        </a>

                        <form action="{{ route('admin.commandes.destroy', $commande->id) }}" method="POST" class="d-inline">
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

