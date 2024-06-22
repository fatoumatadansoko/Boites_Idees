@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier l'Idée {{ $idee->id }}</h1>

        <form action="{{ route('idees.update', $idee->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé :</label>
                <input type="text" class="form-control" id="libelle" name="libelle" value="{{ $idee->libelle }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $idee->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="auteur_nom_complet" class="form-label">Nom complet de l'auteur :</label>
                <input type="text" class="form-control" id="auteur_nom_complet" name="auteur_nom_complet" value="{{ $idee->auteur_nom_complet }}" required>
            </div>
            <div class="mb-3">
                <label for="auteur_email" class="form-label">Email de l'auteur :</label>
                <input type="email" class="form-control" id="auteur_email" name="auteur_email" value="{{ $idee->auteur_email }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Statut :</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="approuvee" {{ $idee->status === 'approuvee' ? 'selected' : '' }}>Approuvée</option>
                    <option value="refusee" {{ $idee->status === 'refusee' ? 'selected' : '' }}>Refusée</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="categorie_id" class="form-label">Catégorie :</label>
                <select class="form-select" id="categorie_id" name="categorie_id" required>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ $idee->categorie_id === $categorie->id ? 'selected' : '' }}>{{ $categorie->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>
@endsection
