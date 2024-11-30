<!-- inner page banner start -->
<section class="inner_banner inner_banner_distributor">
    <div class="container">
    </div>
</section>
<!-- inner page banner end -->

<!-- mission section start -->
<section class="distributor-form-section">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-md-12">
                <div class="distruibute_logo_section">
                    <div class="distruibute_logo">
                        <div class="distruibute23lgo">
                            <img src="<?= base_url('public/assets/img/') ?>/distru_23logo.png" alt="logo">
                        </div>
                        <h4>Partner with LEADS</h4>
                        <p>Kitchen Chimneys, RO Water Purifiers, and Gas Stoves.
                        Unlock exclusive benefits and unmatched quality!</p>
                    </div>
                    <div class="distruibute_logo_form">
                        <h3>Get Started Today!</h3>
                        <h5>Leading Kitchen Solutions for Dealers & Distributors!</h5>

                        <div class="distruibute_inner-form">
                            <form>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <input type="text" class="form-control" placeholder="Name" aria-label="First name">
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <input type="text" class="form-control" placeholder="Business Name" aria-label="Business name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <input type="email" class="form-control" placeholder="Email" aria-label="Email">
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <input type="text" class="form-control" placeholder="Phone Number" aria-label="Phone Number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <input type="text" class="form-control" placeholder="Region/City" aria-label="Region/City">
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Product Interest</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="form-control" placeholder="Message" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <button type="submit" >submit <img src="https://localhost/leadswebsite/public/assets/img/arrow-long-red.png" alt="" class="img-fluid long-arrow"></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- mission section end -->



<!-- feature icon section start -->

<section class="features-section distributor-features text-white">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-md-12 dis_titletop pb-5">
                <h3>Key Benefits</h3>
                <h5>Why Partner with Us?</h5>
            </div>
            <div class="col-md-12">
                <ul class="d-flex feature-icon-list w-100 justify-content-center">
                    <li data-aos="fade-right" data-aos-duration="1000">
                        <div class="feature-item">
                            <img src="<?= base_url('public/') ?>/assets/img/dis-icon1.png" alt="Leader Icon" class="img-fluid feature-icon">
                            <h5>High-Margin Products:</h5>
                            <p>Maximize profitability with
                            our premium range.</p>
                        </div>
                    </li>
                    <li data-aos="fade-down" data-aos-duration="1000">
                        <div class="feature-item">
                            <img src="<?= base_url('public/') ?>/assets/img/dis-icon2.png" alt="Delivery Icon" class="img-fluid feature-icon">
                            <h5>Unmatched Quality:</h5>
                            <p>Trusted by customers for
                            reliability and durability.</p>
                        </div>
                    </li>
                    <li data-aos="zoom-in" data-aos-duration="1000">
                        <div class="feature-item">
                            <img src="<?= base_url('public/') ?>/assets/img/dis-icon3.png" alt="Quality Icon" class="img-fluid feature-icon">
                            <h5>Marketing Support:</h5>
                            <p>Access branding materials,
                            digital assets, and campaigns.</p>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-duration="1000">
                        <div class="feature-item">
                            <img src="<?= base_url('public/') ?>/assets/img/dis-icon3.png" alt="Team Icon" class="img-fluid feature-icon">
                            <h5>Quick Turnaround:</h5>
                            <p>Efficient order and
                            delivery processes.</p>
                        </div>
                    </li>
                    <li data-aos="fade-left" data-aos-duration="1000">
                        <div class="feature-item">
                            <img src="<?= base_url('public/') ?>/assets/img/dis-icon3.png" alt="Support Icon" class="img-fluid feature-icon">
                            <h5>Exclusive Dealer Rights:</h5>
                            <p>Enjoy priority
                            in your region.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="diskeyfe_downbtn pt-5 mt-5">
                <a href="#"><i class="fa-regular fa-file-pdf"></i> DOWNLOAD PRODUCT CATALOG</a>
            </div>
        </div>
    </div>
</section>
<!-- feature icon section end -->





<?= $this->section('scripts') ?>
<script>
    $(function() {
        $('.thumbnail').viewbox();
        $('.thumbnail-2').viewbox({
            fullscreenButton: true
        });

        (function() {
            var vb = $('.popup-link').viewbox();
            $('.popup-open-button').click(function() {
                vb.trigger('viewbox.open');
            });
            $('.close-button').click(function() {
                vb.trigger('viewbox.close');
            });
        })();

    });
</script>
<?= $this->endSection() ?>