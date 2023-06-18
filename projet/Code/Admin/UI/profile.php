<?php 
session_start();
if (empty($_SESSION["email"])) {
    // User session is not empty, redirect to home.php
    header("Location: page404.php");
    exit();
}
 include '../Includes/head.php'
 ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php 
     include '../Includes/preloader.php';
     include '../Includes/aside.php'
 ?>
    <div class="content-wrapper">
      <div class="content-header">
        <h1>Profile</h1>
      </div>
      <section class="content">
        <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <div class="card  card-outline">
              <div class="card-body box-profile">
                <h3 class="profile-username text-center"><?= $_SESSION["name"]?></h3>
                <p class="text-muted text-center"><?= $_SESSION["email"]?></p>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                 <H2>Edit Information</H2>
              </div>
              <div class="card-body">
                  <div >
                    <form class="form-horizontal" method="post" action="../Controller/admin.php">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control"  name="inputpassword" placeholder="Password" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <input type="submit" value="Edit profile" class="btn" name="profile">
                        </div>
                      </div>
                    </form>
                  </div>
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