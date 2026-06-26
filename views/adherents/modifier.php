<!DOCTYPE html>
<html>
<head>
    <title>Modifier Adhérent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

<h2>Modifier Adhérent</h2>

<form method="POST">

    <input type="hidden" name="id" value="<?= $data['id_adherent']; ?>">

    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="nom" class="form-control"
               value="<?= $data['nom']; ?>">
    </div>

    <div class="mb-3">
        <label>Prénom</label>
        <input type="text" name="prenom" class="form-control"
               value="<?= $data['prenom']; ?>">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control"
               value="<?= $data['email']; ?>">
    </div>

    <div class="mb-3">
        <label>Téléphone</label>
        <input type="text" name="telephone" class="form-control"
               value="<?= $data['telephone']; ?>">
    </div>

    <div class="mb-3">
        <label>ID Salle</label>
        <input type="number" name="id_salle" class="form-control"
               value="<?= $data['id_salle']; ?>">
    </div>

    <button type="submit" class="btn btn-success">
        Enregistrer
    </button>

</form>

</div>

</body>
</html>