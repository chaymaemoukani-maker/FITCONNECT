<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Séances</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Liste des Séances</h2>

    <a href="index.php?module=seance&action=create"
       class="btn btn-primary mb-3">
        Ajouter une séance
    </a>

    <table class="table table-bordered table-striped">

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

    <td><?= $row['duree']; ?> min</td>

    <td><?= $row['nom']; ?> <?= $row['prenom']; ?></td>

    <td><?= $row['nom_salle']; ?></td>

    <td><?= $row['nom_activite']; ?></td>

    <td><?= !empty($row['nom_equipement']) ? $row['nom_equipement'] : 'Aucun'; ?></td>

    <td>
        <a href="index.php?module=seance&action=edit&id=<?= $row['id_seance']; ?>"
           class="btn btn-warning btn-sm">
            Modifier
        </a>

        <a href="index.php?module=seance&action=delete&id=<?= $row['id_seance']; ?>"
           class="btn btn-danger btn-sm"
           onclick="return confirm('Supprimer cette séance ?')">
            Supprimer
        </a>
    </td>

</tr>
        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>