<?php 
 include '../Includes/head.php'
 ?>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-dark">
          <div class="card-header text-center">
            <h1><b>FLORIAN </b>ATELIER</h1>
          </div>
          <div class="card-body">
            <p class="login-box-msg">Sign in</p>
            <form  method="post" id="quickForm">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                </div>
              <div class="row">
                <div class="col-4">
                  <button type="submit" class="btn  btn-block">Sign In</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
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