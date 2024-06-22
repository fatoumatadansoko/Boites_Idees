<!-- resources/views/categories/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Créer une nouvelle catégorie</h1>
    
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="libelle">Libellé :</label>
            <input type="text" id="libelle" name="libelle" required>
        </div>
        <button type="submit">Enregistrer</button>
    </form>
@endsection
