<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', '☠ IMPERIUM ARMORY ☠ - Pour l\'Empereur!')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts - Brutal Gothic -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Oswald:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --blood: #8b0000;
            --blood-dark: #5c0000;
            --blood-glow: #ff2222;
            --skull: #d4c4a8;
            --bone: #e8dcc8;
            --rust: #8b4513;
            --metal: #4a4a4a;
            --dark-metal: #2d2d2d;
            --chaos-black: #0a0a0a;
            --imperial-gold: #c9a227;
            --corruption: #1a0a1a;
            --warp: #2d0a2d;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Oswald', sans-serif;
            background: 
                url("data:image/svg+xml,%3Csvg viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.08'/%3E%3C/svg%3E"),
                radial-gradient(ellipse at 20% 0%, rgba(139, 0, 0, 0.3) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 100%, rgba(45, 10, 45, 0.4) 0%, transparent 50%),
                linear-gradient(180deg, #0a0a0a 0%, #1a0a0a 50%, #0a0a0a 100%);
            background-attachment: fixed;
            color: var(--bone);
            min-height: 100vh;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(
                0deg,
                transparent,
                transparent 2px,
                rgba(0, 0, 0, 0.1) 2px,
                rgba(0, 0, 0, 0.1) 4px
            );
            pointer-events: none;
            z-index: 9999;
        }

        /* NAVBAR BRUTALE */
        .war-nav {
            background: linear-gradient(180deg, 
                rgba(45, 10, 10, 0.98) 0%, 
                rgba(20, 5, 5, 0.95) 100%);
            border-bottom: 3px solid var(--blood);
            box-shadow: 
                0 4px 20px rgba(139, 0, 0, 0.5),
                inset 0 -1px 0 rgba(201, 162, 39, 0.3);
            position: relative;
        }

        .war-nav::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, 
                transparent 0%, 
                var(--blood-glow) 20%, 
                var(--imperial-gold) 50%, 
                var(--blood-glow) 80%, 
                transparent 100%);
            animation: bloodPulse 3s ease-in-out infinite;
        }

        @keyframes bloodPulse {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .brand-war {
            font-family: 'Cinzel', serif;
            font-weight: 900;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--imperial-gold) !important;
            text-shadow: 
                0 0 10px rgba(201, 162, 39, 0.5),
                2px 2px 4px rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .skull-icon {
            font-size: 1.8rem;
            filter: drop-shadow(0 0 5px rgba(139, 0, 0, 0.8));
        }

        .aquila {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--imperial-gold), #8b6914);
            clip-path: polygon(50% 0%, 100% 25%, 85% 100%, 50% 75%, 15% 100%, 0% 25%);
            box-shadow: 0 0 15px rgba(201, 162, 39, 0.6);
            position: relative;
        }

        .aquila::after {
            content: '☠';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 18px;
            color: var(--blood-dark);
        }

        .nav-link-war {
            font-family: 'Oswald', sans-serif;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--skull) !important;
            position: relative;
            padding: 8px 16px !important;
            transition: all 0.3s ease;
        }

        .nav-link-war::before {
            content: '†';
            position: absolute;
            left: 0;
            opacity: 0;
            color: var(--blood);
            transition: all 0.3s ease;
        }

        .nav-link-war:hover,
        .nav-link-war.active {
            color: var(--blood-glow) !important;
            text-shadow: 0 0 10px rgba(255, 34, 34, 0.8);
        }

        .nav-link-war:hover::before,
        .nav-link-war.active::before {
            opacity: 1;
            left: -15px;
        }

        /* CONTENU PRINCIPAL */
        .war-main {
            position: relative;
            z-index: 1;
        }

        .product-thumb {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border: 2px solid var(--rust);
            filter: sepia(20%) contrast(110%);
            transition: all 0.3s ease;
        }

        .product-thumb:hover {
            filter: sepia(0%) contrast(120%);
            border-color: var(--blood);
            box-shadow: 0 0 20px rgba(139, 0, 0, 0.6);
        }

        /* HERO SECTION */
        .hero {
            background: 
                linear-gradient(135deg, rgba(92, 0, 0, 0.2) 0%, transparent 50%),
                linear-gradient(180deg, rgba(20, 10, 10, 0.95), rgba(10, 5, 5, 0.9));
            border: 2px solid var(--blood-dark);
            border-radius: 0;
            padding: 40px;
            position: relative;
            box-shadow: 
                0 0 30px rgba(139, 0, 0, 0.3),
                inset 0 0 60px rgba(0, 0, 0, 0.5);
        }

        .hero::before,
        .hero::after {
            content: '⚔';
            position: absolute;
            font-size: 2rem;
            color: var(--imperial-gold);
            opacity: 0.6;
        }

        .hero::before { top: 10px; left: 15px; }
        .hero::after { bottom: 10px; right: 15px; transform: rotate(180deg); }

        /* TITRES */
        .imperial-title {
            font-family: 'Cinzel', serif;
            font-weight: 900;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--imperial-gold);
            text-shadow: 
                2px 2px 0 var(--blood-dark),
                0 0 20px rgba(201, 162, 39, 0.4);
            position: relative;
        }

        .imperial-title::after {
            content: '';
            display: block;
            width: 60%;
            height: 3px;
            background: linear-gradient(90deg, var(--blood), var(--imperial-gold), var(--blood));
            margin: 10px auto 0;
        }

        .war-subtitle {
            font-family: 'Oswald', sans-serif;
            color: var(--skull);
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .muted {
            color: #8a8070;
        }

        /* BOUTONS BRUTAUX */
        .btn-war {
            font-family: 'Oswald', sans-serif;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            background: linear-gradient(180deg, var(--blood) 0%, var(--blood-dark) 100%);
            border: 2px solid var(--imperial-gold);
            color: var(--bone) !important;
            padding: 12px 30px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            clip-path: polygon(8px 0, 100% 0, 100% calc(100% - 8px), calc(100% - 8px) 100%, 0 100%, 0 8px);
        }

        .btn-war::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-war:hover {
            background: linear-gradient(180deg, var(--blood-glow) 0%, var(--blood) 100%);
            box-shadow: 
                0 0 20px rgba(255, 34, 34, 0.6),
                inset 0 0 20px rgba(255, 255, 255, 0.1);
            transform: scale(1.02);
        }

        .btn-war:hover::before {
            left: 100%;
        }

        .btn-war-secondary {
            background: linear-gradient(180deg, var(--metal) 0%, var(--dark-metal) 100%);
            border: 2px solid var(--rust);
        }

        .btn-war-secondary:hover {
            background: linear-gradient(180deg, #5a5a5a 0%, var(--metal) 100%);
            border-color: var(--imperial-gold);
        }

        /* CARTES */
        .card-war {
            background: 
                linear-gradient(180deg, rgba(30, 15, 15, 0.95), rgba(15, 8, 8, 0.9));
            border: 2px solid var(--rust);
            border-radius: 0;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card-war::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--blood), transparent);
        }

        .card-war:hover {
            border-color: var(--blood);
            box-shadow: 
                0 10px 40px rgba(139, 0, 0, 0.4),
                0 0 0 1px var(--imperial-gold);
            transform: translateY(-5px);
        }

        .card-war .card-header {
            background: linear-gradient(180deg, rgba(139, 0, 0, 0.3), transparent);
            border-bottom: 1px solid var(--blood-dark);
            font-family: 'Cinzel', serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        /* FORMULAIRES */
        .form-control-war {
            background: rgba(10, 10, 10, 0.8);
            border: 2px solid var(--rust);
            color: var(--bone);
            font-family: 'Oswald', sans-serif;
            border-radius: 0;
        }

        .form-control-war:focus {
            background: rgba(20, 10, 10, 0.9);
            border-color: var(--blood);
            box-shadow: 0 0 15px rgba(139, 0, 0, 0.5);
            color: var(--bone);
        }

        .form-control-war::placeholder {
            color: #5a5050;
        }

        /* FOOTER BRUTAL */
        .war-footer {
            background: 
                linear-gradient(180deg, rgba(20, 5, 5, 0.98), rgba(10, 2, 2, 1));
            border-top: 3px solid var(--blood);
            position: relative;
        }

        .war-footer::before {
            content: '';
            position: absolute;
            top: -3px;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, 
                transparent, 
                var(--blood-glow), 
                var(--imperial-gold), 
                var(--blood-glow), 
                transparent);
        }

        .footer-skull {
            font-size: 3rem;
            color: var(--skull);
            opacity: 0.3;
            text-shadow: 0 0 10px rgba(139, 0, 0, 0.5);
        }

        .war-quote {
            font-family: 'Cinzel', serif;
            font-style: italic;
            color: var(--imperial-gold);
            text-shadow: 0 0 10px rgba(201, 162, 39, 0.3);
            letter-spacing: 0.05em;
        }

        .tiny {
            font-size: 0.85rem;
            letter-spacing: 0.05em;
        }

        /* DECORATIONS */
        .blood-drip {
            position: fixed;
            top: 0;
            width: 4px;
            height: 80px;
            background: linear-gradient(180deg, var(--blood), transparent);
            opacity: 0.4;
            animation: drip 4s ease-in-out infinite;
        }

        @keyframes drip {
            0%, 100% { height: 80px; opacity: 0.4; }
            50% { height: 120px; opacity: 0.6; }
        }

        .corner-decoration {
            position: fixed;
            width: 100px;
            height: 100px;
            opacity: 0.15;
            pointer-events: none;
        }

        .corner-decoration.top-left {
            top: 0;
            left: 0;
            border-top: 3px solid var(--imperial-gold);
            border-left: 3px solid var(--imperial-gold);
        }

        .corner-decoration.top-right {
            top: 0;
            right: 0;
            border-top: 3px solid var(--imperial-gold);
            border-right: 3px solid var(--imperial-gold);
        }

        .corner-decoration.bottom-left {
            bottom: 0;
            left: 0;
            border-bottom: 3px solid var(--blood);
            border-left: 3px solid var(--blood);
        }

        .corner-decoration.bottom-right {
            bottom: 0;
            right: 0;
            border-bottom: 3px solid var(--blood);
            border-right: 3px solid var(--blood);
        }

        /* SCROLLBAR CUSTOM */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--chaos-black);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, var(--blood), var(--blood-dark));
            border: 1px solid var(--rust);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, var(--blood-glow), var(--blood));
        }

        /* SELECTION */
        ::selection {
            background: var(--blood);
            color: var(--bone);
        }

        /* ANIMATIONS HOVER GLOBALES */
        a {
            transition: all 0.3s ease;
        }

        /* BADGES */
        .badge-war {
            background: linear-gradient(135deg, var(--blood), var(--blood-dark));
            border: 1px solid var(--imperial-gold);
            font-family: 'Oswald', sans-serif;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .badge-chaos {
            background: linear-gradient(135deg, var(--warp), var(--corruption));
            border: 1px solid #6b1a6b;
        }

        /* PRIX & TAGS */
        .price-war {
            font-family: 'Cinzel', serif;
            font-weight: 900;
            color: var(--blood-glow);
            text-shadow: 0 0 10px rgba(255, 34, 34, 0.5);
        }

        .tag-xenos {
            background: linear-gradient(135deg, #1a4a1a, #0a2a0a);
            border: 1px solid #2a6a2a;
            color: #4a9a4a;
        }

        .tag-heretic {
            background: linear-gradient(135deg, #4a1a4a, #2a0a2a);
            border: 1px solid #6a2a6a;
            color: #9a4a9a;
        }

        /* ALERTES */
        .alert-war {
            background: linear-gradient(180deg, rgba(139, 0, 0, 0.3), rgba(92, 0, 0, 0.2));
            border: 2px solid var(--blood);
            border-left: 5px solid var(--blood-glow);
            color: var(--bone);
            font-family: 'Oswald', sans-serif;
        }

        .alert-war-success {
            background: linear-gradient(180deg, rgba(39, 162, 39, 0.2), rgba(20, 80, 20, 0.15));
            border-color: #2a6a2a;
            border-left-color: #4a9a4a;
        }

        /* TABLE STYLE */
        .table-war {
            color: var(--bone);
            border-color: var(--rust);
        }

        .table-war thead {
            background: linear-gradient(180deg, rgba(139, 0, 0, 0.4), rgba(92, 0, 0, 0.2));
            font-family: 'Cinzel', serif;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        .table-war tbody tr:hover {
            background: rgba(139, 0, 0, 0.15);
        }

        /* DIVIDER */
        .divider-war {
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--blood), var(--imperial-gold), var(--blood), transparent);
            margin: 2rem 0;
        }

        /* LOADING ANIMATION */
        .loading-war {
            width: 50px;
            height: 50px;
            border: 3px solid var(--rust);
            border-top-color: var(--blood-glow);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* PURITY SEAL DECORATION */
        .purity-seal {
            position: relative;
            display: inline-block;
            padding: 15px 25px;
            background: linear-gradient(180deg, #8b6914, #5a4510);
            clip-path: polygon(0 0, 100% 0, 100% 75%, 50% 100%, 0 75%);
        }

        .purity-seal::before {
            content: '☠';
            position: absolute;
            top: 5px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 1.5rem;
            color: var(--blood-dark);
        }
    </style>
</head>

<body>

    <!-- Décorations de coins -->
    <div class="corner-decoration top-left"></div>
    <div class="corner-decoration top-right"></div>
    <div class="corner-decoration bottom-left"></div>
    <div class="corner-decoration bottom-right"></div>

    <!-- Gouttes de sang décoratives -->
    <div class="blood-drip" style="left: 15%; animation-delay: 0s;"></div>
    <div class="blood-drip" style="left: 45%; animation-delay: 1.5s;"></div>
    <div class="blood-drip" style="left: 75%; animation-delay: 0.8s;"></div>
    <div class="blood-drip" style="left: 90%; animation-delay: 2.2s;"></div>

    <header class="war-nav">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container py-2">
                <a class="navbar-brand brand-war" href="{{ url('/') }}">
                    <div class="aquila"></div>
                    <span>
                        <span class="skull-icon">☠</span>
                        IMPERIUM ARMORY
                        <span class="skull-icon">☠</span>
                    </span>
                </a>

                <button class="navbar-toggler border-danger" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navMain">
                    <ul class="navbar-nav ms-auto gap-lg-3">
                        <li class="nav-item">
                            <a class="nav-link nav-link-war {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                                ⚔ Quartier Général
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-war {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">
                                📜 Codex Astartes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-war {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">
                                🔥 Vox Transmission
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-5 war-main">
        @yield('content')
    </main>

    <footer class="war-footer py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <div class="footer-skull">☠</div>
                </div>
                <div class="col-md-4 text-center">
                    <p class="war-quote mb-2">"Dans les ténèbres du 41ème millénaire,<br>il n'y a que la guerre."</p>
                    <p class="tiny muted mb-0">† POUR L'EMPEREUR †</p>
                </div>
                <div class="col-md-4 text-center text-md-end">
                    <p class="tiny muted mb-1">© {{ date('Y') }} IMPERIUM ARMORY</p>
                    <p class="tiny text-danger mb-0">« Seul le sang satisfait l'Empereur »</p>
                </div>
            </div>
            <hr class="my-4" style="border-color: var(--blood-dark);">
            <div class="text-center">
                <small class="muted">☠ EXTERMINATUS EN CAS DE TRAHISON ☠</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
