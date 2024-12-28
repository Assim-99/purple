<?php

    $do_task = true ;
    

    if(isset($_FILES["images"])){

        for( $i = 0 ; $i < count($_FILES["images"]["name"]) ; $i++ ){

            $img_name  = $_FILES["images"]["name"][$i] ; 
            $img_tmp   = $_FILES["images"]["tmp_name"][$i] ; 
            $img_size  = $_FILES["images"]["size"][$i] ; 
           


            // =============== validation Images ======== ;

    
            //  ================== EXT ========================;

            $exp = explode("." , $img_name );
                
            $ext_img = end($exp);

            $allow_ext = [ "jpg" , "jpeg" , "png"  ] ;

            if( !in_array($ext_img , $allow_ext ) ){

                $error["image"] = "image Extention must be [ JPG | JPEG ]" ;

                $do_task = false ;

            }

            //  ================== size ========================;


            if($img_size > 3000000 ){

                $error["image"] = "Image Size Is To Large" ;

                $do_task = false ;
            }


            if($do_task){
                        
                $new_img_name = time() . rand(0 , 1000) .$img_name ;

                $img_files .= $new_img_name . "--"  ;
                move_uploaded_file( $img_tmp , "../../../assets/images/products/$new_img_name");
            }

            }
        }


        

    


