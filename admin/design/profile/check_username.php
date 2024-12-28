<?php

session_start() ;
include "../../DB/connect.php" ;

if( isset($_POST['username'])){

    $username = $_POST['username'] ;

    if($username == $_SESSION['admin_token']['username']){

        echo 'yes' ;
    }else{

        $select = "SELECT username From members where username ='$username'";
        $result_username = $conn -> query($select) ;
        $count  = $result_username -> num_rows ;

        if($count){
            echo 'no' ;

        }
    }
}


?>