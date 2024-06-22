@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter une Idée</h1>

        <form action="{{ route('idees.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé :</label>
                <input type="text" class="form-control" id="libelle" name="libelle" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="auteur_nom_complet" class="form-label">Nom complet de l'auteur :</label>
                <input type="text" class="form-control" id="auteur_nom_complet" name="auteur_nom_complet" required>
            </div>
            <div class="mb-3">
                <label for="auteur_email" class="form-label">Email de l'auteur :</label>
                <input type="email" class="form-control" id="auteur_email" name="auteur_email" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Statut :</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="approuvee">Approuvée</option>
                    <option value="refusee">Refusée</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="categorie_id" class="form-label">Catégorie :</label>
                <select class="form-select" id="categorie_id" name="categorie_id" required>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection
