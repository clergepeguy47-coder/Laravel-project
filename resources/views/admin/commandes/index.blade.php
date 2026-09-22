@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h1 class="mb-4">Commandes</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Total</th>
                <th>Statut</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
            <tr>
                <td>{{ $commande->id }}</td>
                <td>{{ $commande->user->name }}</td>
                <td>{{ number_format($commande->total, 2) }} €</td>
                <td>{{ $commande->statut }}</td>
                <td>{{ $commande->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('admin.commandes.show', $commande->id) }}" class="btn btn-primary btn-sm">
                        Voir détails
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
