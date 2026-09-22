@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1>Détails de la commande #{{ $commande->id }}</h1>

    <p><strong>Client :</strong> {{ $commande->user->name }}</p>
    <p><strong>Date :</strong> {{ $commande->created_at->format('d/m/Y') }}</p>
    <p><strong>Statut :</strong> {{ $commande->statut }}</p>

    <hr>

    <h3>Produits</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
            @foreach($commande->items as $item)
                <tr>
                    <td>{{ $item->produit->nom }}</td>
                    <td>{{ $item->prix }} €</td>
                    <td>{{ $item->quantite }}</td>
                    <td>{{ $item->prix * $item->quantite }} €</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3 class="text-end">Total : {{ $total }} €</h3>

    <hr>

    <form action="{{ route('admin.commandes.statut', $commande->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Changer le statut :</label>
        <select name="statut" class="form-select w-25">
            <option value="En attente">En attente</option>
            <option value="En cours">En cours</option>
            <option value="Livrée">Livrée</option>
        </select>

        <button class="btn btn-warning mt-2">Mettre à jour</button>
    </form>

</div>
@endsection
