   <!-- ================= SELECT Data =============== -->

   <?php

    if (isset($_GET['brand'])) {

        $brand_id = $_GET['brand'];

        $select_products = "SELECT * FROM products WHERE brand = '$brand_id' LIMIT 4 ";
    } else {

        $select_products = "SELECT * FROM products  LIMIT 4 ";
    }


    $result_products = $conn->query($select_products);

    ?>
   <!-- =============== /////////// ============= -->


   <style>
       /* From Uiverse.io by adamgiebl */
       .dots-container {
           display: flex;
           align-items: center;
           justify-content: center;
           height: 100%;
           width: 100%;
       }

       .dot {
           height: 20px;
           width: 20px;
           margin-right: 10px;
           border-radius: 10px;
           background-color: #b3d4fc;
           animation: pulse 1.5s infinite ease-in-out;
       }

       .dot:last-child {
           margin-right: 0;
       }

       .dot:nth-child(1) {
           animation-delay: -0.3s;
       }

       .dot:nth-child(2) {
           animation-delay: -0.1s;
       }

       .dot:nth-child(3) {
           animation-delay: 0.1s;
       }

       @keyframes pulse {
           0% {
               transform: scale(0.8);
               background-color: #b3d4fc;
               box-shadow: 0 0 0 0 rgba(178, 212, 252, 0.7);
           }

           50% {
               transform: scale(1.2);
               background-color: #6793fb;
               box-shadow: 0 0 0 10px rgba(178, 212, 252, 0);
           }

           100% {
               transform: scale(0.8);
               background-color: #b3d4fc;
               box-shadow: 0 0 0 0 rgba(178, 212, 252, 0.7);
           }
       }
   </style>


   <!-- ================= View Data ============== -->


   <div id="loading" style="position: relative; height:295px " class="my-5 py-5 d-none">

       <section class="dots-container">
           <div class="dot"></div>
           <div class="dot"></div>
           <div class="dot"></div>
           <div class="dot"></div>
           <div class="dot"></div>
       </section>


   </div>


   <hr>

   <table class="table table-bordered  text-center   my-5 all_product">


       <thead class="">

           <tr>

               <th> Product Name </th>

               <th> Price </th>

               <th> Brand </th>

               <th> Stock </th>

               <th> Image </th>

               <th> Update </th>

               <th> Delete </th>



           </tr>
       </thead>

       <tbody id="product_tbody">

           <?php
    
            foreach ($result_products as $product) {?>
               <tr>
                   <td> <?= $product['product_name']  ?> </td>

                   <td> <?= $product['price'] ?> EGP </td>

                   <!--   ============== Select From Brand ======= -->

                   <td>
                       <?php $id_brand = $product['brand'];

                        $select_brand = "SELECT brand FROM brand WHERE id = '$id_brand'";
                        $rersult_brand = $conn->query($select_brand);
                        $brand = $rersult_brand->fetch_assoc();

                        echo $brand['brand'];
                        ?>
                   </td>

                   <!--   ============// Select From Brand // ===== -->

                   <td> <?= $product['stock']  ?> </td>




                   <td>


                           <i 
                           data-bs-toggle="modal" 
                           data-bs-target="#view_image"
                           data-id="<?= $product['id'] ?>" 
                           id="image_icon" 
                           class="mdi mdi-file-image text-success bg-dark p-1 rounded"></i>
                       
                   </td>


                   <td>
                       <a href="?products=edit&id=<?= $product['id'] ?>">
                           <i style="font-size:25px;" class="mdi mdi-pencil"> </i> </a>
                   </td>


                   <td >

                       <i style="font-size: 25px;cursor: pointer;" class="mdi mdi-delete delete_product_btn text-danger" data-id="<?= $product['id'] ?>" data-bs-toggle="modal" data-bs-target="#delete_products"> </i>

                   </td>



               </tr>
           <?php
            }
            ?>





       </tbody>

   </table>
   <!-- ================// ///////// //============ -->



   <!-- ================  pagination ============  -->
   <nav aria-label="Page navigation example mt-5">

       <ul class="pagination justify-content-center">

           <li id="pre-item" class="page-item ">
               <button class="page-link "> Previous </button>
           </li>

           <li class="page-item">
               <button class="page-link" id="pagination-item"> 1 </button>
           </li>

           <li class="page-item ">
               <button id="next-item" class="page-link "> Next </button>
           </li>

       </ul>
   </nav>

   <!-- ==============//////==========  -->



   <!--  ================ slider For Image ========= -->

   <!-- Modal -->
   <div class="modal fade" id="view_image" tabindex="-1" aria-labelledby="view_imageLabel" aria-hidden="true">
       <div class="modal-dialog">


           <div class="modal-content">

               <div class="modal-body">

                   <div id="carouselExample" class="carousel slide">


                       <div class="carousel-inner" id="slider_parent">

                       </div>



                       <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">

                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                           <span class="visually-hidden">Previous</span>
                       </button>

                       <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                           <span class="visually-hidden">Next</span>
                       </button>
                   </div>




               </div>
           </div>
       </div>
   </div>
   <!--  ==============// //////////////// //======= -->





   <!-- ==================== modal for delete ======== -->

   <div class="modal fade" id="delete_products" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">

                   <h1 class="modal-title fs-5 text-danger" id="staticBackdropLabel"> Confirm Delete </h1>
               </div>
               <div class="modal-body fw-bold">
                   Do You Sure Delete This Product ?
               </div>
               <div class="modal-footer">

                   <button id="confirm_delete" type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">
                       Yas Sure
                   </button>
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No ! </button>

               </div>
           </div>
       </div>
   </div>


   <!-- ==================== ////////////////////// ======== -->