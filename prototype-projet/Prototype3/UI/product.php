<?php

include "../manager/gestionproduct.php";
$currentURL = $_SERVER['REQUEST_URI'];

$gestionproduct = new Gestionproduct();
include "../manager/gestioncategory.php";

$gestioncategory = new Gestioncategory();
$categorys = $gestioncategory->Select();
$Id = $_GET['id'];
$products = $gestionproduct->selectWithPagination(1, $Id);


if (isset($_POST['search'])) {
  $Id = $_GET['id'];
  $name = $_POST['searchinput'];
  $products = $gestionproduct->search($name, $Id);
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
  <!-- <link rel="stylesheet" href="style.css"> -->
  <title>Gestion des taches</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <div class="text-center d-flex flex-column gap-2 p-5">
    <h1>Gestion des Taches</h1>
    <div class="d-flex gap-3 flex-column">
      <div>
        <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modaladd">Ajouter un product</a>
        <a class="btn btn-outline-primary" href="../index.php">Categories</a>
      </div>
      <div class=" d-flex justify-content-between">
        <form class="w-25" action="" method="post">
          <div class="input-group input-group-lg">
            <input type="text" class="form-control" id="search" name="searchinput" placeholder="Search by Task name">
            <input type="submit" value="Search" name="search" class="btn btn-outline-primary" />
          </div>
        </form>
        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    CHOISIR UN CATEGORY
  </button>
  <ul class="dropdown-menu">
  <?php
        foreach ($categorys as $category) {
        ?>
    <li><a class="dropdown-item" href="product.php?id=<?php echo $category->getId() ?>"><?= $category->getName() ?>
</a></li>

    <?php } ?>

  </ul>
</div>

      </div>
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
      <tbody id="result">

        <?php
        foreach ($products['result'] as $product) {
        ?>

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
        <?php } ?>
      </tbody>

    </table>
        <!-- PAGINATION -->
        <div>
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <?php
              if ($products['currentpage'] > 1) {
                // Get the current URL
                $currentPageURL = $_SERVER['REQUEST_URI'];
                // Remove the existing "page" parameter from the URL, if it exists
                $currentPageURL = preg_replace('/([&\?]page=\d+)/', '', $currentPageURL);
                // Add the "page" parameter to the URL
                $prevPageURL = $currentPageURL . (strpos($currentPageURL, '?') !== false ? '&' : '?') . 'page=' . ($products['currentpage'] - 1);
                echo '<li class="page-item"> <a class="page-link text-black" href="' . $prevPageURL . '"><i class="fa-solid fa-chevron-left"></i></a> </li>';
              }

              for ($i = 1; $i <= $products['totalPages']; $i++) {
                if ($i == $products['currentpage']) {
                  echo '<li class="page-item active"> <a class="page-link bg-black" href="#">' . $i . '</a> </li>';
                } else {
                  // Get the current URL
                  $currentPageURL = $_SERVER['REQUEST_URI'];
                  // Remove the existing "page" parameter from the URL, if it exists
                  $currentPageURL = preg_replace('/([&\?]page=\d+)/', '', $currentPageURL);
                  // Add the "page" parameter to the URL
                  $pageURL = $currentPageURL . (strpos($currentPageURL, '?') !== false ? '&' : '?') . 'page=' . $i;
                  echo '<li class="page-item"> <a class="page-link text-black" href="' . $pageURL . '">' . $i . '</a> </li>';
                }
              }

              if ($products['currentpage'] < $products['totalPages']) {
                // Get the current URL
                $currentPageURL = $_SERVER['REQUEST_URI'];
                // Remove the existing "page" parameter from the URL, if it exists
                $currentPageURL = preg_replace('/([&\?]page=\d+)/', '', $currentPageURL);
                // Add the "page" parameter to the URL
                $nextPageURL = $currentPageURL . (strpos($currentPageURL, '?') !== false ? '&' : '?') . 'page=' . ($products['currentpage'] + 1);
                echo '<li class="page-item"> <a class="page-link text-black" href="' . $nextPageURL . '"><i class="fa-solid fa-chevron-right"></i></a> </li>';
              }
              ?>
            </ul>


          </nav>
        </div>
  </div>
  <script src="https://kit.fontawesome.com/0f55910cdd.js" crossorigin="anonymous" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>