
<?php 
    include "../../../DB/connect.php" ;



    if(isset($_POST["id"])){

        $product_id = $_POST["id"] ;

        $select_image = "SELECT image FROM image WHERE product_id = '$product_id'";

        $result_image = $conn -> query($select_image);

        $image = $result_image -> fetch_assoc() ;

        $array_images = explode("--" ,$image["image"]) ;

        $end = end($array_images);
      
            if( empty($end)){

                array_pop($array_images) ;

            }
        
        echo json_encode($array_images);   
    }
  



?>