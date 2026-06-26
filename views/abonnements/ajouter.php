<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Abonnement</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Ajouter un abonnement</h2>

    <?php if(!empty($message)) : ?>
        <div class="alert alert-danger">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <div class="mb-3">
            <label>Type d'abonnement</label>
            <select name="type_abonnement" class="form-control" required>
                <option value="Mensuel">Mensuel</option>
                <option value="Trimestriel">Trimestriel</option>
                <option value="Annuel">Annuel</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Prix</label>
            <input type="number" step="0.01" name="prix" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date début</label>
            <input type="date" name="date_debut" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date fin</label>
            <input type="date" name="date_fin" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Statut</label>
            <select name="statut" class="form-control">
                <option value="actif">Actif</option>
                <option value="expire">Expiré</option>
            </select>
        </div>

        <div class="mb-3">
            <label>ID Adhérent</label>
            <input type="number" name="id_adherent" class="form-control" required>
        </div>

        <button type="submit" name="ajouter" class="btn btn-success">
            Ajouter
        </button>

        <a href="index.php" class="btn btn-secondary">
            Retour
        </a>

    </form>

</div>

</body>
</html>