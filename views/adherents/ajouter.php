<!DOCTYPE html>
<html>
<head>

    <title>Ajouter Adhérent</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
   

<div class="container mt-5">

<h2>Ajouter un adhérent</h2>

<form method="POST">

<div class="mb-3">

<label>Nom</label>

<input
type="text"
name="nom"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Prénom</label>

<input
type="text"
name="prenom"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>


<div class="mb-3">

<label>Téléphone</label>

<input
type="text"
name="telephone"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Date d'inscription</label>

<input
type="date"
name="date_inscription"
class="form-control"
required>

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


<button
type="submit"
name="ajouter"
class="btn btn-success">

Ajouter

</button>

<a href="../../pages/adherents/index.php"
class="btn btn-secondary">

Retour

</a>

</form>

</div>

</body>
</html>