<?= $this->section('style') ?>
<style>

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
        <div class="row justify-content-center">
            <!-- Help us connect with you for seamless communication and support. -->
        </div>
        <br>
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
        <br>

        <!-- form  html -->
        <div class="container">
            <form id="warranty_registration_form" method="POST" enctype="multipart/form-data" action="">
                <!-- Step 1: Customer Information -->
                <div class="step-1">
                    <h3>Get Your 10% OFF Coupon!</h3>
                    <p>Fill out the form below and receive your unique code instantly, Show your nearest Leads dealer & enjoy the discount.</p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="full_name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="full_name" name="full_name" value="<?= old('full_name') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.full_name') ?? '' ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="email_address" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email_address" name="email_address" value="<?= old('email_address') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.email_address') ?? '' ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= old('phone_number') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.phone_number') ?? '' ?></p>
                        </div>                        
                    </div>
                </div>                
                <!-- Submit Button -->
                <div class="mt-5 text-end">
                    <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                    <!-- g-recaptcha -->
                    <button class="btn btn-primary g-recaptcha " data-sitekey="<?= SITE_KEY ?>" data-callback='onSubmit1'>Submit</button>
                </div>

            </form>
        </div>


        <!-- new html -->

    </div>
</section>
<!-- mission section end -->

<!-- remove errors -->
<?php
session()->remove('errors');
session()->remove('_ci_old_input');
?>

<!-- our clients start -->
<?= $clientbox ?>
<!--our clients  end -->

<!-- feature icon section start -->
<?= $feature ?>
<!-- feature icon section end -->


<?= $this->section('scripts') ?>

<script>
    // Handle reCAPTCHA callback token

    function onSubmit1(token) {
       
        // Set the token in the hidden input
        $('#recaptcha_token').val(token);

        $('#warranty_registration_form').submit();
    }
</script>

<?= $this->endSection() ?>