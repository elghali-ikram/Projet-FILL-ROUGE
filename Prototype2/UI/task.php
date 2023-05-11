<?php

include "../manager/gestiontask.php";

$GestionTasks = new GestionTasks();
if (isset($_GET['id'])) {
    $Id = $_GET['id'];
    $tasks = $GestionTasks->Select($Id);
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
    <link rel="stylesheet" href="style.css">
    <title>Gestion des tashes</title>
</head>

<body>
    <div>

        <a href="AjouterTask.php?id=<?php echo $Id ?>">Ajouter un tache</a>
        <a href="../index.php">Projects</a>
        <table>
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
                        <a href="editerTask.php?id=<?php echo $task->getId() ?>">Éditer</a>
                        <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $task->getId() ?>">
                    <button type="submit">Supprime</button>
                  </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>