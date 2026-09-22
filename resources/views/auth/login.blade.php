@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 500px;">

    <h1 class="mb-4 text-center">Connexion</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            Email ou mot de passe incorrect.
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">Se connecter</button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('register') }}">Créer un compte</a>
    </div>

</div>
@endsection
