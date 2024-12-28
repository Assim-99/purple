<?php

include "../../../DB/connect.php" ;

if( !empty($_POST) && isset($_POST['member_id'])){

    $member_id = $_POST["member_id"] ;
    
    $select_member = "SELECT * FROM members WHERE id ='$member_id'";

    $result_member = $conn -> query($select_member);

    $member = $result_member -> fetch_assoc() ; 

    echo json_encode($member);

    
}