<?php

include "../manager/gestionprojet.php";
$gestionprojet = new Gestionprojet();
$id = $_GET['id'];

$projet = $gestionprojet->RechercherParId($id);

if(isset($_POST['modifier'])){
    $nom = $_POST['Nom'];
    $description = $_POST['description'];
    $gestionprojet->Modifier($id,$nom,$description);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="UI/style.css">
	<title>Gestion des projet</title>
</head>
<body>

<h1>Modification de projet : <?=$projet->getNom() ?></h1>

<form method="post" action="">
<div>
        <label for="Nom">Nom</label>
        <input type="text" required="required" id="Nom" name="Nom"  placeholder="Nom" value="<?php echo $projet->getNom()?>" >
    </div>
    <div>
        <label for="description">Prénom</label>
        <input type="text" required="required" id="description" name="description" placeholder="description" value="<?php echo $projet->getdescription()?>">
    </div>
    <div>
    <input name="modifier" type="submit" value="Modifier">
        <a href="index.php">Annuler</a>
    </div>
</form>
</body>
</html>