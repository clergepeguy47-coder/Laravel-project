@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1>Détails de la commande #{{ $commande->id }}</h1>

    <p><strong>Client :</strong> {{ $commande->user->name }}</p>
    <p><strong>Total :</strong> {{ $commande->total }} €</p>
    <p><strong>Statut :</strong> {{ $commande->statut }}</p>

    <h3 class="mt-4">Produits</h3>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Sous-total</th>
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

</div>
@endsection
