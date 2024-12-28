<?php include "inc/header.inc.php";


?>


<div class="container-scroller">
  <!-- =================== nav bar ========== -->
  <?php include "inc/nav.inc.php";  ?>
  <!-- =================// nav bar //======== -->
  <div class="container-fluid page-body-wrapper">
    <!-- =================== slider ========== -->
    <?php include "inc/slider.inc.php"; ?>
    <!-- =================// slider //======== -->
    <!-- partial -->
     
    <div class="main-panel">

      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-menu"></i>
            </span> Products
          </h3>
        </div>

      <div class="container">

        <div class="row">

          <!-- ==================   Main Content   ============ -->

       
      
            <?php

            if(!isset($_GET['products'])){

              include "design/products/pro.php";

            }elseif ($_GET["products"]== 'all') {

              include "design/products/all.pro.php";

            } elseif ($_GET['products'] == 'add') {

              include "design/products/add.pro.php";
            } elseif ($_GET['products'] == 'edit') {

              include "design/products/edit.pro.php";
            }
            ?>
          </div>


          <!-- ==================// Main Content //============ -->


        </div>




      </div>




    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>



<?php include "inc/footer.inc.php"; ?>