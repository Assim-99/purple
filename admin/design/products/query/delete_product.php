
<?php

include "../../../DB/connect.php" ;

if( !empty($_POST) ){


    $product_id = $_POST['id'];

    $delete_query = " DELETE FROM products WHERE id = '$product_id'";

    $conn -> query($delete_query) ;

   


}