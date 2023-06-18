<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../Includes/head.php';
include '../Includes/root.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php
    // include '../Includes/preloader.php';
    include '../Includes/aside.php'
    ?>
    <div class="content-wrapper">
      <div class="content-header">
        <h1>New Product</h1>
      </div>
      <section class="content">
        <div class="container-fluid ">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card " style="width: 50rem;">
                <div class="card-header back">
                  <h3 class="card-title">Add Product</h3>
                </div>
                <form method="post" id="myForm" action="../Controller/product.php" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="images">Gallery of images</label>
                      <div class="d-flex gap-2 flex-wrap m-3 formvalid">
                        <div class="d-flex flex-wrap gap-3" id="images">
                          <!-- Image preview will be displayed here -->
                        </div>
                        <div class="rectangle">
                          <label for="image-input" class="icon">
                            <i class="fa fa-plus"></i>
                          </label>
                          <input id="image-input" name="images[]" type="file" multiple>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="category">Category</label>
                      <select name="category" id="category" class="custom-select form-control-border">
                        <option value="">Select Category</option>
                        <?php
                      include "../manager/gestioncategory.php";
                      $gestioncategory = new Gestioncategory();
                      $categorys = $gestioncategory->Select(null);
                      foreach ($categorys as $category) {
                      ?>
                        <option value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="size">Size</label>
                        <select class="select2bs4" name="size[]" id="size" multiple="multiple" data-placeholder="Select a State"
                          style="width: 100%;">
                          <option value="">Select Size</option>
                          <?php
                      include "../manager/gestionsize.php";
                      $gestionsize = new Gestionsize();
                      $sizes = $gestionsize->Select(null);
                      foreach ($sizes as $size) { ?>
                            <option value="<?= $size->getId() ?>"><?= $size->getName() ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="color">Color</label>
                        <select class="select2bs4" name="color[]" id="color" multiple="multiple" data-placeholder="Select a State"
                          style="width: 100%;">
                          <option value="">Select Color</option>
                          <?php
                          include "../manager/gestioncolor.php";
                          $gestioncolor = new Gestioncolor();
                          $colors = $gestioncolor->Select(null);
                          foreach ($colors as $color) {
                          ?>
                            <option value="<?= $color->getId() ?>"><?= $color->getName() ?></option>
                          <?php } ?>
                        </select>
                      </div>


                    </div>
                    <div class="row">
                      <div class="col-4">
                        <input type="submit" value="Add Product" name="productadd" class="btn  btn-block">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
 
<footer class="main-footer">
  <strong>Copyright &copy; 2023 Florian Atelier.</strong>All rights reserved.
</footer>
    <?php
    include '../Includes/footer.php'
    ?>
</body>

</html>