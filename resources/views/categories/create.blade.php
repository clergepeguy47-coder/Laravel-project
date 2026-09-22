@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1>Ajouter une catégorie</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nom de la catégorie</label>
            <input type="text" name="nom" class="form-control">
        </div>

        <button class="btn btn-success">Enregistrer</button>
    </form>

</div>
@endsection
