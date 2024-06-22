@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter un commentaire</h1>

        <form action="{{ route('commentaires.store', $idee) }}" method="POST">
            @csrf


            <div class="form-group">
                <label for="libelle">libelle :</label>
                <textarea class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle" rows="3" >{{ old('libelle') }}</textarea>
                @error('libelle')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nom_complet_auteur">Nom complet de l'auteur :</label>
                <input type="text" class="form-control @error('nom_complet_auteur') is-invalid @enderror" id="nom_complet_auteur" name="nom_complet_auteur" value="{{ old('nom_complet_auteur') }}" >
                @error('nom_complet_auteur')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="idee_id">Id idée :</label>
                <input type="text" class="form-control @error('idee_id') is-invalid @enderror" id="idee_id" name="idee_id" value="{{ old('idee_id') }}" >
                @error('idee_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Ajouter le commentaire</button>
        </form>
    </div>
@endsection
