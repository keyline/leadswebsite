<?= $this->section('style') ?>
<style>
    .point {
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




    /* Individual content-box styling */
    .content-box {
        background-color: #f8f9fa;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    /* Title styling */
    .content-title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    /* Description styling */
    .content-description {
        font-size: 16px;
        color: #555;
        line-height: 1.6;
        margin: 0;
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
<!-- mission section start -->
<section class="contact_section">
    <div class="container">
        <div class="row justify-content-center" id="view_content">
            <div class="row">
                <?php if (count($vacancy)) {
                    foreach ($vacancy as $job) { ?>
                        <div class="col-md-12 mb-4">
                            <div class="content-box">
                                <h2 class="content-title"><?= $job->name ?></h2>
                                <p class="content-description">
                                    <?= $job->msg ?>
                                </p> <br>
                                <span><a class="point apply" data-name='<?= $job->name ?>' data-id='<?= $job->id ?>'><big>Apply here</big></a></span>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <h3>No requirement</h3>
                    <p>Can’t find any openings for your role?
                        Drop us a line, and be first in line. </p>
                    <span><a class="point apply" data-name='No openings' data-id='0'><big>Apply here</big></a></span>
                <?php } ?>
            </div>
        </div>
        <br>
        <!-- <button id="load_more_btn" style="float: right;background-color:#ed1c24;border: tomato;" class="btn btn-primary">Load More</button> -->


    </div>
</section>
<!-- mission section end -->






<!-- The Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="applyModalLabel">Apply here for <br> <small class="jobName"></small></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Form content goes here as described before -->
                <form id="jobApply" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" class="form-control" name="fname" placeholder="First Name">
                        <p class="text-danger error" id="fname-error"></p>
                    </div>
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" class="form-control" name="lname" placeholder="Last Name">
                        <p class="text-danger error" id="lname-error"></p>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <p class="text-danger error" id="email-error"></p>
                    </div>
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="tel" class="form-control" name="phone" placeholder="Phone">
                        <p class="text-danger error" id="phone-error"></p>
                    </div>
                    <div class="form-group">
                        <label>Educational Qualification:</label>
                        <input type="text" class="form-control" name="qualification" placeholder="Educational Qualification">
                        <p class="text-danger error" id="qualification-error"></p>
                    </div>
                    <div class="form-group">
                        <label>Years of Experience:</label>
                        <input type="text" class="form-control" name="experience" placeholder="Years of Experience">
                        <p class="text-danger error" id="experience-error"></p>
                    </div>
                    <div class="form-group">
                        <label>Attach your latest CV:</label>
                        <input type="file" class="form-control-file" name="file" accept="application/pdf" required>
                        <p class="text-danger error" id="file-error"></p>
                    </div>

                    <input type="hidden" id="job" name="job" value="">
                    <input type="hidden" name="recaptcha_token" id="recaptcha_token">

                    <button type="submit" class="btn btn-primary g-recaptcha" data-sitekey="<?= SITE_KEY ?>"  style="background-color: #ed1c24;" data-callback='onSubmit'>SUBMIT</button>
                </form>
            </div>
            <!-- Modal Footer -->
    
            <!-- <div class="modal-footer">
               
            </div> -->
        </div>
    </div>
</div>



<!-- ============ -->




<!-- our clients start -->
<?= $clientbox ?>
<!--our clients  end -->

<!-- feature icon section start -->
<?= $feature ?>
<!-- feature icon section end -->


<!-- home enquiry start -->
<?= $enquiry ?>
<!-- home enquiry end -->

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $(".apply").on('click', function() {
            $(".error").text('');
            const job_id = $(this).data('id');
            const name = $(this).data('name');
            $(".jobName").text(name);
            $("#job").val(job_id);

            $("#applyModal").modal('show');
        });


        // form submit 

        // Handle reCAPTCHA callback
        function onSubmit(token) {
            // Set the token in the hidden input
            $('#recaptcha_token').val(token);

            // Trigger AJAX form submission
            submitForm();
        }

        // Submit the form via AJAX
        function submitForm() {
            var formData = new FormData($("#jobApply")[0]);

            var file = formData.get('file');


            if (file) {

                var fileSize = file.size;

                var fileSizeInMB = (fileSize / (1024 * 1024)).toFixed(2); // Size in MB

                // console.log('File Size (MB):', fileSizeInMB);


                var maxSizeInMB = 5; // Example: 5 MB max size
                if (fileSizeInMB > maxSizeInMB) {
                    showAlert({
                        title: 'File is too large. Maximum size is ' + maxSizeInMB + ' MB.',
                        icon: "error"
                    });
                    return; // Stop the form submission
                }
            }

            $.ajax({
                url: "api/apply-job",
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
            // submitForm();
            // Trigger reCAPTCHA validation
            grecaptcha.execute();
        });


    });
</script>
<?= $this->endSection() ?>