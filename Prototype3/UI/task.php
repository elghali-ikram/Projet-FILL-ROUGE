<?php

include "../manager/gestiontask.php";

$GestionTasks = new GestionTasks();
$Id = $_GET['id'];
$tasks = $GestionTasks->Select($Id);
if(isset($_POST['search']))
{
    $name = $_POST['search'];
    $tasks = $GestionTasks->search($name,$Id);
}

if(isset($_POST['id'])){
    $id = $_POST['id'] ;
    $GestionTasks->Delete($id);
	header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Gestion des taches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

<div class="text-center d-flex flex-column gap-2 p-5">
    <h1>Gestion des Taches</h1>
    <div>
    <form class="col" action="" method="post">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Search by Task name" >
                    <input type="submit" value="Search" />
                </div>
    </form>
    </div>
<div class="d-flex gap-3">
<a href="AjouterTask.php?id=<?php echo $Id ?>" class="btn btn-outline-primary">Ajouter un tache</a>
        <a href="../index.php" class="btn btn-outline-primary">Projects</a>
</div>

<table class="table table-info ">
                <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($tasks as $task) {
                ?>
                <tr>
                    <td>
                        <?= $task->getNom() ?>
                    </td>
                    <td>
                        <?= $task->getdescription() ?>
                    </td>
                    <td>
                    <div class="d-flex gap-2 justify-content-center">
                        <a href="editerTask.php?id=<?php echo $task->getId() ?>" class="btn btn-outline-secondary">Éditer</a>
                        <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $task->getId() ?>">
                    <button type="submit" class="btn btn-outline-danger">Supprime</button>
                  </form>
                  </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>