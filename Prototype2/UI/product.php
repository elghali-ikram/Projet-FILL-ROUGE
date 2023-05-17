<?php

include "../manager/gestionproduct.php";

$gestionproduct = new Gestionproduct();
if (isset($_GET['id'])) {
  $Id = $_GET['id'];
  $products = $gestionproduct->Select($Id);
}
if (isset($_POST['delete'])) {
  $id = $_POST['id'];
  $gestionproduct->Delete($id);
}
if (isset($_POST['add'])) {
  $product = new Product();
  $product->setName($_POST['Nom']);
  $product->setdescription($_POST['description']);
  $product->setprice($_POST['prix']);
  $product->setId($_GET['id']);
  $gestionproduct->Insert($product);
}
if (isset($_POST['Edit'])) {
  $id = $_POST['idproduct'];
  $nom = $_POST['Nom'];
  $description = $_POST['description'];
  $price = $_POST['prix'];
  $gestionproduct->Modifier($id, $nom, $description, $price);
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
  <div class="text-center d-flex flex-column gap-2 p-5">
    <div>
      <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modaladd">Ajouter un product</a>
      <a class="btn btn-outline-primary" href="../index.php">Categories</a>
    </div>
    <div class="modal fade" id="modaladd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-body">
            <form method="post" action="" class="form d-flex flex-column gap-3 text-center">
              <div class="mb-3">
                <label for="Nom" class="form-label">Nom</label>
                <input type="text" required="required" id="Nom" name="Nom" class="form-control" placeholder="Nom">
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" required="required" id="description" name="description" class="form-control" placeholder="Description">
              </div>
              <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="text" required="required" id="prix" name="prix" class="form-control" placeholder="Prix">
              </div>
              <div class="d-flex flex-column gap-3">
                <input type="submit" class="btn btn-primary " value="Ajouter" name="add">
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    <table class="table table-info ">
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Action</th>
      </tr>

      <?php
      foreach ($products as $product) {

      ?>
      <tbody id="result">
      <tr>
          <td>
            <?= $product->getName() ?>
          </td>
          <td>
            <?= $product->getdescription() ?>
          </td>
          <td>
            <?= $product->getprice() ?>
          </td>
          <td>
            <div class="d-flex gap-2 justify-content-center">
              <button data-bs-toggle="modal" class="btn btn-outline-secondary" data-bs-target="#modalaedit<?php echo $product->getId() ?>">Éditer</button>
              <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $product->getId() ?>">
                <input type="submit" value="Supprime" name="delete" class="btn btn-outline-danger">
              </form>
            </div>
            <div class="modal fade" id="modalaedit<?php echo $product->getId() ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                    <form method="post" action="" class="form d-flex flex-column gap-3">
                      <div class="mb-3">
                        <label for="Nom" class="form-label">Nom</label>
                        <input type="text" required="required" id="Nom" name="Nom" value="<?php echo $product->getName() ?>" class="form-control" placeholder="Nom">
                        <input type="hidden" required="required" name="idproduct" value="<?php echo $product->getId() ?>" class="form-control" placeholder="Nom">
                      </div>
                      <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" required="required" id="description" name="description" value="<?php echo $product->getdescription() ?>" class="form-control" placeholder="Nom">
                      </div>
                      <div class="mb-3">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="text" required="required" id="prix" name="prix" value="<?php echo $product->getprice() ?>" class="form-control" placeholder="Nom">
                      </div>
                      <div class="d-flex flex-column gap-3">
                        <input type="submit" class="btn btn-primary " value="Modifier" name="Edit">
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>
          </td>
        </tr>
      </tbody>

      <?php } ?>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>