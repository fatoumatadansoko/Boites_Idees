<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Liste des Catégories</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Libellé</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categorie)
            <tr>
                <td>{{ $categorie->id }}</td>
                <td>{{ $categorie->libelle }}</td>
                <td>
                    <a href="{{ route('categories.show', $categorie->id) }}">Voir</a>
                    <a href="{{ route('categories.edit', $categorie->id) }}">Modifier</a>
                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('categories.create') }}">Créer une nouvelle catégorie</a>
@endsection
