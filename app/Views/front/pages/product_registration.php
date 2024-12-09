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
                    <h3>Customer Information</h3>
                    <p>Help us connect with you for seamless communication and support.</p>
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
                        <div class="col-md-6">
                            <label for="street_address" class="form-label">Street Address</label>
                            <input type="text" class="form-control" id="street_address" name="street_address" value="<?= old('street_address') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.street_address') ?? '' ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="<?= old('city') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.city') ?? '' ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" value="<?= old('state') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.state') ?? '' ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="zip_code" class="form-label">ZIP Code</label>
                            <input type="text" class="form-control" id="zip_code" name="zip_code" value="<?= old('zip_code') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.zip_code') ?? '' ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="country" name="country" value="<?= old('country') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.country') ?? '' ?></p>
                        </div>

                    </div>
                </div>

                <!-- Step 2: Product Information -->
                <div class="step-2 mt-5">
                    <h3>Product Information</h3>
                    <p>Activate your warranty and enjoy premium support by registering your product.</p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="product_type" class="form-label">Product Type</label>
                            <select class="form-select" id="product_type" name="product_type" required>
                                <option value="" selected disabled>Select Product Type</option>
                                <?php if (count($productCategory)) {
                                    foreach ($productCategory as $category) { ?>
                                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                <?php }
                                }  ?>
                            </select>
                            <p class="text-danger error" id="name-error"><?= session('errors.product_type') ?? '' ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="model_number" class="form-label">Model Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="model_number" name="model_number" value="<?= old('model_number') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.model_number') ?? '' ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="serial_number" class="form-label">Serial Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="serial_number" name="serial_number" value="<?= old('serial_number') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.serial_number') ?? '' ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="date_of_purchase" class="form-label">Date of Purchase</label>
                            <input type="date" class="form-control" id="date_of_purchase" name="date_of_purchase" max="<?= date('Y-m-d') ?>" value="<?= old('date_of_purchase') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.date_of_purchase') ?? '' ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="barcode_photo" class="form-label">Barcode Sticker Photo</label>
                            <input type="file" class="form-control" id="barcode_photo" name="barcode_photo" accept=".jpg,.png">
                            <p class="text-danger error" id="name-error"><?= session('errors.barcode_photo') ?? '' ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="place_of_purchase" class="form-label">Place of Purchase</label>
                            <input type="text" class="form-control" id="place_of_purchase" name="place_of_purchase" value="<?= old('place_of_purchase') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.place_of_purchase') ?? '' ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="invoice_number" class="form-label">Invoice Number (Optional)</label>
                            <input type="text" class="form-control" id="invoice_number" name="invoice_number" value="<?= old('invoice_number') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.invoice_number') ?? '' ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="purchase_invoice" class="form-label">Upload Purchase Invoice</label value="<?= old('purchase_invoice') ?>">
                            <input type="file" class="form-control" id="purchase_invoice" name="purchase_invoice" accept=".jpg,.png,.pdf">
                            <p class="text-danger error" id="name-error"><?= session('errors.purchase_invoice') ?? '' ?></p>
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


<!-- home enquiry start -->
<?= $enquiry ?>
<!-- home enquiry end -->

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