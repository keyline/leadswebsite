<?= $this->section('style') ?>
<style>
    .ponit {
        cursor: pointer;
    }

    .modal-header {
        border-bottom: none;
    }

    .modal-title {
        font-size: 18px;
        font-weight: bold;
    }

    .form-control {
        border-radius: 0;
        border: 1px solid #000;
    }

    .btn-primary {
        background-color: #000;
        border: none;
        border-radius: 0;
    }

    .btn-primary:hover {
        background-color: #333;
    }
</style>
<?= $this->endSection() ?>

<!-- inner page banner start -->
<section class="inner_banner inner_floting_box_banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="inner_floting_box">
                    <div class="about_more_box">
                        <div class="mission_tabs">
                            <h4><?= $page_header ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- inner page banner end -->

<?php if ($session->getFlashdata('success_message')) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> <?php echo $session->getFlashdata('success_message'); ?>
    </div>
<?php } ?>
<?php if ($session->getFlashdata('error_message')) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> <?php echo $session->getFlashdata('error_message'); ?>
    </div>
<?php } ?>

<!-- mission section start -->
<section class="contact_section">
    <div class="container">
        <div class="row justify-content-center">

            <?php if (count($productCategory)) {
                foreach ($productCategory as $key => $category) { ?>

                    <div class="col-md-4 ponit product_parent" data-id="<?= $category->id ?>">
                        <div class="blog_list_item">

                            <div class="blogitem_img">
                                <img src="<?= base_url('public/') ?>/assets/img/<?= AMC_BANNER[$category->id] ?>" alt="Professional Career Counseling: Advancing in Your Career" style="height: 300px;">
                            </div>

                            <div class="blogitem_detials">
                                <ul class="blogitem_cat">
                                    <li><?= $category->name ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>


            <?php }
            } ?>
        </div>

    </div>
</section>
<!-- mission section end -->


<!-- our clients start -->
<?= $clientbox ?>
<!--our clients  end -->

<!-- feature icon section start -->
<?= $feature ?>
<!-- feature icon section end -->


<!-- home enquiry start -->
<?= $enquiry ?>
<!-- home enquiry end -->



<!-- The Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="applyModalLabel"> AMC Request </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Form content goes here as described before -->
                <form id="jobApply" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputProduct" class="form-label">Product</label>
                        <select id="inputProduct" class="form-select" name="product_id" required>
                            <option selected value="">Choose...</option>
                        </select>
                        <p class="text-danger error" id="fname-error"></p>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputName" name="name">
                        <p class="text-danger error" id="name-error"></p>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="email">
                        <p class="text-danger error" id="email-error"></p>
                    </div>
                    <div class="form-group">
                        <label for="input16" class="form-label">Comments</label>
                        <textarea class="form-control" name="comments" id="input16" rows="5"></textarea>
                        <p class="text-danger error" id="comments-error"></p>
                    </div>

                    <input type="hidden" name="recaptcha_token" id="recaptcha_token3">
                    <button type="submit" class="btn btn-primary g-recaptcha" data-sitekey="<?= SITE_KEY ?>" style="background-color: #ed1c24;" data-callback='onSubmit3'>SUBMIT</button>
                </form>
            </div>
            <!-- Modal Footer -->

            <!-- <div class="modal-footer">
               
            </div> -->
        </div>
    </div>
</div>






<?= $this->section('scripts') ?>

<script>
    function loadProduct(product_id) {
        $.ajax({
            url: "api/get-products",
            type: "POST",
            data: {
                'product_id': product_id
            },
            success: function(response) {
                if (response.status) {
                    let html = '<option selected value="">Choose...</option>';
                    response.product.forEach((product) => {
                        html += `<option value="${product.id}">${product.product_title}</option>`;
                    });

                    $("#inputProduct").html(html);
                    $("#applyModal").modal('show');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }


    // form submit 

    // Handle reCAPTCHA callback
    function onSubmit3(token) {
        // Set the token in the hidden input
        $('#recaptcha_token3').val(token);

        // Trigger AJAX form submission
        submitForm3();
    }


    // Submit the form via AJAX
    function submitForm3() {
        var formData = new FormData($("#jobApply")[0]);

        $.ajax({
            url: "api/amc-request",
            type: "POST",
            data: formData, //$('#jobApply').serialize(),
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status) {
                    // Show success message and reset form
                    showAlert({
                        title: response.message,
                        icon: "success"
                    });
                    $('#jobApply')[0].reset(); // Clear the form
                    $("#applyModal").modal('hide');
                } else {
                    if (response.errors) {
                        // Loop through each error and display it in the corresponding element if it exists
                        for (const [field, message] of Object.entries(response.errors)) {
                            const errorElement = document.getElementById(`${field}-error`);
                            if (errorElement && message) {
                                errorElement.textContent = message;
                            }
                        }

                    } else {
                        showAlert({
                            title: response.message,
                            icon: "error"
                        });
                    }

                }
                grecaptcha.reset(); // Reset the reCAPTCHA widget
            },
            error: function(xhr, status, error) {
                // Show error message
                showAlert({
                    title: "An error occurred. Please try again.",
                    icon: "error",
                    timer: 2000
                });
                console.error(error); // Log the error for debugging
            }
        });
    }

    // Attach event listener to form submission button
    $('#jobApply').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Trigger reCAPTCHA validation
        grecaptcha.execute();
    });



    $(document).ready(function() {
        $(".product_parent").on('click', function() {
            let product_id = $(this).data('id');
            loadProduct(product_id);
        });
    })
</script>

<?= $this->endSection() ?>