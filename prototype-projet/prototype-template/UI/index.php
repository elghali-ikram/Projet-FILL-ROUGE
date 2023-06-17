<?php
include '../includes/head.php';
include '../includes/sidebar.php';

include "../manager/gestioncategory.php";

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
}
if (!empty($_POST['Edit'])) {
  $id = $_POST['id'];
  $nom = $_POST['Nom'];
  $gestioncategory->Modifier($id, $nom);
  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Ajouter un category
              </button>
              <div class="modal fade" id="modal-default">
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
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
              <div class="card-tools" data-aos="zoom-in-right" data-aos-duration="2000">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" >
              <table class="table table-hover text-nowrap">
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
                        <div class="row justify-content-center">
                          <div class="col-md-2">
                          <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $category->getId() ?>">
                            <input type="submit" value="Supprimer" name="delete" class="btn btn-outline-danger">
                          </form>
                          </div>
                          <div class="col-md-2">
                          <button  class="btn btn-outline-secondary"  data-toggle="modal" data-target="#modalaedit<?php echo $category->getId() ?>">Éditer</button>
                          </div>
                          <div class="col-md-2">
                          <a href="product.php?id=<?php echo $category->getId() ?>" class="btn btn-outline-success">Ajouter product</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <div class="modal fade" id="modalaedit<?php echo $category->getId() ?>" >
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
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'includes/footer.php'
?>