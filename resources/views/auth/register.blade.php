@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 500px;">

    <h1 class="mb-4 text-center">Créer un compte</h1>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-success w-100">S'inscrire</button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('login') }}">Déjà un compte ? Se connecter</a>
    </div>

</div>
@endsection
