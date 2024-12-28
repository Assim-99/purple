<?php

$select_slider = "SELECT * FROM site_slider";
$result_slider = $conn->query($select_slider);

?>


<div class="row">

    <h2 class="text-center my-2"> Slider Setting </h2>
    <hr>
    <div class="text-end" >
    <button class="btn btn-success"> Add New </button>
    </div>
    <?php
    foreach($result_slider as $slider) { ?>

        <div class="col-md-4">

            <div class="card">
                <img src="assets/images/dashboard/<?=$slider['image']?>" class="card-img-top" alt="...">
                <div class="card-body">

                    <div class="card-text">
                        <span class="text-danger fw-bold fs-6">Title :

                        </span> <?=$slider['title']?>
                    </div>
                    <hr>
                    <div class="card-text">
                        <span class="text-danger fw-bold fs-6">Caption :

                        </span><?=$slider['caption']?>
                    </div>

                    <div class="text-center my-2">
                        <button class="btn btn-info w-100 my-2"> Edit </button>
                        <button class="btn btn-danger w-100 my-2"> Delete </button>
                    </div>

                </div>
            </div>

        </div>

        <?php
    }
    ?>
</div>