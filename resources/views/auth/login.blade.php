<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Se connecter</title>
    <!-- Inclusion de Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Inclusion de Bootstrap CSS pour le style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container-lg {
            max-width: 800px; /* Augmentation de la largeur du container */
        }
        .form-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh; /* Hauteur minimale de la vue pour centrer verticalement */
        }
        .form-box {
            background-color: #ffffff; /* Couleur de fond du formulaire */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .gauche {
            height: 100vh; /* Hauteur de la vue pour correspondre au conteneur */
            width: 100%;
            object-fit: cover;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        /* Définition de la couleur personnalisée pour le bouton */
        .custom-btn {
            background-color: #188774 !important;
        }
    </style>
</head>
<body>
    <div class="row g-0 bg-body-secondary">
        <div class="col-md-6 mb-md-0">
            <img src="{{ asset('img/livre2.png') }}" class="gauche" alt="Image">
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center">
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
                <form method="POST" action="{{ route('auth.login') }}" class="form-group">
                    @csrf
                    <div class="mb-3 text-start">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
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
