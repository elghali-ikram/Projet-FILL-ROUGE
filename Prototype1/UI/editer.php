<?php

include "../manager/gestioncategory.php";
$gestioncategory = new Gestioncategory();
$id = $_GET['id'];

$category = $gestioncategory->RechercherParId($id);

if(isset($_POST['modifier'])){
    $nom = $_POST['Nom'];
    $gestioncategory->Modifier($id,$nom);
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="UI/style.css">
	<title>Gestion des category</title>
</head>
<body>

<h1>Modification de category : <?=$category->getName() ?></h1>

<form method="post" action="">
<div>
        <label for="Nom">Nom</label>
        <input type="text" required="required" id="Nom" name="Nom"  placeholder="Nom" value="<?php echo $category->getName()?>" >
    </div>

    <div>
    <input name="modifier" type="submit" value="Modifier">
        <a href="index.php">Annuler</a>
    </div>
</form>
</body>
</html>