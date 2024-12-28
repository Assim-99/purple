<nav class="sidebar sidebar-offcanvas" id="sidebar">

  <ul class="nav">



    <li class="nav-item nav-profile">

      <a href="profile.php" class="nav-link">
        <div class="nav-profile-image">
          <img src="assets/images/faces/<?= $_SESSION['admin_token']['profile_image'] ?>" alt="profile" />
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">

            <?= isset($_SESSION["admin_token"]) ? ucwords($_SESSION["admin_token"]['name']) : "Undefined"    ?>

          </span>
          <span class=" fw-bold text-success">
            <?= ucwords($_SESSION['pos']) ?>
          </span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>


    <!-- -------------------- Home ------------- -->
    <li class="nav-item">
      <a class="nav-link" href="index.php">

        <span class="menu-title">Dashboard</span>

        <i class="mdi mdi-home menu-icon"></i>

      </a>
    </li>


    <!-- -------------------- products ------------- -->

    <li class="nav-item">

      <a class="nav-link" href="products.php">

        <span class="menu-title">Products</span>

        <i class="mdi mdi-menu menu-icon"></i>

      </a>
    </li>

    <!-- -------------------- members ------------- -->


    <li class="nav-item">

      <a class="nav-link" href="members.php">

        <span class="menu-title"> Members </span>

        <i class="mdi mdi-account-multiple ms-auto"></i>

      </a>
    </li>

    <!-- -------------------- brand ------------- -->


    <li class="nav-item">

      <a class="nav-link" href="brand.php">

        <span class="menu-title"> Brand </span>

        <i class="mdi mdi-animation ms-auto"></i>

      </a>
    </li>

    <!-- -------------------- Settings---------- -->


    
    <li class="nav-item">

      <a class="nav-link" href="setting.php">

        <span class="menu-title"> Settings </span>

        <i class="mdi mdi-power-settings ms-auto"></i>

      </a>
    </li>





  </ul>
</nav>