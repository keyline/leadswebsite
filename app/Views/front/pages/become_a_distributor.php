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
                            <img src="<?= base_url('public/assets/img/') ?>/24-celebration.png" alt="logo">
                        </div>
                        <h4>Partner with LEADSS</h4>
                        <p>Kitchen Chimneys, RO Water Purifiers, and Gas Stoves.
                        Unlock exclusive benefits and unmatched quality!</p>
                    </div>
                    <div class="distruibute_logo_form">
                        <h3>Get Started Today!</h3>
                        <h5>Leading Kitchen Solutions for Dealers & Distributors!</h5>

                        <div class="distruibute_inner-form">
                            <form id="distributor-form" class="enquiry_form" method="post" action="<?= base_url('api/distributor-enquiry') ?>">
<div id="distributor-error" class="alert alert-danger" role="alert" tabindex="-1" hidden style="white-space: pre-line;"></div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <input type="text" name="name" class="form-control" placeholder="Name" aria-label="First name" required>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <input type="text" name="business_name" class="form-control" placeholder="Business Name" aria-label="Business name" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" required>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" aria-label="Phone Number" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <input type="text" name="city" class="form-control" placeholder="Region/City" aria-label="Region/City">
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <select required class="form-select" name="product_interest" aria-label="Default select example">
                                            <option value="" selected>Product Interest</option>
                                            <?php foreach($productcat as $category)
                                            {?>
                                                <option value="<?=$category->id?>"><?=$category->name?></option>
                                            <?php } ?>                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="message" placeholder="Message" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <input type="hidden" name="page_name" value="<?= service('uri')->getPath() ?>">
                                        <input type="hidden" name="recaptcha_token" id="recaptcha_token2">
                                        <div id="distributor-captcha"></div><button type="submit" id="distributor-submit">Submit</button>
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
                <a href="<?= base_url() ?>/uploads/download/<?= $file->file ?>"><i class="fa-regular fa-file-pdf"></i> DOWNLOAD PRODUCT CATALOG</a>
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
<script>
(function () {
    var form = document.getElementById('distributor-form');
    var button = document.getElementById('distributor-submit');
    var errorBox = document.getElementById('distributor-error');
    var widgetId = null;
    var busy = false;
    var captchaTimer;

    function fail(message) {
        clearTimeout(captchaTimer);
        busy = false;
        button.disabled = false;
        button.textContent = 'Submit';
        errorBox.textContent = message;
        errorBox.hidden = false;
        errorBox.focus();
        if (widgetId !== null && window.grecaptcha) {
            grecaptcha.reset(widgetId);
        }
    }

    function sendForm(token) {
        if (!busy) return;
        clearTimeout(captchaTimer);
        button.textContent = 'Submitting...';
        form.elements.recaptcha_token.value = token;
        var data = new FormData(form);
        data.set('g-recaptcha-response', token);
        var controller = new AbortController();
        var timeout = setTimeout(function () { controller.abort(); }, 60000);
        fetch(form.action, { method: 'POST', body: data, signal: controller.signal })
            .then(function (response) {
                return response.json().catch(function () {
                    throw new Error('The server could not process your request. Please try again later.');
                });
            })
            .then(function (response) {
                if (response.status === true) {
                    window.location.assign(<?= json_encode(base_url('thank-you')) ?>);
                    return;
                }
                var errors = response.errors ? Object.values(response.errors).join('\n') : '';
                fail(errors || response.message || 'Unable to submit your enquiry. Please try again.');
            })
            .catch(function (error) {
                fail(error.name === 'AbortError'
                    ? 'The request timed out. Please check with us before submitting again.'
                    : error.message || 'Unable to connect. Please check your connection and try again.');
            })
            .finally(function () { clearTimeout(timeout); });
    }

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        if (busy || !form.reportValidity()) return;
        errorBox.hidden = true;
        if (!window.grecaptcha || typeof grecaptcha.render !== 'function') {
            fail('Verification could not load. Please check your connection, allow Google reCAPTCHA, and reload this page.');
            return;
        }
        busy = true;
        button.disabled = true;
        button.textContent = 'Verifying...';
        try {
            if (widgetId === null) {
                widgetId = grecaptcha.render('distributor-captcha', {
                    sitekey: <?= json_encode(SITE_KEY) ?>,
                    size: 'invisible',
                    callback: sendForm,
                    'error-callback': function () {
                        fail('Verification failed to load. Please reload and try again. On localhost, the reCAPTCHA key must allow localhost.');
                    },
                    'expired-callback': function () { fail('Verification expired. Please submit again.'); }
                });
            }
            captchaTimer = setTimeout(function () {
                fail('Verification did not finish. Please retry and complete the CAPTCHA challenge. If this persists on localhost, check the reCAPTCHA domain settings.');
            }, 120000);
            grecaptcha.execute(widgetId);
        } catch (error) {
            fail('Verification could not start. Please reload the page. Check that the reCAPTCHA key supports this domain.');
        }
    });
})();
</script>
<?= $this->endSection() ?>
