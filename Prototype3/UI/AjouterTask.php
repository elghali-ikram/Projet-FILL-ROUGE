<?php
include "../manager/gestiontask.php";

$gestiontask = new GestionTasks();
if(!empty($_POST)){
	$task = new Task();
    $task->setId($_GET['id']);
	$task->setNom($_POST['Nom']);
	$task->setdescription($_POST['description']);
	$gestiontask->Insert($task);
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
	<title>Gestion des employés</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div>
<h1>Ajouter une tache</h1>

<form method="post" action="">
	<div>
		<label for="Nom">Nom</label>
		<input type="text" required="required" id="Nom" name="Nom" 
		placeholder="Nom">
	</div>
	<div>
		<label for="Prenom">Description</label>
		<input type="text" required="required" id="description" name="description" 
		placeholder="description">
	</div>
	<div>
		<button type="submit">Ajouter</button>
		<a href="../index.php">Annuler</a>
	</div>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>