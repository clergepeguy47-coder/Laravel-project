@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h1 class="mb-4 text-center">Dashboard Administrateur</h1>

    
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card p-3 text-center shadow-sm">
                <h5>Produits</h5>
                <h2>{{ $stats['produits'] }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 text-center shadow-sm">
                <h5>Catégories</h5>
                <h2>{{ $stats['categories'] }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 text-center shadow-sm">
                <h5>Commandes</h5>
                <h2>{{ $stats['commandes'] }}</h2>
            </div>
        </div>
    </div>

    
    <div class="card shadow-sm p-4">
        <h4 class="text-center mb-3">Commandes par mois</h4>
        <canvas id="chartCommandes"></canvas>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const ctx = document.getElementById('chartCommandes');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($months),
            datasets: [{
                label: 'Commandes',
                data: @json($ordersCount),
                borderWidth: 2,
                borderColor: '#007bff',
                backgroundColor: 'rgba(0,123,255,0.2)',
                tension: 0.3
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
@endsection
