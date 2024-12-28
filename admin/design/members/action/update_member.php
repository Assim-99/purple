<?php

include "../../../DB/connect.php" ;

if( !empty($_POST) && isset($_POST['id'])){

    extract($_POST);

    if( strlen($username)  < 8  ){

        $error_User = "Username  Must Be More Then 8 Char" ;

        echo $error_User ;

    }else{

        $update = "UPDATE members SET username='$username',name='$name',email='$email',pr='$pr' WHERE id = '$id'"; 

        $conn -> query($update);

        echo true;
    } 


   
  

}