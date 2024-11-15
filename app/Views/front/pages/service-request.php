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
            In Quality and after sale service: LEADS has a long experience in the field of Domestic water purifier & commercial water treatment plant as well as a strong setup also prepared to provide prompt and proper after sales service in kitchen chimneys and others home appliances section. We are very much conscious about quality, always prefer to use good companies components like ,PHILIPS, DOW,CSM, KEMFLOW, GADSON, and others reputed brand of INDIA and aboard. We have a highly skilled and qualified service engineer and development team. A highly motivated and technically sound service engineers are always ready to provide after sale service.
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
        <div class="row">
            <div class="col-md-12">Dealership Enquiry</div>

            <div class="col-md-12">
                <div class="form_style">

                    <form id="service_request" class="row g-3" action="" method="post">

                        <div class="col-md-6">
                            <label for="input1" class="form-label">Name &nbsp;<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="input1" value="<?= old('name') ?>">
                            <p class="text-danger error" id="name-error"><?= session('errors.name') ?? '' ?></p>
                        </div>

                        <div class="col-md-6">
                            <label for="input2" class="form-label">Address &nbsp;<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address" id="input2" value="<?= old('address') ?>">
                            <p class="text-danger error" id="address-error"><?= session('errors.address') ?? '' ?></p>
                        </div>

                        <div class="col-md-6">
                            <label for="input3" class="form-label">Landmark</label>
                            <input type="text" class="form-control" name="landmark" id="input3" value="<?= old('landmark') ?>">
                            <p class="text-danger error" id="landmark-error"><?= session('errors.landmark') ?? '' ?></p>
                        </div>

                        <div class="col-md-6">
                            <label for="input4" class="form-label">District</label>
                            <input type="text" class="form-control" name="district" id="input4" value="<?= old('district') ?>">
                            <p class="text-danger error" id="district-error"><?= session('errors.district') ?? '' ?></p>
                        </div>

                        <div class="col-md-6">
                            <label for="input5" class="form-label">State</label>
                            <input type="text" class="form-control" name="state" id="input5" value="<?= old('state') ?>">
                            <p class="text-danger error" id="state-error"><?= session('errors.state') ?? '' ?></p>
                        </div>

                        <div class="col-md-6">
                            <label for="input6" class="form-label">Phone No &nbsp;<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="phone" id="input6" value="<?= old('phone') ?>">
                            <p class="text-danger error" id="phone-error"><?= session('errors.phone') ?? '' ?></p>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Product &nbsp;<span class="text-danger">*</span></label>
                            <?php if (count($productCategory)) {
                                foreach ($productCategory as $key => $category) { ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="product_category_id[]" id="input_<?= $key ?>" value="<?= $category->id ?>" <?= in_array($category->id, old('product_category_id.*', [])) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="input_<?= $key ?>"><?= $category->name ?></label>
                                    </div>
                            <?php }
                            } ?>
                            <p class="text-danger error" id="product_category_id-error"><?= session('errors.product_category_id') ?? '' ?></p>
                        </div>

                        <div class="col-md-6">
                            <label for="input10" class="form-label">Model Name &nbsp;<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="model_name" id="input10" value="<?= old('model_name') ?>">
                            <p class="text-danger error" id="model_name-error"><?= session('errors.model_name') ?? '' ?></p>
                        </div>

                        <div class="col-md-6">
                            <label for="input11" class="form-label">Serial No &nbsp;<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="serial_no" id="input11" value="<?= old('serial_no') ?>">
                            <p class="text-danger error" id="serial_no-error"><?= session('errors.serial_no') ?? '' ?></p>
                        </div>

                        <div class="col-md-6">
                            <label for="input12" class="form-label">Installation Date &nbsp;<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="installation_date" id="input12" value="<?= old('installation_date') ?>">
                            <p class="text-danger error" id="installation_date-error"><?= session('errors.installation_date') ?? '' ?></p>
                        </div>

                        <div class="col-md-6">
                            <label for="input13" class="form-label">Purchase Date &nbsp;<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="purchase_date" id="input13" value="<?= old('purchase_date') ?>">
                            <p class="text-danger error" id="purchase_date-error"><?= session('errors.purchase_date') ?? '' ?></p>
                        </div>

                        <div class="col-md-6">
                            <label for="input14" class="form-label">Name of the Dealer / Distributor You Purchased From</label>
                            <input type="text" class="form-control" name="dealer_name" id="input14" value="<?= old('dealer_name') ?>">
                            <p class="text-danger error" id="dealer_name-error"><?= session('errors.dealer_name') ?? '' ?></p>
                        </div>

                        <div class="col-md-6">
                            <label for="input15" class="form-label">Dealer Phone No</label>
                            <input type="text" class="form-control" name="dealer_phone" id="input15" value="<?= old('dealer_phone') ?>">
                            <p class="text-danger error" id="dealer_phone-error"><?= session('errors.dealer_phone') ?? '' ?></p>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">I am Interested to Work as</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="work_as" id="input17" value="stockist" <?= old('work_as') == 'stockist' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="input17">Stockist</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="work_as" id="input18" value="distributor" <?= old('work_as') == 'distributor' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="input18">Distributor</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="work_as" id="input19" value="dealer" <?= old('work_as') == 'dealer' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="input19">Dealer</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="work_as" id="input20" value="retailer" <?= old('work_as') == 'retailer' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="input20">Retailer</label>
                            </div>
                            <p class="text-danger error" id="work_as-error"><?= session('errors.work_as') ?? '' ?></p>
                        </div>

                        <div class="col-md-12">
                            <label for="input16" class="form-label">Comments</label>
                            <textarea class="form-control" name="comments" id="input16" rows="5"><?= old('comments') ?></textarea>
                            <p class="text-danger error" id="comments-error"><?= session('errors.comments') ?? '' ?></p>
                        </div>

                        <div class="col-12">
                            <!-- g-recaptcha -->
                            <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                            <button class="btn btn-primary g-recaptcha" data-sitekey="<?= SITE_KEY ?>" data-callback='onSubmit1'>Submit</button>
                        </div>

                    </form>
                </div>
            </div>
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

<?= $this->section('scripts') ?>

<script>
    // Handle reCAPTCHA callback token

    function onSubmit1(token) {
        // Set the token in the hidden input
        $('#recaptcha_token').val(token);

        $('#service_request').submit();
    }
</script>

<?= $this->endSection() ?>