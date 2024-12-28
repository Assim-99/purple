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
                            <i class="mdi mdi-account"></i>
                        </span> Profile
                    </h3>
                </div>


                <?php
                extract($_SESSION["admin_token"]);

               


                ?>

                <hr>
                <!-- ==================   Main Content   ============ -->

                <style>
                    body {
                        background: rgb(99, 39, 120)
                    }

                    .form-control:focus {
                        box-shadow: none;
                        border-color: #BA68C8
                    }

                    .profile-button {
                        background: rgb(99, 39, 120);
                        box-shadow: none;
                        border: none
                    }

                    .profile-button:hover {
                        background: #682773
                    }

                    .profile-button:focus {
                        background: #682773;
                        box-shadow: none
                    }

                    .profile-button:active {
                        background: #682773;
                        box-shadow: none
                    }

                    .back:hover {
                        color: #682773;
                        cursor: pointer
                    }

                    .labels {
                        font-size: 11px
                    }

                    .add-experience:hover {
                        background: #BA68C8;
                        color: #fff;
                        cursor: pointer;
                        border: solid 1px #BA68C8
                    }
                </style>

                <div class="container rounded bg-white mt-5 mb-5">


                    <div class="row" id="box_profile_info">

                        <div class="col-md-5 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img class="rounded-circle mt-5 border border-4" width="150px" src="assets/images/faces/<?= $_SESSION['admin_token']['profile_image'] ?>">

                                <span class="font-weight-bold">
                                    <?= $_SESSION['admin_token']['name'] ?>
                                    <br>
                                    <span class="text-black-50">
                                        <?= $_SESSION['admin_token']['email'] ?>
                                    </span><span> </span>
                            </div>
                        </div>

                        <div class="col-md-7 border-right">

                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Profile Settings</h4>
                                </div>


                                <div class="row mt-3">

                                    <div class="col-md-6">
                                        <label class="labels fw-bold"> Name : </label>
                                        <div class="bg-dark text-light fw-bold text-center p-1 rounded my-1">
                                            <?= $name  ?>
                                        </div>

                                    </div>


                                    <div class="col-md-6">
                                        <label class="labels fw-bold"> User Name : </label>
                                        <div class="bg-dark text-light fw-bold text-center p-1 rounded my-1">
                                            <?= $username  ?>
                                        </div>

                                    </div>


                                    <div class="col-md-6">
                                        <label class="labels fw-bold"> Power : </label>
                                        <div class="bg-dark text-light fw-bold text-center p-1 rounded my-1">
                                            <?= $_SESSION['pos']  ?>
                                        </div>

                                    </div>


                                    <div class="col-md-6">
                                        <label class="labels fw-bold"> Phone Number : </label>
                                        <div class="bg-dark text-light fw-bold text-center p-1 rounded my-1">
                                            <?= $phone  ?>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <label class="labels fw-bold"> E-mail : </label>
                                        <div class="bg-dark text-light fw-bold text-center p-1 rounded my-1">
                                            <?= $email  ?>
                                        </div>

                                    </div>



                                    <div class="col-md-6">
                                        <button class="btn btn-info mt-3 w-100" id="btn_update_profile">
                                            Update Info
                                            <i class="mdi mdi-account-settings"></i>
                                        </button>
                                    </div>



                                    <div class="col-md-6">
                                        <button class="btn btn-info mt-3 w-100 " id="btn_change_pass">
                                            Change Password
                                            <i class="mdi mdi-settings"></i>
                                        </button>
                                    </div>


                                </div>


                            </div>

                        </div>


                    </div>



                    <div class="row" id="box_update_info" style="display: none ;">

                        <div class="col-12 border-right">

                            <form id="form_profile_update">



                                <div class="profile-image my-2">
                                    <label for="profile_image">
                                        <img id="pro_image" class="image-profile border border-3" src="assets/images/faces/<?= $profile_image ?>" alt="profile image" />
                                    </label>

                                    <input name="profile_image" type="file" id="profile_image" style="display: none" />

                                    <p id="error_mess" class="error_profile mt-1">* File Upload Must Be Image</p>

                                    <p style="display: none ; color:red" id="error_mess_input" class="text-danger text-center p-2 fw-bold"> All Inputs is Required </p>
                                </div>

                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="fw-bold"> Name : </label>
                                            <input autocomplete="off" type="text" name="name" class="form-control inp_profile" placeholder=" User Name" value="<?= $name ?>">

                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="fw-bold"> User Name : </label>
                                            <input autocomplete="off" type="text" name="username" class="form-control inp_profile" placeholder=" User Name " value="<?= $username ?>">

                                            <p style="display: none ; color:red" id="error_mess_username" class=" p-2 fw-bold"> User Name Must Be More Then 8 Char </p>


                                            <p style="display: none;color:red;" class="my-1 p-2 fw-bold" id="error_mess_username_found"> User Name has alreally exisit </p>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="fw-bold"> Power : </label>
                                            <input disabled autocomplete="off" type="text" name="pr" class="form-control inp_profile" placeholder=" User Name " value="<?= $_SESSION['pos'] ?>">
                                            <p class="my-1 p-2 text-danger fw-bold"> </p>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="fw-bold"> Phone Number : </label>
                                            <input autocomplete="off" type="text" name="phone" class="form-control inp_profile" placeholder=" User Name " value="<?= $phone ?>">
                                            <p class="my-1 p-2 text-danger fw-bold"> </p>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="fw-bold"> E-mail : </label>
                                            <input autocomplete="off" type="email" name="email" class="form-control inp_profile" placeholder=" User Name " value="<?= $email ?>">
                                            <p class="my-1 p-2 text-danger fw-bold"> </p>
                                        </div>
                                    </div>

                                    <div class="text-center my-2">
                                        <button class="btn btn-success"> Save </button>
                                    </div>



                                </div>


                            </form>
                        </div>

                    </div>


                    <div id="box_change_pass" style="display:none ;">

                        <div class="border-right">

                            <form id="form_change_pass">


                                <div class="row py-3">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="fw-bold"> New Password : </label>
                                            <input autocomplete="off" type="password" name="password" class="form-control inp_profile" placeholder=" New Password">

                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="fw-bold"> Confirm Password : </label>
                                            <input autocomplete="off" type="password" name="C_password" class="form-control inp_profile" placeholder=" Confirm Password">

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div style="display: none ;" id="pass_error" class="alert alert-danger text-center text-dark">   </div>
                                    </div>

                                    <div class="col-12">
                                    <div class="text-center my-2">
                                        <button  class="btn btn-success"> Save </button>
                                    </div>
                                </div>


                                </div>

                


                            </form>

                        </div>


                    </div>


                </div>
            </div>




            <!-- ==================// Main Content //============ -->
        </div>




    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->



<?php include "inc/footer.inc.php"; ?>