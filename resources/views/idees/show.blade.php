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
          <!-- Bouton pour ajouter un commentaire -->
    <a href="{{ route('commentaires.create', $idee) }}" class="btn btn-primary">Commenter</a>
    </div>
@endsection
@if ($idee->commentaires->count() > 0)
    <h4>Commentaires :</h4>
    <ul>
        @foreach ($idee->commentaires as $commentaire)
            <li>{{ $commentaire->libelle }}</li>
            <li>{{ $commentaire->nom_complet_auteur }}</li>
            <li>{{ $commentaire->idee_id }}</li>

            <p>
                <a href="{{ route('commentaires.edit', $commentaire) }}">Modifier</a>
                <form action="{{ route('commentaires.destroy', $commentaire) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link">Supprimer</button>
                </form>
            </p>
        @endforeach
    </ul>
@else
    <p>Aucun commentaire pour cette idée.</p>
@endif
