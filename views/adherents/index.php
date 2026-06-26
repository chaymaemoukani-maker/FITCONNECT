<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Adhérents</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">Liste des Adhérents</h2>

  <a href="index.php?module=adherent&action=create"
   class="btn btn-primary mb-3">
    Ajouter un adhérent
</a>
<a href="index.php?module=abonnement"
   class="btn btn-success mb-3">
   Gestion des abonnements
</a>


    <table class="table table-bordered table-striped">
        

        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Date d'inscription</th>
                <th>Actions</th>
            </tr>
        </thead>
     

        <tbody>

        <?php while($row = $result->fetch(PDO::FETCH_ASSOC)){ ?>

            <tr>

                <td><?= $row['id_adherent']; ?></td>
                <td><?= $row['nom']; ?></td>
                <td><?= $row['prenom']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['telephone']; ?></td>
                <td><?= $row['date_inscription']; ?></td>

                <td>
                    <a href="index.php?action=edit&id=<?= $row['id_adherent']; ?>"
       class="btn btn-warning btn-sm">
    Modifier
</a>
<a href="index.php?action=delete&id=<?= $row['id_adherent']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Supprimer cet adhérent ?')">
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