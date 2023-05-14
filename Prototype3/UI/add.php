
<?php
include "../manager/gestionprojet.php";
$gestionprojet = new Gestionprojet();

if(!empty($_POST)){
	$projet = new Projet();
	$projet->setNom($_POST['Nom']);
	$projet->setdescription($_POST['description']);
	$gestionprojet->Insert($projet);
	// Redirection vers la page index.php
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
	<title>Gestion des employés</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="container p-4">
<h1>Ajouter un projet</h1>
<form method="post" action="" class="form d-flex flex-column gap-3">
	<div class="mb-3">
		<label for="Nom" class="form-label">Nom</label>
		<input type="text" required="required" id="Nom" name="Nom"  class="form-control w-50"
		placeholder="Nom">
	</div>
	<div class="mb-3">
		<label for="Prenom" class="form-label">Description</label>
		<input type="text" required="required" id="description" name="description" class="form-control w-50"
		placeholder="description">
	</div>
	<div class="d-flex flex-column w-25 gap-3">
		<button type="submit" class="btn btn-primary w-25">Ajouter</button>
		<a href="index.php">Annuler</a>
	</div>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>