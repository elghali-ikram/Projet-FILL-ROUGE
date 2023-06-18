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
        <h1>Product</h1>
      </div>
      <section class="content">
        <div class="container-fluid ">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card " style="width: 50rem;">
                <div class="card-header back">
                  <h3 class="card-title">Edit Product</h3>
                </div>
                <form  method="post" id="myForm">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="images">Gallery of images</label>
                      <div class="d-flex gap-2 flex-wrap m-3 form-valid">
                        <div class="d-flex flex-wrap gap-3" id="images">
                          <!-- Image preview will be displayed here -->
                        </div>
                        <div class="rectangle">
                          <label for="image-input" class="icon">
                            <i class="fa fa-plus"></i>
                          </label>
                          <input id="image-input" name="images[]" type="file" multiple>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="category">Category</label>
                      <select name="category" id="category" class="custom-select form-control-border">
                        <option value="">Select Category</option>
                        <option value="women">Women</option>
                        <option value="men">Men</option>
                      </select>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="size">Size</label>
                        <select name="size" id="size" class="custom-select form-control-border">
                          <option value="">Select Size</option>
                          <option value="s">Small</option>
                          <option value="m">Medium</option>
                          <option value="l">Large</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="color">Color</label>
                        <select name="color" id="color" class="custom-select form-control-border">
                          <option value="">Select Color</option>
                          <option value="red">Red</option>
                          <option value="blue">Blue</option>
                          <option value="green">Green</option>
                        </select>
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-4">
                      <input type="submit" value="Edit Product" class="btn  btn-block">
                    </div>
                  </div>
                  </div>
              </form>
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