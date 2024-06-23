
    @extends('layouts.app')

@section('content')
    <div>
        <div>
        <img src="{{asset('img/banner.jpg')}}" class="gauche" alt="...">
        </div>
        <!-- Conteneur principal -->
        <div>
            <div>
                <div>
                    <h1>S'inscrire</h1>
                </div>
                <!-- Affichage des messages de statut -->
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <!-- Affichage des erreurs de validation -->
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </ul>

                <!-- Formulaire d'inscription -->
                <form method="POST" action="{{ route('register') }}" class="form-group">
                    @csrf
                    <div class="mb-3 text-start">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="role" class="form-label">role</label>
                        <input type="role" class="form-control" id="role" name="role" value="{{ old('role') }}" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="password_confirmation" class="form-label">Confirmation du mot de passe</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <!-- Bouton d'inscription -->
                    <div class="d-flex justify-content-between mt-5">
                        <button type="submit" class="btn btn-primary me-2 custom-btn">Enregistrer</button>
                        <a href="/" class="btn btn-danger mt-3">Retourner</a>
                    </div>
                    <a href="login" class="btn btn-outline-secondary bouton"> J'ai un compte, me connecter </a>
                </form>
                
            </div>
        </div>
    </div>
    
    <!-- Chargement de Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin
