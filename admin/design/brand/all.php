<?php

$select_brand = "SELECT * From brand ";

$result_brand = $conn->query($select_brand);


?>



<hr>

<div style="height: 250px; overflow:auto">

<table class="table table-bordered text-center"  >

    <thead >
        <tr>
            <th scope="col">Brand</th>
            <th scope="col"> Product Count </th>
            <th scope="col"> Update </th>
            <th scope="col"> Delete </th>
        </tr>
    </thead>


    <tbody>

        <?php foreach ($result_brand as $brand) { ?>
            <tr>

                <td scope="col"> <?= $brand['brand'] ?></td>

                <td scope="col"> 
                    <?php
                        $brand_id = $brand['id'];
                        $select_products_count  = "SELECT * From products WHERE brand = '$brand_id'";
                        $result_products_count  = $conn->query($select_products_count);
                        $count = $result_products_count -> num_rows ;
                        echo $count ;
                    ?>
                 </td>

                 <td>
                       <a href="?brand=edit&id=<?= $brand['id'] ?>">
                           <i style="font-size:25px;" class="mdi mdi-pencil"> </i> </a>
                   </td>


                   <td >

                       <i 
                       style="font-size: 25px;cursor: pointer;" 
                       class="mdi mdi-delete delete_brand_btn text-danger" 
                       data-id="<?= $brand['id']?>" 
                       data-bs-toggle="modal" 
                       data-bs-target="#delete_brand"> </i>

                   </td>

            </tr>
        <?php } ?>




    </tbody>
</table>

</div>



<!-- ======================= modal delete =========== -->



<div class="modal fade" id="delete_brand" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">

                   <h1 class="modal-title fs-5 text-danger" id="staticBackdropLabel"> Confirm Delete </h1>
               </div>
               <div class="modal-body fw-bold">
                   Do You Sure Delete This Brand ?
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
<!-- ============================== /////////////////// ===================== -->



<div class="text-center my-4"> 
    <button class="btn btn-primary"> Add New Brand  </button>
</div>

<hr>


<div class="text-center my-3"> <span class="h3 bg-danger p-2 text-light rounded fs-bold"> Products By Brand </span> </div>



<?php

foreach ($result_brand as $brand) {

    $brand_id = $brand['id'];

    $select_product_count = "SELECT * FROM products WHERE brand ='$brand_id'";
    $count_product = $conn->query($select_product_count);

    $count_product  =  $count_product->num_rows;


?>


    <div class="col-md-4 col-lg-4">

        <div class="card my-2">

            <a class="card1" href="?products=all&brand=<?= $brand['id'] ?>">

                <h3 class="text-center text-light "> <?= ucwords($brand['brand'])  ?> </h3>

                <p style="letter-spacing : 3px " class="text-center mt-3 fw-bold text-light">
                    Products : <?= $count_product  ?>
                </p>

            </a>
        </div>
    </div>

<?php
}
?>




</div>

<hr>

