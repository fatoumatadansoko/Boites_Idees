<!-- resources/views/categories/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Modifier la catégorie {{ $categorie->id }}</h1>
    
    <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="libelle">Libellé :</label>
            <input type="text" id="libelle" name="libelle" value="{{ $categorie->libelle }}" required>
        </div>
        <button type="submit">Enregistrer les modifications</button>
    </form>
@endsection
