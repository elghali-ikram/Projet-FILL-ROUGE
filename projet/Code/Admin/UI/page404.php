<?php 
 include '../Includes/head.php'
 ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php 
     include '../Includes/preloader.php';
 ?>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

          <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
          </p>

          <form class="search-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                </button>
              </div>
            </div>
            <!-- /.input-group -->
          </form>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
    <script src="../../Assets/TEMPLATE/plugins/jquery/jquery.min.js"></script>
  <script src="../../Assets/TEMPLATE/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="../../Assets/TEMPLATE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../../Assets/TEMPLATE/dist/js/adminlte.js?v=3.2.0"></script>
  <script src="../../Assets/TEMPLATE/dist/js/pages/dashboard.js"></script>
  <script src="../../Assets/TEMPLATE/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../Assets/TEMPLATE/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="../../Assets/indexadmin.js" ></script>
</body>
</html>
