@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1>Modifier la catégorie</h1>

    <form action="{{ route('admin.categories.update', $categorie->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $categorie->nom }}" required>
        </div>

        <button class="btn btn-warning">Mettre à jour</button>
    </form>

</div>
@endsection
