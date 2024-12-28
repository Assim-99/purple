<?php


session_start();

session_unset();

session_destroy();

if( isset($_COOKIE['lock_key']) ){

    setcookie("lock_key" , "00" , time() - 2  , "/" ) ;
}

header("location:login.php") ;


?>