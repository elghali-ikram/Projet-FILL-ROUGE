<?php
    include "./manager/gestionprojet.php";
    $gestionprojet = new Gestionprojet();
    $projects = $gestionprojet->Select();
    if(isset($_POST['id'])){
      $id = $_POST['id'] ;
      $gestionprojet->Delete($id);
      header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  <div class="text-center d-flex flex-column gap-2 p-5">
  <h1>GESTION DES Projets</h1>
    <div class=""> 
            <a href="UI/add.php" class="btn btn-outline-primary">Ajouter projet</a>
    </div>
    <table class="table table-info w-75">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
              foreach($projects as $projet){
            ?>
            <tr>
                <td>
                  <?= $projet->getNom()?>
                </td>
                <td><?= $projet->getdescription() ?></td>
                <td>
                  <div class="d-flex gap-2 justify-content-center">
                  <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $projet->getId() ?>">
                    <button type="submit" class="btn btn-outline-danger">Supprime</button>
                  </form>
                    <a href="UI/editer.php?id=<?php echo $projet->getId() ?>" class="btn btn-outline-secondary">Éditer</a>
                    <a href="UI/task.php?id=<?php echo $projet->getId()?>" class="btn btn-outline-success">Ajouter tache</a>
                  </div>

                </td>
            </tr>
            <?php }?>

        </tbody>
      </table>
  </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>