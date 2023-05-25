<?php


include "./manager/gestioncategory.php";

$gestioncategory = new Gestioncategory();
$categorys = $gestioncategory->Select();
if (isset($_POST['delete'])) {
  $id = $_POST['id'];
  $gestioncategory->Deleteproduct($id);
  $gestioncategory->Delete($id);

  header('Location: index.php');
}
if (!empty($_POST['add'])) {
  $category = new Category();
  $category->setName($_POST['Nom']);
  $gestioncategory->Insert($category);
  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}
if (!empty($_POST['Edit'])) {
  $id = $_POST['id'];
  $nom = $_POST['Nom'];
  $gestioncategory->Modifier($id, $nom);
      header("Location: ".$_SERVER['PHP_SELF']);
  exit();
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
    <h1>GESTION</h1>
    <div class="">
      <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modaladd">Ajouter category</button>
      <!-- Modal add -->
      <div class="modal fade" id="modaladd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-body">
              <form method="post" action="" class="form d-flex flex-column gap-3">
                <div class="mb-3">
                  <label for="Nom" class="form-label">Nom</label>
                  <input type="text" required="required" id="Nom" name="Nom" class="form-control" placeholder="Nom">
                </div>
                <div class="d-flex flex-column gap-3">
                  <input type="submit" class="btn btn-primary " value="Ajouter" name="add">
                  <a href="index.php">Annuler</a>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
    <table class="table table-info">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($categorys as $category) {
        ?>
          <tr>
            <td>
              <?= $category->getName() ?>
            </td>
            
            <td>
              <div class="d-flex gap-2 justify-content-center">
                <form action="" method="post">
                  <input type="hidden" name="id" value="<?php echo $category->getId() ?>">
                  <input type="submit" value="Supprimer" name="delete" class="btn btn-outline-danger">
                </form>
                <a href="UI/editer.php?id=<?php echo $category->getId() ?>" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalaedit<?php echo $category->getId() ?>">Éditer</a>
                <a href="UI/product.php?id=<?php echo $category->getId() ?>" class="btn btn-outline-success">Ajouter product</a>
              </div>

            </td>
          </tr>
          <div class="modal fade" id="modalaedit<?php echo $category->getId() ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <form method="post" action="" class="form d-flex flex-column gap-3">
                    <div class="mb-3">
                      <label for="Nom" class="form-label">Nom</label>
                      <input type="text" required="required" id="Nom" name="Nom" value="<?php echo $category->getName() ?>" class="form-control" placeholder="Nom">
                      <input type="hidden" required="required" name="id" value="<?php echo $category->getId() ?>" class="form-control" placeholder="Nom">
                    </div>
                    <div class="d-flex flex-column gap-3">
                      <input type="submit" class="btn btn-primary " value="Modifier" name="Edit">
                      <a href="index.php">Annuler</a>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
        <?php } ?>

      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>