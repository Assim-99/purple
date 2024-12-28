<?php

session_start() ;

include "../../DB/connect.php" ;

if( !empty($_POST)){

    extract($_POST);
          
    $member_id = $_SESSION['admin_token']['id'] ;

    if($_FILES['profile_image']['error'] == 0 ){

        $profile_image = $_FILES['profile_image']['name'] ;
        $profile_tmp   = $_FILES['profile_image']['tmp_name'] ;

        $img_profile = time() . rand(0 , 100) .$profile_image ;

        move_uploaded_file( $profile_tmp , "../../assets/images/faces/$img_profile");


        $old_img = "../../assets/images/faces/{$_SESSION['admin_token']['profile_image']}" ;

        if(file_exists( $old_img)){
            unlink($old_img) ;
        }


        $update = "UPDATE members SET username='$username',name='$name',email='$email', profile_image = '$img_profile', phone ='$phone' WHERE id = '$member_id'"; 



        $_SESSION['admin_token']['profile_image'] = $img_profile ;
        $_SESSION['admin_token']['name'] = $name ;
        $_SESSION['admin_token']['username'] = $username ;
        $_SESSION['admin_token']['email'] = $email ;
        $_SESSION['admin_token']['phone'] = $phone ;





    }else{

        $update = "UPDATE members SET username='$username',name='$name',email='$email', phone ='$phone' WHERE id = '$member_id'"; 

        $_SESSION['admin_token']['name'] = $name ;
        $_SESSION['admin_token']['email'] = $email ;
        $_SESSION['admin_token']['phone'] = $phone ;

    }


    $conn -> query($update);

    echo true;

    } 


?>