
<nav class="main-header navbar navbar-expand ">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link text-color" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
            ADMIN APP
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="profile.php" class="dropdown-item">
              <i class="far fa-user"></i> Profile
            </a>
            <div class="dropdown-divider"></div>
            <a href="../Controller/logout.php" class="dropdown-item">
              <i class="fas fa-sign-out-alt"></i>
              Logout
            </a>
          </div>
        </li>
      </ul>

    </nav>
    <aside class="main-sidebar">
      <a href="index.html" class="brand-link">
        <img src="../../Assets/images/logo.png" alt="Logo" class="brand-image img-circle ">
        <span class="brand-text text-color">Florian Atelier</span>
      </a>
      <div class="sidebar">
        <nav class="mt-5">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="" class="nav-link text-color">
                <i class="fa fa-shopping-bag"></i>
                <p class="text-color">
                  Products
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="allproduct.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Product</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="addnew.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Product</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item ">
              <a href="categories.php" class="nav-link text-color">
                <i class="fas fa-folder-open"></i>
                <p class="text-color">
                  Categories
                </p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="#" class="nav-link text-color">
                <i class="fas fa-tags"></i>
                <p class="text-color">
                  Attributes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="color.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Color</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="size.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Size</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item ">
              <a href="messages.php" class="nav-link text-color">
              <i class="fas fa-envelope"></i>
                <p class="text-color">
                  Messages
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>