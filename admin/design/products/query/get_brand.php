

<?php

include "../../../DB/connect.php" ;

$data = [] ;

$select_brand = "SELECT * FROM brand";

$result_brand = $conn -> query($select_brand);

foreach( $result_brand as $brand ){

   $data[] = $brand ;
}

echo json_encode($data);