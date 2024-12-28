
<?php 

session_start() ;
include "../../DB/connect.php" ;

if( isset($_POST['pass'])){

     $pass     = sha1($_POST['pass']) ;
     $old_pass = $_SESSION['admin_token']['password'] ;
     $id = $_SESSION['admin_token']['id'] ;

     
     if( $pass == $old_pass ){

        echo "same_pass";

     }else{

        $change_pass = "UPDATE members SET password='$pass' WHERE id ='$id'";
        $conn -> query($change_pass) ;
        session_unset() ;
        session_destroy() ;
        echo "done";

     }

    
    }


