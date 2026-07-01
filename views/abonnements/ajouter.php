<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Abonnement</title>
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
            --jp-border: 1px solid rgba(28,28,28,0.12);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background-color: var(--jp-bg);
            background-image:
                radial-gradient(circle at 90% 10%, rgba(183,71,42,0.05) 0%, transparent 40%),
                repeating-linear-gradient(135deg, rgba(28,28,28,0.015) 0px, rgba(28,28,28,0.015) 1px, transparent 1px, transparent 12px);
            font-family: 'Noto Sans JP', sans-serif;
            color: var(--jp-black);
            min-height: 100vh;
        }

        /* HEADER */
        .jp-header {
            background: var(--jp-black);
            color: var(--jp-white);
            padding: 18px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 4px solid var(--jp-red);
        }
        .jp-header .logo { font-family: 'Noto Serif JP', serif; font-size: 1.3rem; letter-spacing: 3px; }
        .jp-header .logo span { color: var(--jp-red); }
        .jp-header nav a {
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            margin-left: 24px;
            font-size: 0.88rem;
            transition: color 0.2s;
        }
        .jp-header nav a:hover { color: var(--jp-gold); }

        /* CONTAINER */
        .jp-container {
            max-width: 600px;
            margin: 48px auto;
            padding: 0 24px;
        }

        /* CARD FORM */
        .jp-form-card {
            background: var(--jp-white);
            border: var(--jp-border);
            border-top: 4px solid var(--jp-red);
            box-shadow: 0 4px 20px rgba(28,28,28,0.08);
            padding: 36px 40px;
        }
        .jp-form-card h2 {
            font-family: 'Noto Serif JP', serif;
            font-size: 1.4rem;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 28px;
            padding-bottom: 14px;
            border-bottom: var(--jp-border);
        }

        /* ALERT */
        .jp-alert {
            background: rgba(183,71,42,0.08);
            border-left: 3px solid var(--jp-red);
            color: var(--jp-red-dark);
            padding: 12px 16px;
            font-size: 0.88rem;
            margin-bottom: 20px;
        }

        /* FORM FIELDS */
        .jp-field { margin-bottom: 20px; }
        .jp-field label {
            display: block;
            font-size: 0.82rem;
            color: var(--jp-gray);
            letter-spacing: 0.3px;
            margin-bottom: 7px;
        }
        .jp-field input,
        .jp-field select {
            width: 100%;
            padding: 10px 13px;
            border: var(--jp-border);
            border-radius: 2px;
            background: var(--jp-bg);
            font-family: 'Noto Sans JP', sans-serif;
            font-size: 0.9rem;
            color: var(--jp-black);
            transition: border-color 0.2s, box-shadow 0.2s;
            appearance: none;
        }
        .jp-field input:focus,
        .jp-field select:focus {
            outline: none;
            border-color: var(--jp-red);
            box-shadow: 0 0 0 3px rgba(183,71,42,0.1);
            background: var(--jp-white);
        }

        /* ACTIONS */
        .jp-actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
            padding-top: 20px;
            border-top: var(--jp-border);
        }
        .jp-btn {
            display: inline-block;
            padding: 10px 24px;
            font-family: 'Noto Sans JP', sans-serif;
            font-size: 0.88rem;
            letter-spacing: 0.5px;
            border-radius: 2px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
        }
        .jp-btn-primary { background: var(--jp-red); color: #fff; }
        .jp-btn-primary:hover { background: var(--jp-red-dark); }
        .jp-btn-secondary {
            background: transparent;
            color: var(--jp-black);
            border: 1px solid rgba(28,28,28,0.25);
        }
        .jp-btn-secondary:hover { background: var(--jp-black); color: #fff; }

        .jp-footer {
            text-align: center;
            padding: 20px;
            color: var(--jp-gray);
            font-size: 0.78rem;
            margin-top: 40px;
            border-top: var(--jp-border);
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

<div class="jp-container">
    <div class="jp-form-card">
        <h2>Ajouter un abonnement</h2>

        <?php if(!empty($message)) : ?>
            <div class="jp-alert"><?= $message ?></div>
        <?php endif; ?>

        <form method="POST">

            <div class="jp-field">
                <label>Type d'abonnement</label>
                <select name="type_abonnement" required>
                    <option value="Mensuel">Mensuel</option>
                    <option value="Trimestriel">Trimestriel</option>
                    <option value="Annuel">Annuel</option>
                </select>
            </div>

            <div class="jp-field">
                <label>Prix (MAD)</label>
                <input type="number" step="0.01" name="prix" required>
            </div>

            <div class="jp-field">
                <label>Date début</label>
                <input type="date" name="date_debut" required>
            </div>

            <div class="jp-field">
                <label>Date fin</label>
                <input type="date" name="date_fin" required>
            </div>

            <div class="jp-field">
                <label>Statut</label>
                <select name="statut">
                    <option value="actif">Actif</option>
                    <option value="expire">Expiré</option>
                </select>
            </div>

            <div class="jp-field">
                <label>ID Adhérent</label>
                <input type="number" name="id_adherent" required>
            </div>

            <div class="jp-actions">
                <button type="submit" name="ajouter" class="jp-btn jp-btn-primary">Ajouter</button>
                <a href="index.php?module=abonnement" class="jp-btn jp-btn-secondary">Retour</a>
            </div>

        </form>
    </div>
</div>

<footer class="jp-footer">FIT·CONNECT &mdash; Système de gestion</footer>

</body>
</html>