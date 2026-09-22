@extends('layouts.app')

@section('content')
<script src="https://js.stripe.com/v3/"></script>

<h1>Paiement Stripe</h1>

<button id="checkout" class="btn btn-primary">Payer</button>

<script>
const stripe = Stripe("{{ env('STRIPE_KEY') }}");

document.getElementById('checkout').addEventListener('click', () => {
    stripe.redirectToCheckout({ sessionId: "{{ $session->id }}" });
});
</script>
@endsection
