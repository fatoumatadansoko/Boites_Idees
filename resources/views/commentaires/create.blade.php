@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter un commentaire pour l'idée {{ $idee->id }}</h1>

        <form action="{{ route('commentaires.store', $idee) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="libelle">libelle :</label>
                <textarea class="form-control" id="libelle" name="libelle" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="nom_complet_auteur">Nom complet de l'auteur :</label>
                <input type="text" class="form-control" id="nom_complet_auteur" name="nom_complet_auteur" required>
            </div>

            <div class="form-group">
                <label for="idee_id">Id de l'idée :</label>
                <input type="text" class="form-control" id="idee_id" name="idee_id" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter le commentaire</button>
        </form>
    </div>
@endsection
