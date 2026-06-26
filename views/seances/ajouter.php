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
            <label>ID Adhérent</label>
            <input type="number" name="id_adherent" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>ID Salle</label>
            <input type="number" name="id_salle" class="form-control" required>
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