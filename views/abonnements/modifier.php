<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Abonnement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Modifier Abonnement</h2>

    <form method="POST">

        <div class="mb-3">
            <label>Type d'abonnement</label>
            <input type="text"
                   name="type_abonnement"
                   class="form-control"
                   value="<?= $data['type_abonnement']; ?>">
        </div>

        <div class="mb-3">
            <label>Prix</label>
            <input type="number"
                   step="0.01"
                   name="prix"
                   class="form-control"
                   value="<?= $data['prix']; ?>">
        </div>

        <div class="mb-3">
            <label>Date début</label>
            <input type="date"
                   name="date_debut"
                   class="form-control"
                   value="<?= $data['date_debut']; ?>">
        </div>

        <div class="mb-3">
            <label>Date fin</label>
            <input type="date"
                   name="date_fin"
                   class="form-control"
                   value="<?= $data['date_fin']; ?>">
        </div>

        <div class="mb-3">
            <label>Statut</label>
            <input type="text"
                   name="statut"
                   class="form-control"
                   value="<?= $data['statut']; ?>">
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