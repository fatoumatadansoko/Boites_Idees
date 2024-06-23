<!-- resources/views/categories/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Créer une nouvelle catégorie</h1>
      <!-- Affichage des messages de statut -->
      @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
    
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-col mb-3">
            <label for="libelle" class="form-label">libelle</label>
            <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle" value="{{ old('libelle') }}">
            @error('libelle')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit">Enregistrer</button>
    </form>
@endsection
