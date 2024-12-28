<?php


 
    include "../../../DB/connect.php" ;

    // ===============  error Mode =============; 
     $have_error = false ;
    // ===============  error Mode =============; 


    session_start() ;


    if(count($_POST) > 1 ){

        // ================ receive Data from Post array ========= ;
            extract($_POST);
        // ============== // receive Data from Post array // ====== ;
        


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
                include "validation_img.php";
             // =================// validation_img //==============;


        // ==============// validation //========= ;
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

            $insert = "INSERT INTO products
            ( product_name, price, brand, stock) 
            VALUES ('$product_name','$price','$brand','$stock')" ;

            $inserted =  $conn -> query($insert) ;

            if($inserted){

                $last_id = $conn->insert_id; 

            }else {

                $_SESSION["error_sql"] = "Something Error"; 

            }

            // ============== inserted Image Data in sql ======= ;

                $insert_img = "INSERT INTO image
                (product_id, image) 
                VALUES ('$last_id','$img_files')";

                $conn -> query($insert_img);

            // =========== // inserted Image Data in sql // ===== ;


            header("location:../../../products.php") ;


        }else {

            $_SESSION["errors"] = $error ;
            header("location:../../../products.php?products=add&n=$product_name&p=$price&s=$stock") ;
        }



        // ==============// Inserted Data in sql //=== ; 



  


