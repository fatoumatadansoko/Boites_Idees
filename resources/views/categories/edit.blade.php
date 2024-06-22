@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier la catégorie {{ $categorie->id }}</h1>
        
        <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
            @csrf
            @method('PUT')
            

            <div class="form-col mb-3">
                <label for="libelle" class="form-label">libelle</label>
                <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle" value="{{ old('libelle') }}">
                @error('libelle')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

           

            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>
@endsection
