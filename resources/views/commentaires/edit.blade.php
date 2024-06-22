@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier le commentaire</h1>

        <form action="{{ route('commentaires.update', $commentaire->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="contenu">Contenu :</label>
                <textarea class="form-control" id="contenu" name="contenu" rows="3" required>{{ $commentaire->contenu }}</textarea>
            </div>

            <div class="form-group">
                <label for="nom_complet_auteur">Nom complet de l'auteur :</label>
                <input type="text" class="form-control" id="nom_complet_auteur" name="nom_complet_auteur" value="{{ $commentaire->nom_complet_auteur }}" required>
            </div>


            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>
@endsection
