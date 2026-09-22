@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">Votre panier</h1>

    @if(empty($panier) || count($panier) == 0)
        <div class="alert alert-info">Votre panier est vide.</div>
    @else

        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($panier as $item)
                    <tr>
                        <td>{{ $item['nom'] }}</td>
                        <td>{{ number_format($item['prix'], 2, ',', ' ') }} €</td>
                        <td>{{ $item['quantite'] }}</td>
                        <td>{{ number_format($item['prix'] * $item['quantite'], 2, ',', ' ') }} €</td>
                        <td>
                            <a href="{{ route('panier.supprimer', $item['id']) }}"
                               class="btn btn-danger btn-sm">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end">
            <a href="{{ route('commandes.creer') }}" class="btn btn-success btn-lg">
                Passer la commande
            </a>
        </div>

    @endif

</div>
@endsection
