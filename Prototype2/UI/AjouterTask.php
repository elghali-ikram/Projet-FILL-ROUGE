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
</head>
<body>

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
</body>
</html>