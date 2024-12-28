<?php


include "../../../DB/connect.php" ;

if( !empty($_POST) ){


    $member_id = $_POST['id'];

    $delete_query = " DELETE FROM members WHERE id = '$member_id'";

    $conn -> query($delete_query) ;

}


?>