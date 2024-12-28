<?php

$empty = false;

$input_error = false;

if (isset($_SESSION["errors"])) {


    if (isset($_SESSION["errors"]['emptyE'])) {

        $empty = true;

    } else {
        extract($_SESSION["errors"]);
        $input_error = true;
    }
}
;

if (isset($_SESSION["form_data"])) {

    extract($_SESSION["form_data"]);

}




?>


<form method="post" enctype="multipart/form-data" action="design/members/action/insert.php" class="forms-sample">
    <!-- ===================== Form Inputes ============== -->



    <!-- ====================== profile image ============= -->

    <div class="profile-image">

        <label for="profile_image">

            <img id="pro_image" class="image-profile" src="assets/images/faces/th.jpg" alt="profile image" />
        </label>

        <input name="profile_image" type="file" id="profile_image" style="display: none" />

        <p id="error_mess" class="error_profile mt-1">* File Upload Must Be Image</p>
    </div>

    <!--  ===================== user Name =========== -->
    <div class="form-group">
        <label> User Name : </label>
        <input autocomplete="off" type="text" name="username" class="form-control" placeholder=" User Name "
            value="<?= isset($username) ? $username : "" ?>">


        <p class="my-1 p-2 text-danger fw-bold">
            <?= isset($usernameE) && $input_error ? $usernameE : false ?>
        </p>


    </div>


    <!--  ===================== Name =========== -->
    <div class="form-group">
        <label> Name : </label>
        <input autocomplete="off" type="text" name="name" class="form-control" placeholder="Name"
            value="<?= isset($name) ? $name : "" ?>">


    </div>


    <!--  ===================== email =========== -->
    <div class="form-group">
        <label> E-mail : </label>
        <input autocomplete="off" type="email" name="email" class="form-control" placeholder="Email"
            value=" <?= isset($email) ? $email : "" ?>">
    </div>


    <!--  ===================== password =========== -->
    <div class="form-group">
        <label> Password : </label>
        <input autocomplete="off" type="password" name="password" class="form-control" placeholder="Password"
            value="<?= isset($password) ? $password : "" ?>">


        <p class="my-1 p-2 text-danger fw-bold">
            <?= isset($passE) && $input_error ? $passE : false ?>
        </p>

    </div>



    <!--  ===================== confirm-Password =========== -->
    <div class="form-group">
        <label> Confirm Password : </label>
        <input autocomplete="off" type="password" name="c_password" class="form-control" placeholder="Confirm Password"
            value="<?= isset($c_password) ? $c_password : "" ?>">




        <p class="my-1 p-2 text-danger fw-bold">
            <?= isset($CpassE) && $input_error ? $CpassE : false ?>
        </p>
    </div>


    <div class="form-group">

        <label> Privileges : </label>

        <select class="form-control" style="height: 40px; text-align:center;" name="pr">
            <option <?= isset($pr) && $pr == 2 ? 'selected' : "" ?> value="2"> Admin </option>
            <option <?= isset($pr) && $pr == 3 ? 'selected' : "" ?> value="3"> User </option>

        </select>

    </div>






    <button type="submit" class="btn btn-gradient-primary me-2">
        Add New
        <i class="mdi mdi-bookmark-plus ms-1 "></i>
    </button>

</form>



<?php

unset($_SESSION["errors"]);
unset($_SESSION["form_data"]);

?>