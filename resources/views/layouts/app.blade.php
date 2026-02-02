<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Lex Imperialis Store')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --bg: #0b0d12;
            --panel: #121622;
            --panel2: #0f1320;
            --text: #e7e7ea;
            --muted: #a7a7b3;
            --gold: #d8b35a;
            --gold2: #b38a2e;
            --line: rgba(216, 179, 90, .18);
        }

        body {
            background: radial-gradient(900px 500px at 20% 0%, rgba(216, 179, 90, .08), transparent 60%),
                radial-gradient(700px 450px at 80% 10%, rgba(255, 255, 255, .05), transparent 55%),
                var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        .imperial-nav {
            background: linear-gradient(180deg, rgba(18, 22, 34, .92), rgba(11, 13, 18, .88));
            border-bottom: 1px solid var(--line);
            backdrop-filter: blur(6px);
        }

        .product-thumb {
            width: 60%;
            height: 180px;
            object-fit: cover;
        }

        .brand {
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .brand-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .seal {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, .18), transparent 55%),
                linear-gradient(135deg, var(--gold), var(--gold2));
            box-shadow: 0 0 0 2px rgba(216, 179, 90, .25), 0 10px 30px rgba(0, 0, 0, .35);
        }

        .nav-link {
            color: rgba(231, 231, 234, .8) !important;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--gold) !important;
        }

        .hero {
            background: linear-gradient(180deg, rgba(18, 22, 34, .85), rgba(15, 19, 32, .65));
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 18px 60px rgba(0, 0, 0, .45);
        }

        .imperial-title {
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .muted {
            color: var(--muted);
        }

        .btn-imperial {
            border: 1px solid rgba(216, 179, 90, .55);
            color: var(--gold);
            background: rgba(216, 179, 90, .06);
        }

        .btn-imperial:hover {
            background: rgba(216, 179, 90, .14);
            color: #ffd77d;
            border-color: rgba(216, 179, 90, .8);
        }

        .card-imperial {
            background: linear-gradient(180deg, rgba(18, 22, 34, .9), rgba(15, 19, 32, .72));
            border: 1px solid var(--line);
            border-radius: 16px;
        }

        footer {
            border-top: 1px solid var(--line);
            background: rgba(0, 0, 0, .20);
        }

        .tiny {
            font-size: .9rem;
        }
    </style>
</head>

<body>

    <header class="imperial-nav">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container py-2">
                <a class="navbar-brand brand fw-bold" href="{{ url('/') }}">
                    <span class="brand-badge">
                        <span class="seal"></span>
                        Lex Imperialis Store
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navMain">
                    <ul class="navbar-nav ms-auto gap-lg-2">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">À propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-5">
        @yield('content')
    </main>

    <footer class="py-4">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
            <div class="tiny muted">© {{ date('Y') }} Lex Imperialis Store. Tous droits réservés.</div>
            <div class="tiny muted">“La foi est votre armure.”</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>