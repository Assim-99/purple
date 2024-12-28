// ================= get images with AJAX From PHP ===========;

document.addEventListener("click", function (event) {
  let tag = event.target;

  if (tag.hasAttribute("id")) {
    if (tag.id == "image_icon") {
      $("#slider_parent").empty();

      let id_product = tag.getAttribute("data-id");

      $.ajax({
        url: "design/products/query/get_product_image.php",
        data: { id: id_product },
        method: "post",

        success: function (res) {
          // ============ convert data to array =========;
          let images = JSON.parse(res);

          // ============ view data in slider =========;

          images.forEach(function (image, index) {
            if (index == 0) {
              $("#slider_parent").append(`
                              <div class="carousel-item active " >
                                  <img src="assets/images/products/${image}" class="d-block w-100" style="height:300px">
                              </div>
                      `);
            } else {
              $("#slider_parent").append(`
                          <div class="carousel-item" >
                              <img src="assets/images/products/${image}" class="d-block w-100" style="height:300px">
                          </div>
                  `);
            }
          });
        },
      });
    }
  }
});

// =============== // //////////////////==============;

// =================== pagination ========== ;

function dataPagination(new_num) {
  $.ajax({
    url: "design/products/query/pagination.php",
    data: { pag_num: new_num },
    method: "post",

    beforeSend: function () {
      $(".all_product").hide();
      $("#loading").removeClass("d-none");
    },

    success: function (res) {
      setTimeout(function () {
        let products = JSON.parse(res);

        if (products.length > 0) {
          $("#product_tbody").empty();

          products.forEach(function (product) {
            $("#product_tbody").append(`
                <tr>
                <td> ${product.product_name} </td>
                <td> ${product.price} EGP </td>
                <td> ${product.brand} </td>
                <td> ${product.stock} </td>
                   <td>
                        <i 
                        data-bs-toggle="modal" 
                        data-bs-target="#view_image"
                        data-id="${product.id}" 
                        id='image_icon' 
                        class="mdi mdi-file-image text-success bg-dark p-1 rounded"></i>
                    </td>
                    <td > 
                    <a href="?products=edit&id=${product.id}">
                     <i 
                     style="font-size:25px;" 
                     class="mdi mdi-pencil"
                     > </i> </a>
                </td>
                <td>

                 <i 
                 style="font-size: 25px; cursor: pointer" 
                 class="mdi mdi-delete delete_product_btn text-danger"
                 data-id = "${product.id}"
                 data-bs-toggle="modal" 
                 data-bs-target="#delete_products"
                 >
                 </i>
                </td>


                 
                  </tr>
                `);
          });

          $("#pagination-item").text(new_num);
        }

        $(".all_product").slideDown(300);

        $("#loading").addClass("d-none");
      }, 1100);
    },
  });
}

$("#next-item").on("click", function () {
  let current_num = Number($("#pagination-item").text());

  let new_num = ++current_num;

  dataPagination(new_num);
});

$("#pre-item").on("click", function (event) {
  let current_num = Number($("#pagination-item").text());

  let new_num = --current_num;

  dataPagination(new_num);
});

// ================== // //// // ========= ;

// ====================== Edit Products Image ============ ;

$(".delete_image").on("click", function () {
  let tag = $(this);
  let img_src = $(this).attr("data-image-delete");
  let product_id = $(this).attr("data-id");

  $.ajax({
    url: "design/products/query/delete_product_image.php",
    method: "post",
    data: { product_id, img_src },
    success: function (result) {
      let func_info = result.trim();

      if (func_info == "last image") {
        tag.fadeOut(150);
      } else if (func_info == "remove") {
        tag.parent().fadeOut(150);
      }
    },
  });
});

// ====================== ///////// ============ ;

// =================  deleteTrWithAJAX =============== ;

function deleteTrWithAJAX(id, tr, url) {
  if (id > 0) {
    $.ajax({
      url,
      data: { id },
      method: "post",
      success: function () {
        tr.remove();
      },
    });
  }
}
// ====================== ///////// ============ ;

// ================= product Delete  =============== ;

var product_id = 0;
var product_tr = null;

document.addEventListener("click", function (event) {
  let tag = event.target;

  if (tag.classList.contains("delete_product_btn")) {
    product_id = tag.getAttribute("data-id");
    product_tr = tag.parentElement.parentElement;
  }
});

$("#confirm_delete").on("click", function () {
  deleteTrWithAJAX(
    product_id,
    product_tr,
    "design/products/query/delete_product.php"
  );
});

// ================/////////////=============== ;

// ======================== delete member ============== ;

let member_tr = 0;
let member_id = null;

$(".delete_member_btn").on("click", function () {
  member_id = $(this).attr("data-id");
  member_tr = $(this).parent().parent();
});

$("#confirm_delete").on("click", function () {
  deleteTrWithAJAX(member_id, member_tr, "design/members/action/delete.php");
});

// ======================== ///////////// ============== ;

// ======================== update member ============== ;

var tr_member = "";

$(".update_member_icon").on("click", function () {
  tr_member = $(this).parent().parent();

  let member_id = $(this).data("member-id");

  $.ajax({
    url: "design/members/action/get_member_info.php",
    data: { member_id },
    method: "post",
    success: function (res) {
      let data = JSON.parse(res);

      $("#username_U").val(data.username);
      $("#name_U").val(data.name);
      $("#email_U").val(data.email);
      $("#member_id").val(data.id);

      var opt_U = document.querySelectorAll(".opt_U_M");

      opt_U.forEach(function (ele) {
        let value = ele.getAttribute("value");

        if (data.pr == value) {
          ele.setAttribute("selected", "");
        }
      });
    },
  });
});

