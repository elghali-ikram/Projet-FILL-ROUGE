
<?php
include "../manager/gestioncategory.php";
$gestioncategory = new  Gestioncategory ();

if(!empty($_POST)){
	$category = new Category();
	$category->setName($_POST['Nom']);
	$gestioncategory->Insert($category);
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
</head>
<body>

<h1>Ajouter un employé</h1>

<form method="post" action="">
	<div>
		<label for="Nom">Nom</label>
		<input type="text" required="required" id="Nom" name="Nom" 
		placeholder="Nom">
	</div>
	<div>
		<button type="submit">Ajouter</button>
		<a href="index.php">Annuler</a>
	</div>
</form>
</body>
</html>