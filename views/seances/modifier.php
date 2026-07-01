<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une séance</title>
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
            background-image:
                radial-gradient(circle at 90% 10%, rgba(183,71,42,0.05) 0%, transparent 40%),
                repeating-linear-gradient(135deg, rgba(28,28,28,0.015) 0px, rgba(28,28,28,0.015) 1px, transparent 1px, transparent 12px);
            font-family: 'Noto Sans JP', sans-serif;
            color: var(--jp-black);
            min-height: 100vh;
        }

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

        .jp-container { max-width: 620px; margin: 48px auto; padding: 0 24px; }

        .jp-form-card {
            background: var(--jp-white);
            border: var(--jp-border);
            border-top: 4px solid var(--jp-gold);
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

        .jp-section-label {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--jp-gray);
            margin: 24px 0 14px;
            padding-bottom: 6px;
            border-bottom: var(--jp-border);
        }

        .jp-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

        .jp-field { margin-bottom: 18px; }
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
            border-color: var(--jp-gold);
            box-shadow: 0 0 0 3px rgba(201,168,106,0.15);
            background: var(--jp-white);
        }

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
        .jp-btn-save { background: var(--jp-green); color: #fff; }
        .jp-btn-save:hover { background: #3a4d3e; }
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
        <h2>Modifier une séance</h2>

        <form method="POST">

            <div class="jp-section-label">Informations générales</div>

            <div class="jp-row">
                <div class="jp-field">
                    <label>Date séance</label>
                    <input type="date" name="date_seance" value="<?= $data['date_seance']; ?>" required>
                </div>
                <div class="jp-field">
                    <label>Durée (minutes)</label>
                    <input type="number" name="duree" value="<?= $data['duree']; ?>" required>
                </div>
            </div>

            <div class="jp-section-label">Participants & Lieu</div>

            <div class="jp-field">
                <label>Adhérent</label>
                <select name="id_adherent" required>
                    <?php while($adherent = $adherents->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?= $adherent['id_adherent']; ?>"
                            <?= ($adherent['id_adherent'] == $data['id_adherent']) ? 'selected' : ''; ?>>
                            <?= $adherent['nom']; ?> <?= $adherent['prenom']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="jp-field">
                <label>Salle</label>
                <select name="id_salle" required>
                    <?php while($salle = $salles->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?= $salle['id_salle']; ?>"
                            <?= ($salle['id_salle'] == $data['id_salle']) ? 'selected' : ''; ?>>
                            <?= $salle['nom_salle']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="jp-section-label">Activité & Équipement</div>

            <div class="jp-field">
                <label>Activité</label>
                <select name="id_activite" required>
                    <?php while($activite = $activites->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?= $activite['id_activite']; ?>"
                            <?= ($activite['id_activite'] == $data['id_activite']) ? 'selected' : ''; ?>>
                            <?= $activite['nom_activite']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="jp-field">
                <label>Équipement <span style="color:var(--jp-gray);font-size:0.78rem;">(optionnel)</span></label>
                <select name="id_equipement">
                    <option value="">Aucun</option>
                    <?php while($equipement = $equipements->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?= $equipement['id_equipement']; ?>"
                            <?= ($equipement['id_equipement'] == $data['id_equipement']) ? 'selected' : ''; ?>>
                            <?= $equipement['nom_equipement']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="jp-actions">
                <button type="submit" name="modifier" class="jp-btn jp-btn-save">Enregistrer</button>
                <a href="index.php?module=seance" class="jp-btn jp-btn-secondary">Retour</a>
            </div>

        </form>
    </div>
</div>

<footer class="jp-footer">FIT·CONNECT &mdash; Système de gestion</footer>

</body>
</html>