$("#form_update_member").on("submit", function (event) {
  event.preventDefault();

  let form_data = new FormData(this);

  $.ajax({
    url: "design/members/action/update_member.php",
    data: form_data,
    processData: false,
    contentType: false,
    method: "post",
    success: function (res) {
      if (res == 1) {
        var username = form_data.get("username");
        var name = form_data.get("name");
        var email = form_data.get("email");
        var pr = form_data.get("pr");

        pr = pr == 2 ? "Admin" : pr;
        pr = pr == 3 ? "User" : pr;

        var ele = $("#form_update_member")
          .parentsUntil(".modal")
          .parent()
          .modal("hide");

        var opt_U = document.querySelectorAll(".opt_U_M");

        opt_U.forEach(function (ele) {
          ele.removeAttribute("selected");
        });

        tr_member.find("#td_username").text(username);
        tr_member.find("#td_name").text(name);
        tr_member.find("#td_email").text(email);
        tr_member.find("#td_pr").text(pr);
      }
    },
  });
});
// ========================///////////============== ;

// ===================== change Image Account ===================== ;

let profile_btn = document.querySelector("#profile_image");

profile_btn.addEventListener("change", function () {
  let profile_image = document.querySelector("#pro_image");

  let error_mess = document.querySelector("#error_mess");

  let file_details = {
    file: this.files[0],
    name: this.files[0].name,
    size: this.files[0].size,
  };

  let allow_type = false;
  let allow_size = true;

  // =================== check From type ============= ;

  let exp = file_details.name.split(".");

  let type = exp[exp.length - 1];

  let image_list = ["jpg", "jpeg", "png"];

  allow_type = image_list.some(function (item) {
    return item.toLowerCase() == type.toLowerCase();
  });

  // ======================== check From size  ============= ;

  if (file_details.size > 2e6) {
    allow_size = false;
  }
  // ===================== show image or show error  ============= ;

  if (allow_size && allow_type) {
    let file_reader = new FileReader();

    file_reader.readAsDataURL(file_details.file);

    file_reader.addEventListener("load", function () {
      profile_image.src = file_reader.result;
    });
  } else {
    error_mess.style.visibility = "visible";
    profile_btn.value = "";
    setTimeout(function () {
      error_mess.style.visibility = "hidden";
    }, 4000);
  }
});

// ==================================================== ;

// ================ Update profile info ============ ;

$("#btn_update_profile").on("click", function () {
  $("#box_profile_info").hide();
  $("#box_change_pass").hide();
  $("#box_update_info").show();
});

$("#form_profile_update").on("submit", function (event) {
  event.preventDefault();
  var send = true;
  var formTag = $(this)[0];

  $("#form_profile_update .inp_profile").each(function (index, ele) {
    if (ele.value == "") {
      $("#error_mess_input").show();
      send = false;
    }
  });

  let username = $("#form_profile_update input[name='username']").val();

  if (username.length < 8) {
    $("#error_mess_username").show();

    send = false;
  }

  $.ajax({
    url: "design/profile/check_username.php",
    data: { username },
    method: "post",
    success: function (res) {
      data = res.trim();

      if (data == "no") {
        $("#error_mess_username_found").show();
        $("#error_mess_username").hide();

        send = false;
      } else {
        $("#error_mess_username_found").hide();
      }
    },
  });

  if (send) {
    let formOb = new FormData(formTag);
    $.ajax({
      url: "design/profile/update.php",
      data: formOb,
      processData: false,
      contentType: false,
      method: "post",
      success: function (res) {
        Swal.fire({
          position: "center",
          icon: "success",
          title: "Your work has been saved",
          showConfirmButton: false,
          timer: 1500,
        });

        setTimeout(function () {
          window.location.reload();
        }, 1550);
      },
    });
  }
});

// =========================================================== ;

// ================ Update profile password  ============ ;

$("#btn_change_pass").on("click", function () {
  $("#box_change_pass").show();
  $("#box_profile_info").hide();
  $("#box_profile_info").hide();
});

$("#form_change_pass").on("submit", function (event) {
  event.preventDefault();

  let pass = $("#form_change_pass input[name='password']").val();

  let Cpass = $("#form_change_pass input[name='C_password']").val();

  let change_pass = true;

  function showError(message) {
    $("#pass_error").text(`${message}`);
    $("#pass_error").show();

    setTimeout(() => {
      $("#pass_error").hide();
    }, 3000);
  }

  $("#form_change_pass input").each(function (index, ele) {
    var vall = ele.value;
    if (vall.length == 0) {
      showError("All Inputs Is Requierd");
      change_pass = false;
    }
  });

  if (pass.length > 0 && pass.length < 8) {
    showError("Must Be More Powerfull  ");
    change_pass = false;
  }

  if (pass !== Cpass) {
    showError("Dosn't Match");
    change_pass = false;
  }

  if (change_pass) {
    $.ajax({
      url: "design/profile/update_pass.php",
      data: { pass: pass },
      method: "post",
      success: function (res) {
        if (res.trim() == "same_pass") {

          showError("same Password");
          
        }else {


          Swal.fire({
            title: "successfully , Please Sign In Again",
            icon: "success",
            draggable: true,
          });
        }
      },
    });
  }
});

// ================ ///////////////////////  ============ ;
