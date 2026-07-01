<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FIT·CONNECT — Accueil</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;600;700&family=Noto+Sans+JP:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --jp-bg: #f5f0e6;
            --jp-white: #fffdf8;
            --jp-black: #1c1c1c;
            --jp-red: #b7472a;
            --jp-red-dark: #8c3520;
            --jp-gray: #5c5c52;
            --jp-gold: #c9a86a;
            --jp-green: #4a5d4e;
            --jp-border: 1px solid rgba(28,28,28,0.12);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background-color: var(--jp-bg);
            font-family: 'Noto Sans JP', sans-serif;
            color: var(--jp-black);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── HEADER ── */
        .jp-header {
            background: var(--jp-black);
            color: var(--jp-white);
            padding: 18px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 4px solid var(--jp-red);
        }
        .jp-header .logo {
            font-family: 'Noto Serif JP', serif;
            font-size: 1.3rem;
            letter-spacing: 3px;
        }
        .jp-header .logo span { color: var(--jp-red); }
        .jp-header nav a {
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            margin-left: 24px;
            font-size: 0.88rem;
            transition: color 0.2s;
        }
        .jp-header nav a:hover { color: var(--jp-gold); }

        /* ── HERO ── */
        .jp-hero {
            background: var(--jp-black);
            color: var(--jp-white);
            padding: 72px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        /* cercle décoratif en fond */
        .jp-hero::before {
            content: "";
            position: absolute;
            right: -80px; top: -80px;
            width: 360px; height: 360px;
            border-radius: 50%;
            border: 2px solid rgba(183,71,42,0.25);
        }
        .jp-hero::after {
            content: "";
            position: absolute;
            right: -40px; top: -40px;
            width: 260px; height: 260px;
            border-radius: 50%;
            border: 2px solid rgba(183,71,42,0.12);
        }
        /* ligne verticale rouge façon torii */
        .jp-hero-line {
            width: 2px;
            height: 48px;
            background: var(--jp-red);
            margin: 0 auto 24px;
        }
        .jp-hero h1 {
            font-family: 'Noto Serif JP', serif;
            font-size: 2.8rem;
            font-weight: 700;
            letter-spacing: 6px;
            margin-bottom: 14px;
        }
        .jp-hero h1 span { color: var(--jp-red); }
        .jp-hero p {
            color: rgba(255,255,255,0.6);
            font-size: 0.95rem;
            letter-spacing: 1px;
            font-weight: 300;
        }
        .jp-hero-line-bottom {
            width: 48px;
            height: 2px;
            background: var(--jp-red);
            margin: 28px auto 0;
        }

        /* ── CARDS GRID ── */
        .jp-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 56px 24px;
            flex: 1;
        }

        .jp-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .jp-card {
            background: var(--jp-white);
            border: var(--jp-border);
            box-shadow: 0 2px 12px rgba(28,28,28,0.07);
            padding: 36px 28px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            position: relative;
            transition: transform 0.25s, box-shadow 0.25s;
            text-decoration: none;
            color: inherit;
        }
        .jp-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 28px rgba(28,28,28,0.12);
        }

        /* barre couleur en haut de chaque card */
        .jp-card::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
        }
        .jp-card-red::before   { background: var(--jp-red); }
        .jp-card-green::before { background: var(--jp-green); }
        .jp-card-gold::before  { background: var(--jp-gold); }

        /* icône stylisée */
        .jp-card-icon {
            width: 64px; height: 64px;
            border-radius: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            background: #1c1c1c;
        }

        .jp-card h3 {
            font-family: 'Noto Serif JP', serif;
            font-size: 1.15rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }
        .jp-card p {
            font-size: 0.85rem;
            color: var(--jp-gray);
            line-height: 1.6;
            margin-bottom: 28px;
            flex: 1;
        }

        .jp-card-link {
            font-size: 0.82rem;
            letter-spacing: 1px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .jp-card-red   .jp-card-link { color: var(--jp-red); }
        .jp-card-green .jp-card-link { color: var(--jp-green); }
        .jp-card-gold  .jp-card-link { color: #8a6d2f; }

        .jp-card-link::after {
            content: "→";
            transition: transform 0.2s;
        }
        .jp-card:hover .jp-card-link::after {
            transform: translateX(4px);
        }

        /* ── FOOTER ── */
        .jp-footer {
            text-align: center;
            padding: 20px;
            color: var(--jp-gray);
            font-size: 0.78rem;
            border-top: var(--jp-border);
        }

        @media (max-width: 720px) {
            .jp-grid { grid-template-columns: 1fr; }
            .jp-hero h1 { font-size: 2rem; }
        }
    </style>
</head>
<body>

<header class="jp-header">
    <div class="logo">FIT<span>·</span>CONNECT</div>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="index.php?module=adherent">Adhérents</a>
        <a href="index.php?module=abonnement">Abonnements</a>
        <a href="index.php?module=seance">Séances</a>
    </nav>
</header>

<!-- HERO -->
<div class="jp-hero">
    <div class="jp-hero-line"></div>
    <h1>FIT<span>·</span>CONNECT</h1>
    <p>Système de gestion des adhérents, abonnements et séances</p>
    <div class="jp-hero-line-bottom"></div>
</div>

<!-- CARDS -->
<div class="jp-container">
    <div class="jp-grid">

        <!-- Adhérents -->
        <a href="../public/index.php?module=adherent" class="jp-card jp-card-red">
            <div class="jp-card-icon">
                <svg width="64" height="64" viewBox="0 0 64 64">
                    <rect width="64" height="64" rx="4" fill="#1c1c1c"/>
                    <rect x="0" y="0" width="64" height="3" fill="#b7472a"/>
                    <circle cx="32" cy="22" r="10" fill="none" stroke="#fffdf8" stroke-width="2.5"/>
                    <path d="M12 56 Q12 42 32 40 Q52 42 52 56" fill="none" stroke="#fffdf8" stroke-width="2.5" stroke-linecap="round"/>
                    <line x1="32" y1="40" x2="32" y2="56" stroke="#fffdf8" stroke-width="2.5" stroke-linecap="round"/>
                    <circle cx="50" cy="18" r="7" fill="#b7472a"/>
                    <line x1="47" y1="18" x2="53" y2="18" stroke="#fffdf8" stroke-width="1.5" stroke-linecap="round"/>
                    <line x1="50" y1="15" x2="50" y2="21" stroke="#fffdf8" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </div>
            <h3>Adhérents</h3>
            <p>Gestion complète des adhérents : ajout, modification et suivi.</p>
            <span class="jp-card-link">Accéder</span>
        </a>

        <!-- Abonnements -->
        <a href="../public/index.php?module=abonnement" class="jp-card jp-card-green">
            <div class="jp-card-icon">
                <svg width="64" height="64" viewBox="0 0 64 64">
                    <rect width="64" height="64" rx="4" fill="#1c1c1c"/>
                    <rect x="0" y="0" width="64" height="3" fill="#4a5d4e"/>
                    <rect x="10" y="18" width="44" height="30" rx="3" fill="none" stroke="#fffdf8" stroke-width="2.5"/>
                    <rect x="10" y="27" width="44" height="8" fill="#fffdf8" opacity="0.1"/>
                    <rect x="14" y="21" width="10" height="7" rx="2" fill="#4a5d4e" opacity="0.9"/>
                    <line x1="16" y1="40" x2="34" y2="40" stroke="#fffdf8" stroke-width="2" stroke-linecap="round" opacity="0.8"/>
                    <line x1="16" y1="44" x2="40" y2="44" stroke="#fffdf8" stroke-width="2" stroke-linecap="round" opacity="0.4"/>
                    <circle cx="50" cy="44" r="7" fill="#b7472a"/>
                    <path d="M46 44 L50 40 L54 44 L50 48 Z" fill="#fffdf8"/>
                </svg>
            </div>
            <h3>Abonnements</h3>
            <p>Gestion des abonnements mensuels, trimestriels et annuels.</p>
            <span class="jp-card-link">Accéder</span>
        </a>

        <!-- Séances -->
        <a href="../public/index.php?module=seance" class="jp-card jp-card-gold">
            <div class="jp-card-icon">
                <svg width="64" height="64" viewBox="0 0 64 64">
                    <rect width="64" height="64" rx="4" fill="#1c1c1c"/>
                    <rect x="0" y="0" width="64" height="3" fill="#c9a86a"/>
                    <circle cx="32" cy="34" r="18" fill="none" stroke="#fffdf8" stroke-width="2.5"/>
                    <line x1="32" y1="34" x2="32" y2="20" stroke="#fffdf8" stroke-width="2.5" stroke-linecap="round"/>
                    <line x1="32" y1="34" x2="41" y2="39" stroke="#c9a86a" stroke-width="2.5" stroke-linecap="round"/>
                    <circle cx="32" cy="34" r="2.5" fill="#fffdf8"/>
                    <rect x="28" y="12" width="8" height="5" rx="2" fill="#fffdf8" opacity="0.6"/>
                    <line x1="32" y1="16" x2="32" y2="18" stroke="#fffdf8" stroke-width="2" stroke-linecap="round" opacity="0.4"/>
                    <line x1="50" y1="34" x2="47" y2="34" stroke="#fffdf8" stroke-width="2" stroke-linecap="round" opacity="0.5"/>
                    <line x1="14" y1="34" x2="17" y2="34" stroke="#fffdf8" stroke-width="2" stroke-linecap="round" opacity="0.5"/>
                    <line x1="32" y1="52" x2="32" y2="49" stroke="#fffdf8" stroke-width="2" stroke-linecap="round" opacity="0.5"/>
                    <path d="M32 16 A18 18 0 0 1 50 34" fill="none" stroke="#b7472a" stroke-width="2.5" stroke-linecap="round"/>
                </svg>
            </div>
            <h3>Séances</h3>
            <p>Planification et suivi des séances par adhérent et activité.</p>
            <span class="jp-card-link">Accéder</span>
        </a>

    </div>
</div>

<footer class="jp-footer">FIT·CONNECT &mdash; Système de gestion</footer>

</body>
</html>