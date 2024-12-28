<?php include "inc/header.inc.php"; ?>

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
              <i class="mdi mdi-account-multiple"></i>
            </span> Members 
          </h3>
        </div>

       

      <div class="container">

        <div class="row">

          <!-- ==================   Main Content   ============ -->

         
            <?php


              if (!isset($_GET['members'])) {

                include "design/members/member.php";

              } elseif ($_GET['members'] == 'all') {

                include "design/members/all.php";
                
              } elseif ($_GET['members'] == 'add') {

                include "design/members/add.php";
                
              }elseif ($_GET['members'] == 'edit') {

                include "design/members/edit.php";
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