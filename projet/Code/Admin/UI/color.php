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
    include '../Includes/aside.php';
    ?>
    <div class="content-wrapper">
      <div class="content-header">
        <h1>Color</h1>
      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header back">
                  <h3 class="card-title">Add New Color</h3>
                </div>
                <form method="post" action="../Controller/color.php">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="color" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                      <label for="name">Code color</label>
                  <input type="text" name="codecolor" placeholder="Enter Name" class="form-control my-colorpicker1">
                 </div>
                    <div class="form-group">
                      <input type="submit" value="ADD" name="coloradd" class="btn back">
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header back">
                  <h3 class="card-title">Colors</h3>
                </div>
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Code color</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include "../manager/gestioncolor.php";
                      $gestioncolor = new Gestioncolor();
                      $colors = $gestioncolor->Select(null);
                      foreach ($colors as $color) {
                      ?>
                        <tr>
                          <td></td>
                          <td><?= $color->getName() ?></td>
                          <td><?= $color->getCode() ?></td>
                          <td class="row">
                            <div class="col-md-5">
                              <a href="" class="btn" data-toggle="modal" data-target="#modal-default"><i class="fas fa-edit"></i></a>
                              <div class="modal fade" id="modal-default">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-body">
                                      <div class="card">
                                        <div class="card-header back">
                                          <h3 class="card-title">Edit color</h3>
                                        </div>
                                        <form method="post" action="../Controller/color.php">
                                          <div class="card-body">
                                            <div class="form-group">
                                              <label for="name">Name</label>
                                              <input type="hidden" class="form-control" value="<?= $color->getId() ?>" name="colorid">
                                              <input type="text" class="form-control" value="<?= $color->getName() ?>" name="colorname" placeholder="Enter Name">
                                            </div>
                                            <div class="form-group">
                                              <label for="name">Code color</label>
                                              <input type="text" class="form-control" name="codecolor" value="<?= $color->getCode() ?>" placeholder="Enter Name">
                                            </div>
                                            <div class="form-group">
                                              <input type="submit" value="Edit" name="colorEdit" class="btn back">
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
                              <a href="../Controller/color.php?iddelete=<?= $color->getId() ?>" class="btn"><i class="fas fa-trash"></i></a>
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