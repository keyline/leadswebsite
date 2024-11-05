$(document).ready(function (params) {
  /* ************************  load more content  *********************** */

  $(".some-list").simpleLoadMore({
    item: ".pkg_item_des",

    count: 9,

    btnHTML: ".load-more-btn",
  });

  /* ************************  load more content  *********************** */

  /* ************************  contact form submit  *********************** */

  $(".bookPkg").on("click", function () {
    var pkg_id = $(this).data("pkg");
    var pkg_name = $(this).data("pkg_name");

    pkg_id ? $("#set_pkg_id").val(pkg_id) : $("#set_pkg_id").val(0);

    pkg_id ? $("#set_pkg_name").val(pkg_name) : $("#set_pkg_name").val("");
  });

  $(".contact_us_btn").on("click", function () {
    $("#set_pkg_id").val(0);
  });

  function sendMail(params = {}) {
    apiCall({
      method: "POST",
      url: "sendMail",
      data: params,
      success: function (response) {
        console.log(response.isError);
      },
    });
  }

  $("#contact_frm").submit(function (e) {
    e.preventDefault();

    let fname = $("#contact_frm [name='fname']").val();
    let lname = $("#contact_frm [name='lname']").val();
    let phone = $("#contact_frm [name='phone']").val();
    let email = $("#contact_frm [name='email']").val();
    let destination = $("#contact_frm [name='destination']").val();
    let month = $("#contact_frm [name='month']").val();
    let pax = $("#contact_frm [name='pax']").val();
    let vacation_type = $("#contact_frm [name='vacation_type']").val();
    let pkg_id = $("#contact_frm [name='pkg_id']").val();

    if (pax < 1) {
      Swal.fire({
        position: "center",

        icon: "warning",

        text: "Minimum one person",

        showConfirmButton: false,

        timer: 1500,
      });
      return false;
    }

    let dataObj = {
      fname: fname,
      lname: lname,
      phone: phone,
      email: email,
      destination: destination,
      month: month,
      pax: pax,
      vacation_type: vacation_type,
      pkg_id: pkg_id,
    };

    apiCall({
      method: "POST",
      url: "enquire",
      data: dataObj,

      success: function (response) {
        if (!response.isError) {
          Swal.fire({
            position: "center",

            icon: "success",

            text: response.message,

            showConfirmButton: false,

            timer: 1500,
          });

          // $("#book-now-modal").hide();

          // $("#book-now-modal").modal("toggle");

          $("#book-now-modal").modal("hide");
          sendMail(dataObj);
        } else {
          Swal.fire({
            position: "center",

            icon: "warning",

            text: response.message,

            showConfirmButton: false,

            timer: 1500,
          });
        }
      },
    });
  });

  /* ************************  contact form submit  *********************** */

  /* ************************  Subscribe  *********************** */

  $("#basic-addon2").click(function () {
    const emailInput = $("#subscribe_email");

    let subscribe_email = emailInput.val().trim().replace(/\s/g, "");

    apiCall({
      method: "POST",

      url: "subscribe",

      data: { email: subscribe_email },

      success: function (response) {
        emailInput.val("");

        emailInput.attr("placeholder", "Enter your Mail Id");

        if (!response.isError) {
          Swal.fire({
            position: "center",

            icon: "success",

            text: response.message,

            showConfirmButton: false,

            timer: 1500,
          });
        } else {
          Swal.fire({
            position: "center",

            icon: "warning",

            text: response.message,

            showConfirmButton: false,

            timer: 1500,
          });
        }
      },
    });
  });

  /* ************************  Subscribe  *********************** */
});
