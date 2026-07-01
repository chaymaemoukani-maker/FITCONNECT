<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Séances</title>
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

        .jp-container { max-width: 1200px; margin: 40px auto; padding: 0 24px; }

        .jp-page-title {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 28px;
            padding-bottom: 16px;
            border-bottom: var(--jp-border);
        }
        .jp-page-title h2 {
            font-family: 'Noto Serif JP', serif;
            font-size: 1.6rem;
            font-weight: 600;
            letter-spacing: 1px;
            position: relative;
            padding-left: 16px;
        }
        .jp-page-title h2::before {
            content: "";
            position: absolute;
            left: 0; top: 0; bottom: 0;
            width: 4px;
            background: var(--jp-red);
            border-radius: 2px;
        }

        .jp-btn {
            display: inline-block;
            padding: 9px 20px;
            font-family: 'Noto Sans JP', sans-serif;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            border-radius: 2px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
        }
        .jp-btn-primary { background: var(--jp-red); color: #fff; }
        .jp-btn-primary:hover { background: var(--jp-red-dark); }
        .jp-btn-edit {
            background: transparent;
            color: var(--jp-black);
            border: 1px solid var(--jp-black);
            padding: 5px 14px;
            font-size: 0.8rem;
        }
        .jp-btn-edit:hover { background: var(--jp-black); color: #fff; }
        .jp-btn-delete {
            background: transparent;
            color: var(--jp-red);
            border: 1px solid var(--jp-red);
            padding: 5px 14px;
            font-size: 0.8rem;
        }
        .jp-btn-delete:hover { background: var(--jp-red); color: #fff; }

        .jp-table-wrap {
            background: var(--jp-white);
            border: var(--jp-border);
            box-shadow: 0 2px 12px rgba(28,28,28,0.07);
            overflow-x: auto;
        }
        .jp-table { width: 100%; border-collapse: collapse; min-width: 900px; }
        .jp-table thead tr { background: var(--jp-black); color: var(--jp-white); }
        .jp-table th {
            padding: 13px 16px;
            font-family: 'Noto Serif JP', serif;
            font-weight: 500;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            text-align: left;
            white-space: nowrap;
        }
        .jp-table td {
            padding: 12px 16px;
            font-size: 0.88rem;
            border-bottom: 1px solid rgba(28,28,28,0.07);
            white-space: nowrap;
        }
        .jp-table tbody tr:hover td { background: rgba(183,71,42,0.04); }
        .jp-table tbody tr:last-child td { border-bottom: none; }

        /* badge durée */
        .jp-duree {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: rgba(28,28,28,0.06);
            padding: 3px 10px;
            border-radius: 10px;
            font-size: 0.82rem;
            color: var(--jp-gray);
        }

        /* badge équipement vide */
        .jp-none {
            color: var(--jp-gray);
            font-size: 0.8rem;
            font-style: italic;
        }

        /* tag activité */
        .jp-tag {
            display: inline-block;
            background: rgba(183,71,42,0.09);
            color: var(--jp-red-dark);
            padding: 3px 10px;
            border-radius: 2px;
            font-size: 0.8rem;
        }

        .jp-footer {
            text-align: center;
            padding: 20px;
            color: var(--jp-gray);
            font-size: 0.78rem;
            margin-top: 50px;
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

    <div class="jp-page-title">
        <h2>Liste des Séances</h2>
        <a href="index.php?module=seance&action=create" class="jp-btn jp-btn-primary">+ Ajouter une séance</a>
    </div>

    <div class="jp-table-wrap">
        <table class="jp-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Durée</th>
                    <th>Adhérent</th>
                    <th>Salle</th>
                    <th>Activité</th>
                    <th>Équipement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?= $row['id_seance']; ?></td>
                    <td><?= $row['date_seance']; ?></td>
                    <td><span class="jp-duree"><?= $row['duree']; ?> min</span></td>
                    <td><?= $row['nom']; ?> <?= $row['prenom']; ?></td>
                    <td><?= $row['nom_salle']; ?></td>
                    <td><span class="jp-tag"><?= $row['nom_activite']; ?></span></td>
                    <td>
                        <?php if(!empty($row['nom_equipement'])): ?>
                            <?= $row['nom_equipement']; ?>
                        <?php else: ?>
                            <span class="jp-none">Aucun</span>
                        <?php endif; ?>
                    </td>
                    <td style="display:flex;gap:6px;align-items:center;">
                        <a href="index.php?module=seance&action=edit&id=<?= $row['id_seance']; ?>" class="jp-btn jp-btn-edit">Modifier</a>
                        <a href="index.php?module=seance&action=delete&id=<?= $row['id_seance']; ?>"
                           class="jp-btn jp-btn-delete"
                           onclick="return confirm('Supprimer cette séance ?')">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<footer class="jp-footer">FIT·CONNECT &mdash; Système de gestion</footer>

</body>
</html>