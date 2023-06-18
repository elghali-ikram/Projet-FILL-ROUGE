<?php
session_start();
if (empty($_SESSION["email"])) {
    // User session is not empty, redirect to home.php
    header("Location: page404.php");
    exit();
}
include '../Includes/head.php';
include '../Includes/root.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php
    include '../Includes/preloader.php';
    include '../Includes/aside.php'
    ?>
    <div class="content-wrapper">
      <div class="content-header">
        <h1>Categories</h1>
      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header back">
                  <h3 class="card-title">Add Categorie</h3>
                </div>
                <form method="post" action="../Controller/categorie.php">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="category" name="category" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                      <input type="submit" value="ADD" name="categoryadd" class="btn back">
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header back">
                  <h3 class="card-title">Categories</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include "../manager/gestioncategory.php";
                      $gestioncategory = new Gestioncategory();
                      $categorys = $gestioncategory->Select(null);
                      foreach ($categorys as $category) {
                      ?>
                        <tr>
                          <td></td>
                          <td><?= $category->getName() ?></td>
                          <td class="row">
                            <div class="col-md-3">
                              <a href="" class="btn" data-toggle="modal" data-target="#modal-default"><i class="fas fa-edit"></i></a>
                              <div class="modal fade" id="modal-default">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-body">
                                    <div class="card">
                <div class="card-header back">
                  <h3 class="card-title">Edit Categorie</h3>
                </div>
                <form method="post" action="../Controller/categorie.php">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="hidden" class="form-control" value="<?= $category->getId() ?>" name="categoryid" >
                      <input type="text" class="form-control"  value="<?= $category->getName() ?>" name="categoryname" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Edit" name="categoryEdit" class="btn back">
                    </div>
                  </div>
                </form>
              </div>
            </div>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                            </div>
                            <div class="col-md-3">
                              <a href="../Controller/categorie.php?iddelete=<?= $category->getId() ?>" class="btn"><i class="fas fa-trash"></i></a>
                            </div>
                          </td>

                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
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