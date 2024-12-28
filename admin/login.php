
<?php
include "DB/connect.php" ;

session_start();


if(isset($_SESSION["admin_token"])){

  header("location:index.php");

  exit();

}


  if( isset($_COOKIE['lock_key']) ){

    $key = $_COOKIE['lock_key'] ;

    $select_admin = "SELECT * FROM members WHERE stay ='$key'"; 
    $result_admin = $conn -> query($select_admin);
    $admin = $result_admin -> fetch_assoc() ;


    
    $admin_pr = $admin['pr'] ;
  

    $select_pos = "SELECT * FROM pr WHERE id = '$admin_pr'";
    $result_pos = $conn -> query($select_pos) ;
    $pos = $result_pos -> fetch_assoc() ;
  

    $_SESSION['admin_token'] =  $admin  ;
    $_SESSION['pos'] = $pos['name'] ;

    header("location:index.php");
}

$not = false  ;

// ---------------------- check if form work --------- ;

if( $_SERVER["REQUEST_METHOD"] == "POST"){


    // ------------ receive data ------- ;

    $username = $_POST['username'] ;
    $password = sha1($_POST['password']) ;
    $stay   = isset($_POST['stay']) ? $_POST['stay'] : "" ;


    // ---------------- check if data found in data base ---------- ;


    $select_admin = " SELECT * FROM members WHERE username = '$username' && password = '$password'";

    $result_admins = $conn -> query($select_admin);

    $stat   =  $result_admins -> num_rows ;
    $admin  =  $result_admins -> fetch_assoc();

    if($stat > 0 ){

        $admin_pr = $admin['pr'] ;
        $admin_id = $admin['id'] ;

        if( $admin_pr != 3  ){


          if($stay){

            $stay_kay =  uniqid() ;

            $update_stay = "UPDATE members SET stay='$stay_kay' WHERE id = '$admin_id'";

            $conn -> query($update_stay);

            setcookie("lock_key" ,$stay_kay , time() + 60 * 60 * 24 * 7 , "/" ) ;


          }



          $select_pos = "SELECT * FROM pr WHERE id = '$admin_pr'";
          $result_pos = $conn -> query($select_pos) ;
          $pos = $result_pos -> fetch_assoc() ;
        
      
          $_SESSION['admin_token'] =  $admin  ;
          $_SESSION['pos'] = $pos['name'] ;
  
          header("location:index.php");
        }else{

          $not = true ;   
        }
    }else{

      $not = true ;
    }
}
?>

<html>
<head>
  <meta charset="utf-8">
  <title> Purple: Sign in</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    * {
        padding: 0;
        margin: 0;
        color: #1a1f36;
        box-sizing: border-box;
        font-family: Tahoma;

        }
        body {
            min-height: 100%;
            background-color: #ffffff;
        }
        h1 {
            letter-spacing: 1px;
            color : white ;
        }
        a {
        color: #5469d4;
        text-decoration: unset;
        }
        .login-root {
            background: #fff;
            display: flex;
            width: 100%;
            min-height: 100vh;
            overflow: hidden;
            background: rgb(0,212,255);
            background: linear-gradient(151deg, rgba(0,212,255,1) 23%, rgba(9,9,121,1) 61%, rgba(2,0,36,1) 93%);
            
        }
        .loginbackground {
            min-height: 692px;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            z-index: 0;
            overflow: hidden;
        }
        .flex-flex {
            display: flex;
        }
        .align-center {
        align-items: center; 
        }
        .center-center {
        align-items: center;
        justify-content: center;
        }
        .box-root {
            box-sizing: border-box;
        }
        .flex-direction--column {
            -ms-flex-direction: column;
            flex-direction: column;
        }
   
        .box-divider--light-all-2 {
            box-shadow: inset 0 0 0 2px #e3e8ee;
        }
        .box-background--blue {
            background-color: #5469d4;
        }
        .box-background--white {
        background-color: #ffffff; 
        }
        .box-background--blue800 {
            background-color: #212d63;
        }
        .box-background--gray100 {
            background-color: #e3e8ee;
        }
        .box-background--cyan200 {
            background-color: #7fd3ed;
        }
        .padding-top--64 {
        padding-top: 64px;
        }
        .padding-top--24 {
        padding-top: 24px;
        }
        .padding-top--48 {
        padding-top: 48px;
        }
        .padding-bottom--24 {
        padding-bottom: 24px;
        }
        .padding-horizontal--48 {
        padding: 48px;
        }
        .padding-bottom--15 {
        padding-bottom: 15px;
        }


        .flex-justifyContent--center {
        -ms-flex-pack: center;
        justify-content: center;
        }

        .formbg {
            margin: 0px auto;
            width: 100%;
            max-width: 448px;
            background: white;
            border-radius: 4px;
            box-shadow: rgba(60, 66, 87, 0.12) 0px 7px 14px 0px, rgba(0, 0, 0, 0.12) 0px 3px 6px 0px;
        }
        span {
            display: block;
            font-size: 20px;
            line-height: 28px;
            color: #1a1f36;
        }
        label {
            margin-bottom: 10px;
        }
        .reset-pass a,label {
            font-size: 14px;
            font-weight: 600;
            display: block;
        }
        .reset-pass > a {
            text-align: right;
            margin-bottom: 10px;
        }
        .grid--50-50 {
            display: grid;
            grid-template-columns: 50% 50%;
            align-items: center;
        }

        .field input {
            font-size: 16px;
            line-height: 28px;
            padding: 8px 16px;
            width: 100%;
            min-height: 44px;
            border: unset;
            border-radius: 4px;
            outline-color: rgb(84 105 212 / 0.5);
            background-color: rgb(255, 255, 255);
            box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                        rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                        rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                        rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, 
                        rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                        rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                        rgba(0, 0, 0, 0) 0px 0px 0px 0px;
        }

        input[type="submit"] {
            background-color: rgb(84, 105, 212);
            box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                        rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                        rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, 
                        rgb(84, 105, 212) 0px 0px 0px 1px, 
                        rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                        rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                        rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
        }
        .field-checkbox input {
            width: 20px;
            height: 15px;
            margin-right: 5px; 
            box-shadow: unset;
            min-height: unset;
        }
        .field-checkbox label {
            display: flex;
            align-items: center;
            margin: 0;
        }
        a.ssolink {
            display: block;
            text-align: center;
            font-weight: 600;
        }
        .footer-link span {
            font-size: 14px;
            text-align: center;
            color : #dc3545 ;
        }
        .footer-link span a {

          color : wheat ;

        }
        .listing a {
            color: #697386;
            font-weight: 600;
            margin: 0 10px;
        }
  </style>
  
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
    
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1> Purple Admin  </h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Sign in to your account</span>


              <form id="stripe-login" action="" method="post">
                <div class="field padding-bottom--24">
                  <label for="email">User Name </label>
                  <input type="text" name="username" >
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">Password</label>
                  </div>
                  <input type="password" name="password">
                </div>


                <?php

                if($not){?>

                <div class="alert alert-danger text-center"> Check Your Password Or Username   </div>


                  <?php
                }

                ?>

                <!-- ================= check box =========== -->

                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">

                  <label for="checkbox">
                    <input type="checkbox" name="stay" value="1"> Stay signed in for a week
                  </label>


                </div>
                <!-- ================= ///////// =========== -->

                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Login">
                </div>
              </form>



            </div>
          </div>


          <div class="footer-link padding-top--24">
            <span>Don't have an account? <a href="">Sign up</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">


              <span><a href="#">© Purple Store</a></span>
              <span><a href="#">Contact</a></span>
              <span><a href="#">Privacy & terms</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>