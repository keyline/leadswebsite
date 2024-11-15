<?= $this->section('style') ?>
<style>
    .ponit {
        cursor: pointer;
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
                                <img src="https://leadsdev.keylines.net.in/uploads/blogs/1731388090173022251346f387dd12.jpg" alt="Professional Career Counseling: Advancing in Your Career" style="height: 300px;">
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

        <div class="row">
            <!-- <div class="col-md-12">AMC Enquiry</div> -->

            <div class="col-md-12">
                <div class="form_style">

                    <form class="row g-3" action="" method="post">

                        <div class="col-md-4">
                            <label for="inputProduct" class="form-label">Product</label>
                            <select id="inputProduct" class="form-select" name="product_id" required>
                                <option selected value="">Choose...</option>
                            </select>
                        </div>
                        <div class="col-md-6">

                        </div>

                        <!-- input  -->

                        <div class="col-md-6">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="inputName" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" required>
                        </div>


                        <div class="col-md-12">
                            <label for="input16" class="form-label">Comments</label>
                            <textarea class="form-control" name="comments" id="input16" rows="5" required></textarea>
                            <p class="text-danger error" id="comments-error"></p>
                        </div>


                        <div class="col-12">
                            <!-- <input type="hidden" name="recaptcha_token" id="recaptcha_token"> -->
                            <!-- <button type="submit" class="btn btn-primary g-recaptcha" data-sitekey="<?= SITE_KEY ?>" data-callback='onSubmit'>Submit</button> -->
                            <button type="submit" class="btn btn-primary" data-callback='onSubmit'>Submit</button>
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
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }


    // Handle reCAPTCHA callback
    function onSubmit(token = null) {
        // Set the token in the hidden input
        // $('#recaptcha_token').val(token);

        $(this).closest('form').submit();
    }


    $(document).ready(function() {
        loadProduct();

        $(".product_parent").on('click', function() {
            let product_id = $(this).data('id');

            loadProduct(product_id);
        });






    })
</script>

<?= $this->endSection() ?>