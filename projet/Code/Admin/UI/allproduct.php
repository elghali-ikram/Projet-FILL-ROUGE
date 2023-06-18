<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (empty($_SESSION["email"])) {
    // User session is not empty, redirect to home.php
    header("Location: page404.php");
    exit();
}
include '../Includes/head.php';
include '../Includes/root.php';
include "../manager/gestionproduct.php";
$gestionproduct = new Gestionproduct();
$result = $gestionproduct->selectWithPagination(null,null, 5);
include "../manager/gestioncategory.php";
$gestioncategory = new Gestioncategory();
include "../manager/gestionsize.php";
$gestionsize = new Gestionsize();
include "../manager/gestioncolor.php";
$gestioncolor = new Gestioncolor();
include "../manager/gestionassociation.php";
$gestionassociation = new Gestionassociation();
include "../manager/gestionimage.php";
$gestionimage = new Gestionimage();
if (isset($_POST['submit'])) {
  if(!empty($_POST["search"]))
  {
    $search=$_POST["search"];
    $result = $gestionproduct->selectWithPagination('nom_product',$search, 5);
  }
} 
?>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php
    include '../Includes/preloader.php';
    include '../Includes/aside.php'
    ?>
    <div class="content-wrapper">
      <div class="content-header">
        <h1>Products</h1>

      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header back">
                  <h3 class="card-title"> All Products</h3>
                  <div class="card-tools">
                  <form action="" method="post">
                     <div class="input-group input-group-sm" style="width: 150px;">
                     <input type="text" name="search" class="form-control float-right" placeholder="Search">
                      <div class="input-group-append">
                        <button type="submit" name="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                      </div>
                     </form>
                  </div>
                </div>
                <div class="card-body table-responsive p-0" style="height: 300px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Categorie</th>
                        <th>Description</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($result['result'] as $product) {
                        $idcategory = $product->getCategory();
                        $wherecategory = "id_category = $idcategory";
                        $categorys = $gestioncategory->Select($wherecategory);
                        $idproduct = $product->getId();
                        $whereassociation = "Id_product = $idproduct";
                        $color_products = $gestionassociation->Select($whereassociation, "products_color");
                        $size_products = $gestionassociation->Select($whereassociation, "products_size");
                        $image_products = $gestionimage->Select($whereassociation);
                        $category = $categorys[0];
                        $categoryName = $category->getName();
                      ?>
                        <tr>
                          <td><?= $product->getName() ?> </td>
                          <td><?= $product->getPrice() ?></td>
                          <td><?= $categoryName ?></td>
                          <td><?= $product->getDescription() ?></td>
                          <td class="row">
                            <div class="col-md-5">
                              <a class="btn" data-toggle="modal" data-target="#modal-Edit<?= $product->getId() ?>"><i class="fas fa-edit"></i></a>
                              <div class="modal fade" id="modal-Edit<?= $product->getId() ?>">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-body">
                                      <div class="card">
                                        <div class="card-header back">
                                          <h3 class="card-title">Edit Product</h3>
                                        </div>
                                        <form method="post" id="myForm<?= $product->getId() ?>" action="../Controller/product.php" enctype="multipart/form-data">
                                          <div class="card-body">
                                          <input type="hidden" name="idproduct" value="<?= $product->getId() ?>">
                                            <div class="form-group">
                                              <label for="images">Gallery of images</label>
                                              <div class="d-flex gap-2 flex-wrap m-3 formvalid">
                                                <div class="d-flex flex-wrap gap-3 imagesupdat" >
                                                  <?php
                                                  foreach ($image_products as $image) {
                                                  ?>
                                                    <div class="image">
                                                      <img src="../../Assets/images/<?= $image->getName() ?>" alt="Snow" style="width:90%;">
                                                      <a class="top-right" onclick="remove(this)"><i class="fas fa-times-circle"></i>
                                                        <input type="hidden" name="imageupdat<?= $image->getProduct() ?>[]" value="<?= $image->getName()  ?>">
                                                      </a>
                                                    </div>

                                                  <?php }?>
                                                  <!-- Image preview will be displayed here -->
                                                </div>
                                                <div class="rectangle_updat">
                                                  <label for="image-input<?= $product->getId() ?>" class="icon">
                                                    <i class="fa fa-plus"></i>
                                                  </label>
                                                  <input id="image-input<?= $product->getId() ?>" name="images<?= $product->getId() ?>[]" type="file" multiple>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="row">
                                              <div class="form-group col-md-6">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="<?= $product->getName() ?>" placeholder="Enter Name" required>
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label for="price">Price</label>
                                                <input type="number" class="form-control" id="price" value="<?= $product->getPrice() ?>" name="price" placeholder="Enter Price" required>
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label for="description">Description</label>
                                              <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description" required><?= $product->getDescription() ?></textarea>
                                            </div>
                                            <div class="form-group row">
                                              <label for="category">Category</label>
                                              <select name="category" id="category" class="custom-select" required>
                                                <option value="">Select Category</option>
                                                <?php
                                                $categorysall = $gestioncategory->Select(null);
                                                foreach ($categorysall as $categorycheck) {
                                                ?>
                                                  <option value="<?= $categorycheck->getId() ?>" <?php if ($categoryName  == $categorycheck->getName()) echo 'selected'; ?>><?= $categorycheck->getName() ?></option>
                                                <?php } ?>
                                              </select>
                                            </div>
                                            <div class="row">
                                              <div class="form-group col-md-6">
                                                <label for="size">Size</label>
                                                <select class="select2bs4" name="size[]" id="size<?= $product->getId() ?>" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" required>
                                                  <?php
                                                  $sizes = $gestionsize->Select(null);
                                                  foreach ($sizes as $size) {
                                                    $isSelected = false;
                                                    foreach ($size_products as $size_product) {
                                                      if ($size_product->getIdassociation() == $size->getId()) {
                                                        $isSelected = true;
                                                        break;
                                                      }
                                                    }
                                                  ?>
                                                    <option value="<?= $size->getId() ?>" <?php if ($isSelected) echo 'selected'; ?>><?= $size->getName() ?></option>
                                                  <?php
                                                  }   ?>
                                                </select>
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label for="color">Color</label>
                                                <select class="select2bs4" name="color[]" id="color<?= $product->getId() ?>" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" required>
                                                  <?php
                                                  $colors = $gestioncolor->Select(null);
                                                  foreach ($colors as $color) {
                                                    $isSelected = false;
                                                    foreach ($color_products as $color_product) {
                                                      if ($color_product->getIdassociation() == $color->getId()) {
                                                        $isSelected = true;
                                                        break;
                                                      }
                                                    }
                                                  ?>
                                                    <option value="<?= $color->getId() ?>" <?php if ($isSelected) echo 'selected'; ?>><?= $color->getName() ?></option>
                                                  <?php
                                                  }   ?>
                                                </select>
                                              </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-4">
                                                <input type="submit" value="Edit Product" name="productedit" class="btn  btn-block">
                                              </div>
                                            </div>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <a href="../Controller/product.php?iddelete=<?= $product->getId() ?>" class="btn"><i class="fas fa-trash"></i></a>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                  <ul class="pagination pagination-sm m-0 float-right">
                    <?php
                    if ($result['currentPage'] > 1) {
                      echo '<li class="page-item"><a class="page-link" href="?page=' . ($result['currentPage'] - 1) . '">&laquo;</a></li>';
                    }
                    for ($i = 1; $i <= $result['totalPages']; $i++) :
                      if ($i == $result['currentPage']) {
                        echo '<li class="page-item active"> <a  class="page-link " href="#">' . $i . '</a> </li>';
                      } else {
                        echo '<li class="page-item"> <a  class="page-link" href="?page=' . $i . '">' . $i . '</a> </li>';
                      }
                    endfor;
                    if ($result['currentPage'] < $result['totalPages']) {
                      echo '<li class="page-item"> <a class="page-link" href="?page=' . ($result['currentPage'] + 1) . '">&raquo;</a> </li>';
                    }
                    ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <?php
    include '../Includes/footer.php'
    ?>

</body>

</html>