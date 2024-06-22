@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de l'Idée {{ $idee->id }}</h1>

        <div>
            <p><strong>Libellé :</strong> {{ $idee->libelle }}</p>
            <p><strong>Description :</strong> {{ $idee->description }}</p>
            <p><strong>Nom complet de l'auteur :</strong> {{ $idee->auteur_nom_complet }}</p>
            <p><strong>Email de l'auteur :</strong> {{ $idee->auteur_email }}</p>
            <p><strong>Statut :</strong> {{ $idee->status }}</p>
            <p><strong>Catégorie :</strong> {{ $idee->categorie->libelle }}</p>
            <p><strong>Date de création :</strong> {{ $idee->created_at->format('d/m/Y H:i:s') }}</p>
            <p><strong>Dernière mise à jour :</strong> {{ $idee->updated_at->format('d/m/Y H:i:s') }}</p>
        </div>

        <a href="{{ route('idees.index') }}" class="btn btn-primary">Retour à la liste des idées</a>
    </div>
@endsection
