@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Idées</h1>

        <a href="{{ route('idees.create') }}" class="btn btn-primary mb-3">Ajouter une Idée</a>

        @if ($idees->isEmpty())
            <p>Aucune idée trouvée.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Libellé</th>
                        <th scope="col">Description</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($idees as $idee)
                        <tr>
                            <td>{{ $idee->id }}</td>
                            <td>{{ $idee->libelle }}</td>
                            <td>{{ $idee->description }}</td>
                            <td>{{ $idee->auteur_nom_complet }}</td>
                            <td>{{ $idee->status }}</td>
                            <td>
                                <a href="{{ route('idees.show', $idee->id) }}" class="btn btn-info btn-sm">Voir</a>
                                <a href="{{ route('idees.edit', $idee->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('idees.destroy', $idee->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette idée ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
