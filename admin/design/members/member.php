<?php

$select_pre = "SELECT * FROM pr";
$result_pre  = $conn->query($select_pre);

?>


<div class="container">




    <div class="row">
        <hr>

        <div class="d-flex flex-wrap justify-content-evenly my-3 ">


            <?php
            foreach ($result_pre as $pre) {

                if($pre['id'] == 1 ){
                    continue ;
                }
                 ?>

                <div class="card my-2">

                    <a href="?members=all&pr=<?= $pre['id'] ?>" class="text-decoration-none">
                        <button style="letter-spacing : 3px" class=" p-2 card1 card_add border-none fw-bold text-center text-light">
                            <?= ucwords($pre['name']) ?>
                            <i class="mdi mdi-account"></i>
                        </button>
                    </a>
                </div>


            <?php
            }
            ?>


        </div>

        <hr>


        <div class="text-center mt-4">

            <a href="?members=add">
                <button class=" btn btn-gradient-primary">
                    Add Member
                    <i class="mdi mdi-account-plus ms-2"> </i>
                </button>
            </a>
        </div>

    </div>