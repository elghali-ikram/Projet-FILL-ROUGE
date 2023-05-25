<?php
include '../includes/head.php';
include '../includes/sidebar.php';
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
                Ajouter un produit
              </button>
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="Nom">Nom</label>
                            <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom">
                          </div>
                          <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Nom">
                          </div>
                          <div class="form-group">
                            <label for="prix">prix</label>
                            <input type="number" class="form-control" id="prix" name="prix" placeholder="Nom">
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <input type="submit" class="btn btn-primary" value="Ajouter" name="add" />
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                  <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
      foreach ($products as $product) {
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
                          <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $product->getId() ?>">
                            <input type="submit" value="Supprimer" name="delete" class="btn btn-outline-danger">
                          </form>
                          <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#modalaedit<?php echo $product->getId() ?>">Éditer</button>
                        </div>
                      </td>
                    </tr>
                    <div class="modal fade" id="modalaedit<?php echo $product->getId() ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                          <form method="post" action="">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="Nom">Nom</label>
                            <input type="hidden" required="required" name="idproduct" value="<?php echo $product->getId() ?>" class="form-control" placeholder="Nom">

                            <input type="text" class="form-control" id="Nom" name="Nom" value="<?php echo $product->getName() ?>" placeholder="Nom">
                          </div>
                          <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="<?php echo $product->getdescription() ?>" placeholder="Nom">
                          </div>
                          <div class="form-group">
                            <label for="prix">prix</label>
                            <input type="number" class="form-control" id="prix" name="prix" value="<?php echo $product->getprice() ?>" placeholder="Nom">
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <input type="submit" class="btn btn-primary" value="Modifier" name="Edit" />
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
include '../includes/footer.php'
?>