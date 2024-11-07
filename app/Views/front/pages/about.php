<!-- inner page banner start -->
<section class="inner_banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="inner_banner_info">
                    <h4> <?= $setting->banner_text ?? '' ?> </h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- inner page banner end -->
<!-- mission section start -->
<section class="mission_section">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-10">
                <div class="about_info" data-aos="fade-right" data-aos-duration="1000">
                    <div class="row justify-content-end">
                        <div class="col-md-11">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                    <div class="mission_info">
                                        <ul>
                                            <li class="d-flex align-items-center">
                                                <div class="img-box me-3">
                                                    <img src="<?= base_url('public/') ?>/assets/img/bulsyl.webp" alt="" style="width: auto;">
                                                </div>
                                                <div class="mission_text">
                                                    <h4>Mission</h4>
                                                    <?= $setting->mission_text ?? '' ?>
                                                </div>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <div class="img-box me-3">
                                                    <img src="<?= base_url('public/') ?>/assets/img/eye.webp" alt="" style="width: auto;">
                                                </div>
                                                <div class="mission_text">
                                                    <h4>Vision</h4>
                                                    <?= $setting->vision_text  ?? '' ?>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="feature_plan mission_text mt-4">
                                            <h4>Future Planning</h4>
                                            <?= $setting->future_plan_text  ?? '' ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                                    <div class="row justify-content-end">
                                        <div class="col-md-11">
                                            <ul class="client-logo-list">
                                                <?php foreach ($certificates as $certificate): ?>
                                                    <li>
                                                        <img src="<?= base_url('uploads/') ?>/certificate/<?= $certificate->image_data ?>" alt="" class="img-fluid">
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="about_more_box">
                        <a href="#">
                            <div class="mission_tabs">
                                <p class="hypne">Mission & Vision</p>
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Our Presence</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Certificates</a>
                                </div>
                            </div>
                        </a>
                    </div>
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