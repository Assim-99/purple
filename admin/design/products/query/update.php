<?php


 
    include "../../../DB/connect.php" ;

    // ===============  error Mode =============; 
     $have_error = false ;
    // ===============  error Mode =============; 


    session_start() ;


    

    if( !empty($_POST) ){

        // ================ receive Data from Post array ========= ;
            extract($_POST);
        // ============== // /////////////////////////// // ====== ;
        


        // =============== validation =========== ;   

            $error = [

                "empty" => "" ,

                "product_name" => "" ,

                "stock" => "",

                "price" => "" ,

                "image" => "",

           
            ] ;

            foreach( $_POST as  $input_value ){

                if( strlen($input_value) == 0 ){
                    $error['empty'] = "yes" ;
                }
            }

            if( strlen($product_name)  < 8  ){

                $error["product_name"] = "Product Name Must Be More Then 8 Char" ;
            };


            if( $price <= 0   ){
                $error["price"] = "Price Must Be Valid Number" ;
            };


            if( $stock <= 0   ){
                $error["stock"] = "Stock Must Be Valid Number" ;
            };



            // ==================== validation_img ===============;
            
                include "valid_edit_img.php";

            // =================// validation_img //==============;

    }








        // ==================log error by have error variable ======= ; 

            foreach( $error as $value ){

                if($value){

                    $have_error = true ;

                }    
            }

        // ================//log error by have error variable //===== ; 




        // ================ Inserted Data in sql ===== ; 

        if(!$have_error){
       
            unset( $_SESSION['errors'] );

            $update_product = "UPDATE products 
            SET product_name='$product_name',price='$price',brand='$brand',stock='$stock' 
            WHERE id = '$product_id'" ;



            $updateed=  $conn -> query($update_product) ;

            if(!$updateed){

                $_SESSION["error_sql"] = "Something Error"; 

            }

            // ============== inserted Image Data in sql ======= ;

                $update_img = "UPDATE image SET image='$img_files' WHERE product_id = '$product_id' ";

                $conn -> query($update_img);

            // =========== // inserted Image Data in sql // ===== ;


            header("location:../../../products.php") ;


        }else {

            $_SESSION["errors"] = $error ;
            
            header("location:../../../products.php") ;
        }



        // ==============// Inserted Data in sql //=== ; 



  


