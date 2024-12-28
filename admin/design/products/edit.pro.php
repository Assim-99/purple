 <!-- ============================= PHP Work =================== -->
 <?php


        if(isset($_GET["id"])  && $_GET["id"] > 0  ){

            $product_id = $_GET['id'];

         
            $select_products = "SELECT * FROM products where id = '$product_id'";

            $result_products = $conn->query($select_products);

            $product = $result_products -> fetch_assoc();

            // ==================== select image ================= ;

            $select_image = "SELECT image FROM image WHERE product_id = '$product_id'";

            $result_image = $conn -> query($select_image);

            $all_in_img  = $result_image -> fetch_assoc() ;


            $images = explode("--" ,$all_in_img["image"]) ;



            if(count($images) > 1 ){

                array_pop($images) ;
            }



        }
    




    // ===============  check if have any error ========== ;


        $empty = false;

        $input_error = false;

        if (isset($_SESSION["errors"])) {

            if (array_key_exists("empty", $_SESSION["errors"])  && $_SESSION["errors"]['empty'] == 'yes') {

                $empty = true;
            } else {
                $input_error = true;
            }
        };



    // ================== repopualit form data from get ========;

    if (isset($_GET["n"])  ||  isset($_GET["p"])  || isset($_GET["s"])) {

        $product_name = $_GET["n"] ?? "";
        $price        = $_GET["p"] ?? "";
        $stock        = $_GET["s"] ?? "";
    }


    // ==============// check if have any error //======== ;



    // ===================== SELECT data From brand ==========
    $select_brand = "SELECT * FROM brand";
    $result_brand = $conn->query($select_brand);
    // ===================// SELECT data From brand //=========

    ?>
 <!-- ===========================// PHP Work //================== -->



 <div class="card">

     <div class="card-body">
         <?php
            if ($empty) { ?>
             <p class="alert alert-danger text-center"> All Inputs Is Required </p>
         <?php
            }
            ?>

         <form
             method="post"
             enctype="multipart/form-data"
             action="design/products/query/update.php"
             class="forms-sample">

             <!-- ===================== Form Inputes ============== -->

             <input type="hidden" name="product_id" value = "<?=$product['id']?>">


             <!--  ===================== Product Name =========== -->
             <div class="form-group">
                 <label> Product Name : </label>
                 <input type="text" name="product_name" class="form-control" placeholder="Product Name " value="<?= $product['product_name'] ?>">
                 <p class="my-1 p-2 text-danger fw-bold">
                     <?= isset($_SESSION["errors"]['product_name']) && $input_error  ?
                            $_SESSION["errors"]['product_name']  : false    ?>
                 </p>
             </div>


             <!--  ===================== Product Price =========== -->

             <div class="form-group">
                 <label> Price : </label>
                 <input 
                 type="number" 
                 name="price" 
                 class="form-control" 
                 placeholder="Price "
                value="<?= $product['price'] ?>">

                 <p class="my-1 p-2 text-danger fw-bold">
                     <?= isset($_SESSION["errors"]['price']) && $input_error  ?
                            $_SESSION["errors"]['price']  : false    ?>
                 </p>

             </div>


             <!--  ===================== Image =========== -->
             <div class="form-group">

                <p> Images :  </p>
                 <input
                    style="display:none;"
                     type="file"
                     multiple
                     name="images[]"
                     class="form-control"
                     id = "upload"
                     >

                     <label for="upload" class="p-1 btn btn-info fw-bold">
                         Upload 
                         <i class="mdi mdi-upload"></i>  
                    </label>

                    <span 
                    class="p-1 btn btn-primary fw-bold edit_image" 
                    data-bs-toggle="modal" 
                    data-bs-target="#edit_image"
                    >
                        Edit
                        <i class="mdi mdi-folder-image">  </i>
                    </span>

                    <!-- ======================= modal image ============= -->
                        <!-- Modal -->
                        <div class="modal fade" id="edit_image" tabindex="-1"     aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                            <div class="modal-content">

                            <div class="modal-body d-flex justify-content-evenly flex-wrap">

                            <?php  foreach( $images as $image_src  ){?>

                                

                            <div 
                            class="child position-relative my-1" 
                            style="width:150px;height:90px"
                            >

                            <img src="assets/images/products/<?=$image_src?>" alt="" class="w-100 h-100">

                            <i 
                            
                            data-image-delete='<?=$image_src?>'
                            data-id="<?=$product['id']?>"
                            class="mdi mdi-close delete_image text-danger bg-dark btn fs-5 fw-bold p-1 position-absolute position-absolute top-0 end-0"></i> 
                            </div>

                     <?php 
                     } ?>

                            <div 
                            id = "delete_mess"
                            style="display:none ;" 
                            class="alert alert-info text-center"> 
                                Not Found Data </div>
                            </div>

                            </div>
                             </div>
                        </div>
                    <!-- ======================== //// =================== -->

                 <p class="my-1 p-2 text-danger fw-bold">
                     <?= isset($_SESSION["errors"]['images']) && $input_error  ?
                            $_SESSION["errors"]['images']  : false    ?>
                 </p>

             </div>
             <!--  ===================== Product brand =========== -->


             <div class="form-group">
                 <label> Brand : </label>

                 <select type="text" name="brand" class="form-control">

                     <?php foreach ($result_brand as $brand) { ?>
                         <option  <?php 
                         
                         if( $product['brand'] == $brand['id'] ){
                            echo "selected";
                         }  
                            
                            
                            ?>    value="<?= $brand['id'] ?>">
                             <?= $brand['brand'] ?>
                         </option>
                     <?php
                        }
                        ?>
                 </select>

             </div>




             <!--  ===================== Stock =========== -->
             <div class="form-group">
                 <label> Stock : </label>
                 <input 
                 type="number" 
                 name="stock" 
                 class="form-control" 
                 placeholder="stock" 
                 value="<?= $product['stock'] ?>"
                 >

                 <p class="my-1 p-2 text-danger fw-bold">
                     <?= isset($_SESSION["errors"]['stock']) && $input_error  ?
                    $_SESSION["errors"]['stock']  : false    ?>
                 </p>
             </div>

             <!-- ////////////////////////////////////////// -->

             <button type="submit" class="btn btn-gradient-info me-2">
                Update
                 <i class="mdi mdi-lead-pencil ms-1 "></i>
             </button>

         </form>



     </div>

 </div>

 <?php unset($_SESSION["errors"])  ?>