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
        <h1>Gestion de products</h1>
      </div>
      <section class="content">
        <div class="container-fluid">
        </div>
      </section>
    </div>
    
 <?php 
 include '../Includes/footer.php'
 ?>
</body>

</html>