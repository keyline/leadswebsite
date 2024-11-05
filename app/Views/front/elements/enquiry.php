<section class="home_enquiry">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="about_info" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="home_form_holder">
                        <form class="enquiry_form" action="<?= base_url('contact-us') ?>" method="post">
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
                        <li><a href="#" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    function onSubmit(token) {
        document.getElementById("recaptcha_token").value = token;
        document.getElementsByClassName('enquiry_form')[0].submit();
    }
</script>