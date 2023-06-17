<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include './includes/head.php';
include '../Admin/Includes/root.php';
include "../Admin/manager/gestionproduct.php";
$gestionproduct = new Gestionproduct();
$products = $gestionproduct->selectWithPagination('Id_product',$_POST["idproduct"], 1);
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
$id=$_POST["idproduct"];
$whereproduct="Id_product=$id";
$images=$gestionimage->Select($whereproduct);
$size_products = $gestionassociation->Select($whereproduct, "products_size");
$color_products = $gestionassociation->Select($whereproduct, "products_color");
$idcategory=$products["result"][0]->getCategory();
$wherecategory="id_category= $idcategory";
$categorys=$gestioncategory->Select($wherecategory);
$productscategory=$gestionproduct->selectWithPagination('id_category',$idcategory,3);
?>

<body>

<?php 
include './includes/navbar.php'
?>
 <div class="container py-5">
  <section class="container pt-5">
    <div class="row">
      <div class="col-md-6">
        <div class="container py-2">
          <div class="splide" id="main-slider" aria-label="My Awesome Gallery">
            <div class="splide__track">
              <ul class="splide__list">
                <?php 
                foreach ($images as $image) {?>
                <li class="splide__slide">
                  <img src="../Assets/images/<?= $image->getName() ?>" alt="" class="img-fluid">
                </li>
                <?php
                  # code...
                }
                ?>

              </ul>
            </div>
          </div>
          <ul class="thumbnails mt-3">
          <?php 
                foreach ($images as $image) {?>
            <li class="thumbnail">
              <img src="../Assets/images/<?= $image->getName() ?>" alt="" class="img-fluid">
            </li>
                <?php
                  # code...
                }
                ?>


          </ul>
        </div>      </div>
      <div class="col-md-6">
        <h2><?=$products["result"][0]->getName()?></h2>
        <p><?=$products["result"][0]->getDescription()?></p>
        <p><?=$products["result"][0]->getPrice()?>DH</p>
        <p><?=$categorys[0]->getName()?></p>

        <p>Available Sizes:</p>
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
        <p>Available Colors:</p>
        <div class="d-flex gap-3">
        <?php
                      foreach ($color_products as $color) {
                        $idcolor = $color->getIdassociation();
                        $wherecolor = "Id_color= $idcolor";
                        $colors = $gestioncolor->Select($wherecolor);
                        foreach ($colors as $color) {
                      ?>
                              <div class="color-box" style="background-color:<?= $color->getCode() ?>;"></div>
                      <?php
                        }
                      }
                      ?>

        </div>

      </div>
    </div>
  </section>
  <section class="container py-5">
    <h3>Similar Products</h3>
      <div class="row  gap-2 ">
        <?php
          foreach ($productscategory["result"] as $product) {
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
            if($product->getId() != $products["result"][0]->getId())
            {

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
          <?php }            }

          ?>

      </div>
  </section>
 </div>

 <?php 
include './includes/footer.php'
?>
 


</body>

</html>
