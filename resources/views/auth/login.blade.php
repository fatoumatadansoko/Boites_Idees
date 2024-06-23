
    @extends('layouts.app')

@section('content')
    <div>
       
        <div>
            <div class="container form-box">
                <div class="text-center mb-4">
                    <h1>Se connecter</h1>
                </div>
                <!-- Affichage des messages de statut -->
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
                <!-- Affichage des erreurs de validation -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulaire de connexion -->
                <form method="POST" action="{{ route('login') }}" class="form-group">
                    @csrf
                    <div class="mb-3 text-start">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="role" class="form-label">role</label>
                        <input type="role" class="form-control" id="role" name="role" value="{{ old('role') }}" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <!-- Bouton de connexion -->
                    <div class="d-flex justify-content-between mt-5">
                        <button type="submit" class="btn btn-primary me-2 custom-btn">Se connecter</button>
                        <a href="/" class="btn btn-danger mt-3">Retourner</a>
                    </div>
                    <a href="register" class="btn btn-outline-secondary bouton mt-3">Pas de compte, créer un</a>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Chargement de Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
