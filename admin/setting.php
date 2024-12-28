<?php include "inc/header.inc.php"; ?>


<div class="container-scroller">

    <!-- =================== nav bar ========== -->
    <?php include "inc/nav.inc.php"; ?>
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
                            <i class="mdi mdi-power-settings"></i>
                        </span> Site Settings
                    </h3>
                </div>



                <!-- ==================   Main Content   ============ -->
                <div class="container">

                <?php

                if(!isset($_GET['setting'])){
                    include "design/setting/all.php";

                }elseif($_GET['setting'] == 1 ){

                    include "design/setting/slider_setting.php";

                }



                ?>

                    
                </div>
                <!-- ==================// Main Content //============ -->




            </div>




        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>










</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->



<?php include "inc/footer.inc.php"; ?>