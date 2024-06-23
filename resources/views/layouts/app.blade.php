<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Application</title>
    <!-- Styles CSS Bootstrap et Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Styles CSS personnalisés -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <!-- Barre de navigation Bootstrap -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container justify-content-center">
                <a class="navbar-brand" href="/">Accueil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.index') }}">Catégories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('idees.index') }}">Idées</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto"> <!-- Alignement à droite -->
                        @auth <!-- Vérifie si l'utilisateur est authentifié -->
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="delete">
                                    @csrf
                                    <button type="submit" class="btn btn-link nav-link">Déconnexion</button>
                                </form>
                                
                                
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-5 mt-5">
        <div class="container">
            @yield('content')
            @yield('comments')
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-light fixed-bottom" style="background-color: #f59696;">
        <div class="container text-center">
            <span class="text-muted">© {{ date('Y') }} Mon Application. Tous droits réservés.</span>
        </div>
    </footer>

    <!-- Scripts JavaScript Bootstrap et autres -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
