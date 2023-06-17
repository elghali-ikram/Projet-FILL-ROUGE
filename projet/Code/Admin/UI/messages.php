<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../Includes/head.php';
include '../Includes/root.php';
include "../manager/gestioncontact.php";
$gestioncontact = new Gestioncontact();
$result = $gestioncontact->selectWithPagination(null,null, 5);
if (isset($_POST['submit'])) {
  if(!empty($_POST["search"]))
  {
    $search=$_POST["search"];
    $result = $gestioncontact->selectWithPagination('Name',$search, 5);
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
        <h1>Messages</h1>

      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header back">
                  <h3 class="card-title"> All Messages</h3>
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
                        <th>Email</th>
                        <th>Message</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($result['result'] as $contact) {
                      ?>
                        <tr>
                          <td><?= $contact->getName() ?> </td>
                          <td><?= $contact->getEmail() ?></td>
                          <td><?= $contact->getMessage() ?></td>
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