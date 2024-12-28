<?php


 
    include "../../../DB/connect.php" ;

    // ===============  error Mode =============; 
     $have_error = false ;

    // ===============  error Mode =============; 


    session_start() ;


    if( !empty($_POST)  ){

        // ================ receive Data from Post array ========= ;

            extract($_POST);
            $img_profile = "th.jpg";


        // =============== validation =========== ;   

            $error = [] ;

            foreach( $_POST as  $input_value ){

                if( strlen($input_value) == 0 ){
                    $error['emptyE'] = "yes" ;
                }
            }

            if( strlen($username)  < 8  ){

                $error["usernameE"] = "Username  Must Be More Then 8 Char" ;
            };


            
            if( strlen($password)  < 8  ){

                $error["passE"] = "Password Must Be More Powerful" ;
            };


            if( $password != $c_password ){

                $error["CpassE"] = "Does Not Match" ;

            }


            
            if( !empty($_FILES['profile_image']['name'])){

                $profile_image = $_FILES['profile_image']['name'] ;
                $profile_tmp   = $_FILES['profile_image']['tmp_name'] ;

                $img_profile = time() . rand(0 , 100) .$profile_image ;

                move_uploaded_file( $profile_tmp , "../../../assets/images/faces/$img_profile");


            }


        // ==============////////////============ ;
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

            $password = sha1($password) ;

            $insert = "INSERT INTO members (username, name, email, password, pr, profile_image) VALUES ('$username','$name','$email','$password','$pr','$img_profile')" ;

             $conn -> query($insert) ;


            // =========== /////////////////// ===== ;


            header("location:../../../members.php") ;


        }else {

            $_SESSION["errors"] = $error ;
            $_SESSION["form_data"] = $_POST ;
            header("location:../../../members.php?members=add") ;
        }



        // ==============// Inserted Data in sql //=== ; 



  


