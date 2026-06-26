<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Abonnements</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Liste des Abonnements</h2>

  <a href="index.php?module=abonnement&action=create"
   class="btn btn-primary">
    Ajouter Abonnement
</a>


    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Prix</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Statut</th>
                <th>ID Adhérent</th>
                <th>Actions</th>
            </tr>
            
     
</td>
        </thead>

        <tbody>

        <?php while($row = $result->fetch(PDO::FETCH_ASSOC)){ ?>

            <tr>

                <td><?= $row['id_abonnement']; ?></td>
                <td><?= $row['type_abonnement']; ?></td>
                <td><?= $row['prix']; ?></td>
                <td><?= $row['date_debut']; ?></td>
                <td><?= $row['date_fin']; ?></td>
                <td><?= $row['statut']; ?></td>
                <td><?= $row['id_adherent']; ?></td>
                       <td>

    <a href="index.php?module=abonnement&action=edit&id=<?= $row['id_abonnement']; ?>"
       class="btn btn-warning btn-sm">
        Modifier
    </a>

    <a href="index.php?module=abonnement&action=delete&id=<?= $row['id_abonnement']; ?>"
       class="btn btn-danger btn-sm"
       onclick="return confirm('Supprimer cet abonnement ?')">
        Supprimer
    </a>


            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>