<!-- resources/views/categories/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier la catégorie {{ $categorie->id }}</h1>
        
        <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé :</label>
                <input type="text" id="libelle" name="libelle" value="{{ $categorie->libelle }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>
@endsection
