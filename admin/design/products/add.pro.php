
    <!-- ============================= PHP Work =================== -->
<?php

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
            enctype = "multipart/form-data"
            action="design/products/query/insert.php"
            class="forms-sample"       
         >
            <!-- ===================== Form Inputes ============== -->


                <!--  ===================== Product Name =========== -->
                    <div class="form-group">
                        <label> Product Name : </label>
                        <input type="text" name="product_name" class="form-control" placeholder="Product Name " value="<?= isset($product_name) ? $product_name : ""  ?>">


                        <p class="my-1 p-2 text-danger fw-bold">
                            <?= isset($_SESSION["errors"]['product_name']) && $input_error  ?
                                $_SESSION["errors"]['product_name']  : false    ?>
                        </p>


                    </div>


                <!--  ===================== Product Price =========== -->

                    <div class="form-group">
                        <label> Price : </label>
                        <input type="number" name="price" class="form-control" placeholder="Price " value="<?= isset($price) ? $price : ""  ?>">

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


                
                        <p class="my-1 p-2 text-danger fw-bold">
                            <?= isset($_SESSION["errors"]['image']) && $input_error  ?
                                $_SESSION["errors"]['image']  : false    ?>
                        </p>
                
                    </div>
                <!--  ===================== Product brand =========== -->


                    <div class="form-group">
                        <label> Brand : </label>

                        <select type="text" name="brand" class="form-control">

                            <?php foreach ($result_brand as $brand) { ?>
                                <option value="<?= $brand['id'] ?>">
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
                        <input type="number" name="stock" class="form-control" placeholder="stock" value="<?= isset($stock) ? $stock : ""  ?>">
                        <p class="my-1 p-2 text-danger fw-bold">
                            <?= isset($_SESSION["errors"]['stock']) && $input_error  ?
                                $_SESSION["errors"]['stock']  : false    ?>
                        </p>
                    </div>

            <!-- ////////////////////////////////////////// -->

            <button type="submit" class="btn btn-gradient-primary me-2">
                Add New
                <i class="mdi mdi-bookmark-plus ms-1 "></i>
            </button>

        </form>



    </div>

</div>

