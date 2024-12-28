<?php

$select_brand = "SELECT * FROM brand";
$result_brand = $conn->query($select_brand);



?>





<div class="container">


    <div class="row">

        <hr>
        <div class="d-flex justify-content-evenly my-3 ">

            <div class="card my-2">

                <a href="?products=all" class="text-decoration-none" >
                    <button style="letter-spacing : 2px " class="card1 card_add border-none fw-bold text-center text-light">
                        All Products
                        <i class="mdi mdi-menu"></i>

                    </button>
                </a>
            </div>

            <div class="card my-2">

                <a href="?products=add" class="text-decoration-none">
                    <button style="letter-spacing : 2px " class="card1 card_add border-none fw-bold text-center text-light">

                        Add New Products
                        <i class="mdi mdi-plus"></i>

                    </button>
                </a>
            </div>

        </div>

      

</div>