<section class="home_enquiry">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="about_info" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="home_form_holder">
                        <!-- action="<?= base_url('contact-us') ?>" -->
                        <form class="enquiry_form" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Name" aria-label="First name" name="name" value="<?= old('name') ?>">
                                    <?php if (session('errors.name')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.name')) ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Mobile No" aria-label="Mobile No" name="number" value="<?= old('number') ?>">
                                    <?php if (session('errors.number')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.number')) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="City" aria-label="City" name="city" value="<?= old('city') ?>">
                                    <?php if (session('errors.city')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.city')) ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" placeholder="Email" aria-label="Email" name="email" value="<?= old('email') ?>">
                                    <?php if (session('errors.email')): ?>
                                        <div class=" error text-danger"><?= esc(session('errors.email')) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <textarea name="message" id="" placeholder="Message"><?= old('message') ?></textarea>
                                    <?php if (session('errors.message')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.message')) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <input type="hidden" name="page_name" value="<?= service('uri')->getPath() ?>">
                                <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                                <div class="col-sm-6">
                                    <button type="submit" class="g-recaptcha" data-sitekey="<?= SITE_KEY ?>" data-callback='onSubmit'>submit <img src="<?= base_url('public/') ?>/assets/img/arrow-long.webp" alt="" class="img-fluid long-arrow"></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="about_more_box">
                        <a href="#">
                            <p>Business</p>
                            <h4>Enquiry</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="home_enquiry_social_btn">
                    <ul>
                        <li><a href="<?= $site_setting->facebook_link ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="<?= $site_setting->twitter_link ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a href="<?= $site_setting->youtube_link ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="<?= $whatsapp_link ?>" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>




<?= $this->section('scripts') ?>
<script>
    // function onSubmit(token) {
    //     // document.getElementById("recaptcha_token").value = token;
    //     // document.getElementsByClassName('enquiry_form')[0].submit();

    //     Swal.fire({
    //         position: "center",
    //         icon: "success",
    //         title: "Data saved",
    //         showConfirmButton: false,
    //         timer: 1500
    //     });
    // }

    // ______________________________________________________

    // Handle reCAPTCHA callback
    function onSubmit(token) {
        // Set the token in the hidden input
        $('#recaptcha_token').val(token);

        // Trigger AJAX form submission
        submitForm();
    }

    // Submit the form via AJAX
    function submitForm() {
        $.ajax({
            url: "api/contact-us", // Replace with your server URL
            type: "POST",
            data: $('.enquiry_form').serialize(),
            success: function(response) {
                if (response.status) {
                    // Show success message and reset form
                    showAlert({
                        title: response.message,
                        icon: "success"
                    });
                    $('.enquiry_form')[0].reset(); // Clear the form

                } else {
                    showAlert({
                        title: response.message,
                        icon: "error"
                    });
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
    $('.enquiry_form').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Trigger reCAPTCHA validation
        grecaptcha.execute();
    });
</script>
<?= $this->endSection() ?>
