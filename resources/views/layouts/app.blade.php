<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Laravel Boutique</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    {{-- Styles perso --}}
    <style>
        body {
            background-color: #f8f9fa;
        }
        nav.navbar {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="{{ route('home') }}">Boutique</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav me-auto">

                    {{-- FRONT --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produits.index') }}">Produits</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('panier.index') }}">Panier</a>
                    </li>

                    {{-- ADMIN --}}
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.produits') }}">Produits (Admin)</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.categories') }}">Catégories (Admin)</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.commandes') }}">Commandes (Admin)</a>
                            </li>
                        @endif
                    @endauth

                </ul>

                {{-- AUTH --}}
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <span class="nav-link text-white">
                                Bonjour, {{ auth()->user()->name }}
                            </span>
                        </li>

                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-sm">Déconnexion</button>
                            </form>
                        </li>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>

    {{-- MESSAGES GLOBAUX --}}
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    </div>

    {{-- CONTENU DES PAGES --}}
    @yield('content')

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Scripts personnalisés --}}
    @yield('scripts')

</body>
</html>
