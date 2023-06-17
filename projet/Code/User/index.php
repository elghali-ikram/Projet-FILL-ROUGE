<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include './includes/head.php';
include '../Admin/Includes/root.php';
include "../Admin/manager/gestionproduct.php";
$gestionproduct = new Gestionproduct();
$products = $gestionproduct->selectWithPagination(null,null, 3);
include "../Admin/manager/gestioncategory.php";
$gestioncategory = new Gestioncategory();
include "../Admin/manager/gestionsize.php";
$gestionsize = new Gestionsize();
include "../Admin/manager/gestioncolor.php";
$gestioncolor = new Gestioncolor();
include "../Admin/manager/gestionassociation.php";
$gestionassociation = new Gestionassociation();
include "../Admin/manager/gestionimage.php";
$gestionimage = new Gestionimage();
?>

<body>

  <?php
  include './includes/navbar.php'
  ?>
  <div class="header p-5">
    <div class="p-4 text-light">
      <h1 class="text-center top-50" data-aos="fade-right" data-aos-delay="30" data-aos-duration="3000"> Florien Atelier</h1>
      <h2 class="text-center top-50" data-aos="fade-right" data-aos-delay="30" data-aos-duration="3000">Ladies wear <br>Delivery anywhere in Morocco</h2>
    </div>
  </div>
  <div class="row justify-content-center mt-4">
    <div class="d-flex flex-wrap p-3 gap-3 justify-content-center">
      <div class="card col-sm-12 col-md-6 col-lg-4" data-aos="zoom-in-right" data-aos-duration="2000">
        <img src="../Assets/images/women1.png" class="card-img">
        <div class="card-img-overlay p-5 top-50">
          <h5 class="card-title text-light mb-3">Pyjamas Women</h5>
          <a href="articls.php?category=Women" class="btn btn-block btncolor w-50">Show</a>
        </div>
      </div>
      <div class="card col-sm-12 col-md-6 col-lg-4" data-aos="zoom-in-left" data-aos-duration="2000">
        <img src="../Assets/images/men1.png" class="card-img">
        <div class="card-img-overlay p-5 top-50">
          <h5 class="card-title text-light mb-3">Pyjamas Men</h5>
          <a href="articls.php?category=Men" class="btn btn-block btncolor w-50">Show</a>
        </div>
      </div>
    </div>
  </div>


    <div class=" row justify-content-center ">
      <h2 class="text-center p-4">NEW PRODUCT</h2>
      <hr class="opacity-100">
      <div class="container">
        <div class="row justify-content-center justify-content-lg-center gap-2 p-5">
        <?php
          foreach ($products["result"] as $product) {
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
            <div class="col-md-3">
              <div class="card shadow  rounded">
                <img src="../Assets/images/<?= $image_products[0]->getName() ?>" class="card-img-top" style="height: 16rem;" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?= $product->getName() ?></h5>
                  <div class="card-text">
                    <a><?= $categoryName ?></a>
                    <p><?= $product->getPrice() ?>DH</p>
                    <div class="d-flex gap-3">
                      <?php
                      foreach ($size_products as $size) {
                        $idsize = $size->getIdassociation();
                        $wheresize = "Id_size= $idsize";
                        $sizes = $gestionsize->Select($wheresize);
                        foreach ($sizes as $size) {
                      ?>
                          <div class="circle  d-flex justify-content-center align-items-center ">
                            <span class="circle-char"><?= $size->getName() ?></span>
                          </div>
                      <?php
                        }
                      }
                      ?>
                    </div>
                  </div>
                  <form action="product.php" method="post">
                    <input type="hidden" name="idproduct" value="<?= $product->getId() ?>">
                    <input type="submit" value="Show" name="show" class="btn btn-color btn-block btn-flat mt-3 w-50">
                  </form>
                </div>
              </div>
            </div>
          <?php }            
          ?>
        </div>
      </div>
    </div>
    <div class="backimg p-5  row justify-content-center">
      <div class="overlay-text   p-2 text-center  text-white">
        <h1>WONDER DEVELOP</h1>
        <h2>tsdfgjhkjlklfjgvhjb</h2>
        <a href="contactus.php" class="btn  btncolor ">Contact us</a>
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-center justify-content-lg-between  p-3 text-center">
        <div class="col-md-6 col-lg-3">
          <div class="d-flex flex-column gap-2">
            <img src="../Assets/images/quality-free-img 1.png" alt="" width="80px" height="80px" style="margin: 0 auto;">
            <h2>Best Quality</h2>
            <p>It elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="d-flex flex-column gap-2">
            <img src="../Assets/images/tag-free-img 1.png" alt="" width="80px" height="80px" style="margin: 0 auto;">
            <h2>Best Offers</h2>
            <p>It elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="d-flex flex-column gap-2">
            <img src="../Assets/images/lock-free-img 1.png" alt="" width="80px" height="80px" style="margin: 0 auto;">
            <h2>Secure Payments</h2>
            <p>It elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo</p>
          </div>
        </div>
      </div>
    </div>

    <?php
    include './includes/footer.php'
    ?>

</body>

</html>