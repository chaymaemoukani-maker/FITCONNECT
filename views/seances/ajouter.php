<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une séance</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Ajouter une séance</h2>

    <?php if(!empty($message)) : ?>
        <div class="alert alert-danger">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <div class="mb-3">
            <label>Date séance</label>
            <input type="date" name="date_seance" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Durée (minutes)</label>
            <input type="number" name="duree" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Adhérent</label>
            <select name="id_adherent" class="form-control" required>

                <?php while($adherent = $adherents->fetch(PDO::FETCH_ASSOC)) { ?>

                    <option value="<?= $adherent['id_adherent']; ?>">
                        <?= $adherent['nom']; ?> <?= $adherent['prenom']; ?>
                    </option>

                <?php } ?>

            </select>
        </div>

        <div class="mb-3">
            <label>Salle</label>
            <select name="id_salle" class="form-control" required>

                <?php while($salle = $salles->fetch(PDO::FETCH_ASSOC)) { ?>

                    <option value="<?= $salle['id_salle']; ?>">
                        <?= $salle['nom_salle']; ?>
                    </option>

                <?php } ?>

            </select>
        </div>

        <div class="mb-3">
            <label>Activité</label>
            <select name="id_activite" class="form-control" required>

                <?php while($activite = $activites->fetch(PDO::FETCH_ASSOC)) { ?>

                    <option value="<?= $activite['id_activite']; ?>">
                        <?= $activite['nom_activite']; ?>
                    </option>

                <?php } ?>

            </select>
        </div>

        <div class="mb-3">
            <label>Équipement</label>
            <select name="id_equipement" class="form-control">

                <option value="">Aucun</option>

                <?php while($equipement = $equipements->fetch(PDO::FETCH_ASSOC)) { ?>

                    <option value="<?= $equipement['id_equipement']; ?>">
                        <?= $equipement['nom_equipement']; ?>
                    </option>

                <?php } ?>

            </select>
        </div>

        <button type="submit" name="ajouter" class="btn btn-success">
            Ajouter
        </button>

        <a href="index.php?module=seance" class="btn btn-secondary">
            Retour
        </a>

    </form>

</div>

</body>
</html>