

<?php

include "../../../DB/connect.php" ;

if( !empty($_POST) ){

    $id  = $_POST['product_id'];
    $img = trim($_POST['img_src'] , " ");


    // ======================== select image ==============

    $select_img = "SELECT image FROM image WHERE product_id = '$id'" ;

    $result_img = $conn -> query($select_img);

    $img_name = $result_img -> fetch_assoc() ;


    
    $data = explode("--" , $img_name['image'] );

    $last_index = end($data);

    if(empty( $last_index)){

        array_pop($data);

       }



  

    // ======================== //////// ==============;



    // ====================== delete image ============ ;


    if( in_array($img , $data ) ){


 
        if( count($data)  == 1 ){

            echo "last image";
     

        }else{

          unlink("../../../assets/images/products/$img") ;

            $index_item = array_search($img , $data) ;

            array_splice($data , $index_item  , 1) ;
        
            $new_image_name = implode("--" , $data ) . "--" ;

            

            $edit_image  = "UPDATE image SET image = '$new_image_name' WHERE product_id = '$id'"  ;

            $conn -> query($edit_image) ;

            echo "remove";

        }



    }

    // ======================== //////// ==============;


    





}


?>