@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter une Idée</h1>

    <form action="{{ route('idees.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="libelle" class="form-label">Libellé :</label>
            <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle" value="{{ old('libelle') }}" >
            @error('libelle')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" >{{ old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="auteur_nom_complet" class="form-label">Nom complet de l'auteur :</label>
            <input type="text" class="form-control @error('auteur_nom_complet') is-invalid @enderror" id="auteur_nom_complet" name="auteur_nom_complet" value="{{ old('auteur_nom_complet') }}" >
            @error('auteur_nom_complet')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="auteur_email" class="form-label">Email de l'auteur :</label>
            <input type="email" class="form-control @error('auteur_email') is-invalid @enderror" id="auteur_email" name="auteur_email" value="{{ old('auteur_email') }}" >
            @error('auteur_email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Statut :</label>
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" >
                <option value="approuvee" {{ old('status') == 'approuvee' ? 'selected' : '' }}>Approuvée</option>
                <option value="refusee" {{ old('status') == 'refusee' ? 'selected' : '' }}>Refusée</option>
            </select>
            @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="categorie_id" class="form-label">Catégorie :</label>
            <select class="form-select @error('categorie_id') is-invalid @enderror" id="categorie_id" name="categorie_id" >
                @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>{{ $categorie->libelle }}</option>
                @endforeach
            </select>
            @error('categorie_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
