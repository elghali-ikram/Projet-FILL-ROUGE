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
	<title>Gestion des projet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="container p-4">
<h1>Modification de projet : <?=$projet->getNom() ?></h1>
<form method="post" action="" class="form d-flex flex-column gap-3">
<div class="mb-3">
        <label for="Nom" class="form-label">Nom</label>
        <input type="text" required="required" id="Nom" class="form-control w-50"  name="Nom"  placeholder="Nom" value="<?php echo $projet->getNom()?>" >
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Prénom</label>
        <input type="text" required="required" class="form-control w-50" id="description" name="description" placeholder="description" value="<?php echo $projet->getdescription()?>">
    </div>
    <div class="d-flex flex-column w-25 gap-3">
    <input name="modifier" type="submit" class="btn btn-primary w-25" value="Modifier">
        <a href="index.php">Annuler</a>
    </div>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>