<?php

// =============== select owner =========== ;


if (isset($_GET['pr'])) {

    $pre = $_GET['pr'];

    $select_members = "SELECT * From members where pr = '$pre'";


} else {

    $select_members = "SELECT * From members";
  
}


$result_members = $conn->query($select_members);



// =============== //////////// =========== ;

?>




<table class="table table-bordered text-center">

    <thead>
        <tr>
            <th scope="col"> #ID </th>
            <th scope="col"> User Name </th>
            <th scope="col"> Name </th>
            <th scope="col"> E-mail</th>
            <th scope="col"> Privileges </th>
            <th scope="col"> Date Register </th>
            <th scope="col"> Update </th>
            <th scope="col"> Delete </th>

        </tr>
    </thead>

    <tbody>



        <?php
        $counter = 0;
        foreach ($result_members as $member) {
            if ($member['pr'] == 1) {
                continue;
            }
            $counter++;
        ?>
            <tr>

                <td scope="col"><?= $counter ?></td>
                <td scope="col" id="td_username"><?= $member['username'] ?></td>
                <td scope="col" id="td_name"><?= $member['name'] ?></td>
                <td scope="col" id="td_email"><?= $member['email'] ?></td>

                <td scope="col" id="td_pr"> <?php

                                    $pri_id = $member['pr'];


                                    $select_pri = "SELECT * From pr WHERE id = '$pri_id'";


                                    $result_pri = $conn->query($select_pri);


                                    $pri = $result_pri->fetch_assoc();
                                    echo ucwords($pri['name']);

                                    ?>
                </td>


                <td  scope="col"><?= $member['date_reg'] ?></td>


                <?php

                if ($_SESSION['admin_token']['pr'] < $member['pr']) { ?>

                    <td>
                        <i data-member-id="<?= $member['id'] ?>" style="cursor: pointer; font-size: 20px" data-bs-toggle="modal" data-bs-target="#update_member" class=" update_member_icon mdi mdi-pencil text-info"> </i>
                    </td>

                <?php
                } else { ?>

                    <td colspan="2">
                        <p style="cursor: pointer; user-select:none;" class="text-secondary fw-bold bg-dark p-1 rounded "> Not Allow </p>
                    </td>
                <?php

                }
                ?>

                <?php

                if ($_SESSION['admin_token']['pr'] < $member['pr']) { ?>
                    <td>
                       
                            <i 
                            class="delete_member_btn text-danger mdi mdi-delete" 
                            data-id="<?=$member['id']?>"
                            data-bs-toggle="modal" 
                            data-bs-target="#delete_member"  
                        style="font-size: 20px; cursor: pointer;" > </i> 
                    </td>


                <?php
                }

                ?>




            </tr>
        <?php }  ?>
    </tbody>
</table>






<!-- ======================== Update Members ==========  -->

<!-- Modal -->

<div class="modal fade" id="update_member" data-bs-keyboard="false" tabindex="-1" aria-labelledby="update_memberLabel" aria-hidden="true">


    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="update_memberLabel"> Update Member </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form id="form_update_member"  method="post" enctype="multipart/form-data" action="design/members/action/insert.php" class="forms-sample">
                    <!-- ===================== Form Inputes ============== -->

                    <input type="hidden" name="id" value="" id="member_id">

                    <!--  ===================== user Name =========== -->
                    <div class="form-group">
                        <label> User Name : </label>
                        <input 
                        id="username_U"
                        autocomplete="off" 
                        type="text" name="username" class="form-control" placeholder=" User Name ">
                    </div>


                    <!--  ===================== Name =========== -->
                    <div class="form-group">
                        <label> Name : </label>
                        <input
                        id="name_U"

                         autocomplete="off" type="text" name="name" class="form-control" placeholder="Name">


                    </div>


                    <!--  ===================== email =========== -->
                    <div class="form-group">
                        <label> E-mail : </label>
                        <input 
                        id="email_U"

                        autocomplete="off" type="email" name="email" class="form-control" placeholder="Email">
                    </div>




                    <div class="form-group">

                        <label> Privileges : </label>

                        <select  class="form-control" style="height: 40px; text-align:center;" name="pr">

                            <option class="opt_U_M"   value="2"> Admin </option>
                            <option class="opt_U_M"   value="3"> User </option>
 
                        </select>

                    </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-gradient-primary me-2">
                    Update
                    <i class="mdi mdi-bookmark-pencil ms-1 "></i>
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- ======================= modal delete ============== -->

<div class="modal fade" id="delete_member" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h1 class="modal-title fs-5 text-danger" id="staticBackdropLabel"> Confirm Delete </h1>
      </div>
      <div class="modal-body fw-bold">
        Do You Sure Delete This Member ? 
      </div>
      <div class="modal-footer">
        <button 
        id="confirm_delete"
        type="button" 
        class="btn btn-primary" 
        data-bs-dismiss="modal" 
        aria-label="Close">
         Yas Sure
         </button>
        <button 
        type="button" 
        class="btn btn-secondary" 
        data-bs-dismiss="modal"
        > No ! </button>

      </div>
    </div>
  </div>
</div>