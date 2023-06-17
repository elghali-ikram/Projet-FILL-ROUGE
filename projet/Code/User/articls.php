<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include './includes/head.php';
include '../Admin/Includes/root.php';
include "../Admin/manager/gestionproduct.php";
$gestionproduct = new Gestionproduct();
$products = $gestionproduct->selectWithPagination(null,null, 6);
include "../Admin/manager/gestioncategory.php";
$gestioncategory = new Gestioncategory();
$categorys = $gestioncategory->Select(null);
include "../Admin/manager/gestionsize.php";
$gestionsize = new Gestionsize();
include "../Admin/manager/gestioncolor.php";
$gestioncolor = new Gestioncolor();
include "../Admin/manager/gestionassociation.php";
$gestionassociation = new Gestionassociation();
include "../Admin/manager/gestionimage.php";
$gestionimage = new Gestionimage();
if (isset($_POST['submit'])) {
  if(!empty($_POST["search"]))
  {
    $search=$_POST["search"];
    $products = $gestionproduct->selectWithPagination('nom_product',$search, 6);
  }

} 
if(isset($_GET["category"])) 
{
  $products = $gestionproduct->selectWithPagination('id_category',$_GET["category"], 6);

}

?>
<body>
  <?php
  include './includes/navbar.php'
  ?>
  <div class="d-flex flex-lg-row flex-md-row flex-column gap-2">
    <div class="sidebar  w-auto  p-4 bg-light">
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="search" placeholder="Search..." aria-label="Search" aria-describedby="search-btn">
          <button class="btn btncolor" name="submit" type="submit" id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
      </form>
      <div class="d-flex flex-column p-4 gap-3">
        <h2>Categories</h2>
        <?php
        foreach ($categorys as $category) {
        ?>
          <p><a href="articls.php?category=<?= $category->getId() ?>" class="category"><?= $category->getName() ?></a></p>
        <?php  } ?>
      </div>
    </div>
    <div class="container cards d-flex flex-column gap-5 justify-content-center p-5">
      <h1>Articles</h1>
      <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
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
            <div class="col">
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
      <div>
        <ul class="pagination pagination-sm m-0 ">
          <?php
          if ($products['currentPage'] > 1) {
            echo '<li class="page-item"><a class="page-link backcolor" href="?page=' . ($products['currentPage'] - 1) . '">&laquo;</a></li>';
          }
          for ($i = 1; $i <= $products['totalPages']; $i++) :
            if ($i == $products['currentPage']) {
              echo '<li class="page-item active"> <a  class="page-link backcolor" href="#">' . $i . '</a> </li>';
            } else {
              echo '<li class="page-item "> <a  class="page-link backcolor" href="?page=' . $i . '">' . $i . '</a> </li>';
            }
          endfor;
          if ($products['currentPage'] < $products['totalPages']) {
            echo '<li class="page-item "> <a class="page-link backcolor" href="?page=' . ($products['currentPage'] + 1) . '">&raquo;</a> </li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
  <?php
  include './includes/footer.php'
  ?>
</body>

</html>