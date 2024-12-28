<?php

include "../../../DB/connect.php" ;

if(isset($_POST["pag_num"])  && $_POST["pag_num"] > 0   ){

    $pag_num = $_POST["pag_num"] ;

    $offset_num = ($pag_num - 1) * 4 ;


    // ===================== select data ======== ;

    $select_pag = " SELECT * FROM products LIMIT 4 offset $offset_num";

    $result_pag = $conn -> query($select_pag) ;

    $num_row = $result_pag -> num_rows ;

    $products = [] ;
    
    if($num_row > 0  ){

        foreach($result_pag as $product){

            $id_brand = $product['brand'];
            $select_brand = "SELECT brand FROM brand WHERE id = '$id_brand'";
            $rersult_brand = $conn->query($select_brand);
            $brand = $rersult_brand->fetch_assoc();

            $product['brand'] = $brand['brand'];



            array_push($products , $product );
        }

        echo json_encode($products);

    }else{

        echo json_encode([]) ;
    }

   




  

}else{
    echo json_encode([]) ;
}


