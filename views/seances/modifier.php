<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Séance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Modifier Séance</h2>

    <form method="POST">

        <div class="mb-3">
            <label>Date Séance</label>
            <input type="date"
                   name="date_seance"
                   class="form-control"
                   value="<?= $data['date_seance']; ?>">
        </div>

        <div class="mb-3">
            <label>Durée</label>
            <input type="number"
                   name="duree"
                   class="form-control"
                   value="<?= $data['duree']; ?>">
        </div>

        <div class="mb-3">
            <label>ID Salle</label>
            <input type="number"
                   name="id_salle"
                   class="form-control"
                   value="<?= $data['id_salle']; ?>">
        </div>

        <div class="mb-3">
            <label>ID Activité</label>
            <input type="number"
                   name="id_activite"
                   class="form-control"
                   value="<?= $data['id_activite']; ?>">
        </div>

        <div class="mb-3">
            <label>ID Équipement</label>
            <input type="number"
                   name="id_equipement"
                   class="form-control"
                   value="<?= $data['id_equipement']; ?>">
        </div>

        <button type="submit"
                name="modifier"
                class="btn btn-success">
            Enregistrer
        </button>

    </form>

</div>

</body>
</html>