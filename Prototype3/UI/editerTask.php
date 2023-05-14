<?php

// include "Gestiontask.php";
include "../manager/gestiontask.php";
$GestionTasks = new GestionTasks();

if (isset($_GET['id'])) {
    $task = $GestionTasks->RechercherParId($_GET['id']);
}
if (isset($_POST['modifier'])) {
    $id = $_POST['Id'];
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];
    $GestionTasks->Modifier($id, $Name, $Description);
    header("Location: ../index.php");

}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier  </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <h1>Modification de tache : <?= $task->getNom() ?></h1>
    <form method="post" action="">
        <input type="hidden" required="required" id="Id" name="Id" value=<?php echo $task->getId() ?>>
        <div>
            <label for="Nom">Name</label>
            <input type="text" required="required" id="Name" name="Name" placeholder="Name" value=<?php echo $task->getNom() ?>>
        </div>
        <div>
            <label for="Prenom">Description</label>
            <input type="text" required="required" id="Description" name="Description" placeholder="Description" value=<?php echo $task->getdescription()?>>
        </div>
        <div>
            <input name="modifier" type="submit" value="Modifier">
            <a href="../index.php">Annuler</a>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>