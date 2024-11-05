  <style>

    .load-more__btn-wrap{

        text-align: center !important;

    }

  </style>

  <!-- Corporate Travel banner start -->

    <section class="allied-services-banner corporate-services-banner holiday-package-banner">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <h1>Holiday Packages</h1>

                    <img src="<?= base_url('material/front/assets/img') ?>/holiday-bg-1.webp" alt="holiday-bg1">

                    <img src="<?= base_url('material/front/assets/img') ?>/holiday-bg-3.webp" alt="holiday-bg2">

                    <div class="breadcrumb-box">

                        <nav aria-label="breadcrumb">

                            <ol class="breadcrumb">

                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                                <!-- <li class="breadcrumb-item"><a href="#">what we do</a></li>     -->

                                <li class="breadcrumb-item active" aria-current="page">Holiday Packages</li>

                            </ol>

                        </nav>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Corporate Travel banner end -->

    <!-- Corporate Travel banner bottom start -->

    <section class="holiday-package-banner-bottom">

        <div class="holiday-package-bottom-left" data-aos="fade-right" data-aos-duration="1500">

            <img src="<?= base_url('material/front/assets/img') ?>/holiday-bottom.webp" alt="holiday-bottom">

        </div>

        <div class="container">

            <div class="row align-items-center justify-content-md-end">

                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1500">

                    <div class="wide-offer-text-box">

                        <h3>Your gateway to unforgettable

                            holiday experiences.</h3>

                        <p>Honeymoon | Romantic getaways Staycations | Family holidays

                            Bachelorette trip</p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Corporate Travel banner bottom end -->

    <!-- Corporate Travel info start -->

    <section class="amazing-deal">

        <div class="container">

            <div class="row some-list justify-content-center">



                <?php foreach ($packages as $dtl) : ?>

                    <div class="col-md-4 pkg_item_des point_me" data-aos="fade-right" data-aos-duration="1000">

                        <div class="amazing-deal-box">

                            <div class="amazing-deal-box-img" onclick="window.location.href='promos-details/<?= encoded($dtl['package_id']) ?>'">

                                <img src="<?= $dtl['feature_img'] ?>" alt="amazing-deal" class="img-fluid">

                            </div>

                            <div class="amazing-deal-text" onclick="window.location.href='promos-details/<?= encoded($dtl['package_id']) ?>'">

                                <h3><?= $dtl['package_name'] ?></h3>

                                <h4><span>&#8377;</span><?= $dtl['price'] ?><span>/<?= $dtl['person'] ?></span></h4>

                                <ul class="d-flex amazing-deal-bottom">

                                    <li><i class="fas fa-clock"></i><?= $dtl['day_night'] ?></li>

                                    <li><i class="fas fa-map-marker-alt"></i><?= $dtl['country_name'] ?></li>

                                </ul>

                            </div>

                            <a href="#" class="btn bookPkg" data-bs-toggle="modal" data-bs-target="#book-now-modal" data-pkg_name="<?= $dtl['package_name'] ?>"   data-pkg="<?= $dtl['package_id'] ?>">Book now</a>

                        </div>

                    </div>

                <? endforeach ?>









                <!-- <div class="col-md-4" data-aos="fade-right" data-aos-duration="1000">

                    <div class="amazing-deal-box">

                        <div class="amazing-deal-box-img">

                            <img src="<?= base_url('material/front/assets/img') ?>/deal-1.webp" alt="" class="img-fluid">

                        </div>

                        <div class="amazing-deal-text">

                            <h3>Baku</h3>

                            <h4><span>&#8377;</span>25,500<span>/per person</span></h4>

                            <ul class="d-flex amazing-deal-bottom">

                                <li><i class="fas fa-clock"></i> 6D/5N</li>

                                <li><i class="fas fa-map-marker-alt"></i> Azerbaijan</li>

                            </ul>

                        </div>

                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#book-now-modal">Book now</a>

                    </div>

                </div>

                <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1000">

                    <div class="amazing-deal-box">

                        <div class="amazing-deal-box-img">

                            <img src="<?= base_url('material/front/assets/img') ?>/deal-2.webp" alt="" class="img-fluid">

                        </div>

                        <div class="amazing-deal-text">

                            <h3>Phuket & Krabi</h3>

                            <h4><span>&#8377;</span>59,500<span>/per person</span></h4>

                            <ul class="d-flex amazing-deal-bottom">

                                <li><i class="fas fa-clock"></i> 6D/5N</li>

                                <li><i class="fas fa-map-marker-alt"></i> Thailand</li>

                            </ul>

                        </div>

                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#book-now-modal">Book now</a>

                    </div>

                </div>

                <div class="col-md-4" data-aos="fade-left" data-aos-duration="1000">

                    <div class="amazing-deal-box">

                        <div class="amazing-deal-box-img">

                            <img src="<?= base_url('material/front/assets/img') ?>/deal-2.webp" alt="" class="img-fluid">

                        </div>

                        <div class="amazing-deal-text">

                            <h3>Georgia</h3>

                            <h4><span>&#8377;</span>32,000<span>/per person</span></h4>

                            <ul class="d-flex amazing-deal-bottom">

                                <li><i class="fas fa-clock"></i> 5D/4N</li>

                                <li><i class="fas fa-map-marker-alt"></i> Europe</li>

                            </ul>

                        </div>

                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#book-now-modal">Book now</a>

                    </div>

                </div> -->

            </div>

            <!-- <div class="row">

                <div class="col-md-4" data-aos="fade-right" data-aos-duration="1000">

                    <div class="amazing-deal-box">

                        <div class="amazing-deal-box-img">

                            <img src="<?= base_url('material/front/assets/img') ?>/deal-4.webp" alt="" class="img-fluid">

                        </div>

                        <div class="amazing-deal-text">

                            <h3>Mauritius</h3>

                            <h4><span>&#8377;</span>43,200<span>/per person</span></h4>

                            <ul class="d-flex amazing-deal-bottom">

                                <li><i class="fas fa-clock"></i> 5D/4N</li>

                                <li><i class="fas fa-map-marker-alt"></i> East Africa</li>

                            </ul>

                        </div>

                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#book-now-modal">Book now</a>

                    </div>

                </div>

                <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1000">

                    <div class="amazing-deal-box">

                        <div class="amazing-deal-box-img">

                            <img src="<?= base_url('material/front/assets/img') ?>/deal-5.webp" alt="" class="img-fluid">

                        </div>

                        <div class="amazing-deal-text">

                            <h3>Singapore</h3>

                            <h4><span>&#8377;</span>51,500<span>/per person</span></h4>

                            <ul class="d-flex amazing-deal-bottom">

                                <li><i class="fas fa-clock"></i> 5D/4N</li>

                                <li><i class="fas fa-map-marker-alt"></i> Singapore</li>

                            </ul>

                        </div>

                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#book-now-modal">Book now</a>

                    </div>

                </div>

                <div class="col-md-4" data-aos="fade-left" data-aos-duration="1000">

                    <div class="amazing-deal-box">

                        <div class="amazing-deal-box-img">

                            <img src="<?= base_url('material/front/assets/img') ?>/deal-6.webp" alt="" class="img-fluid">

                        </div>

                        <div class="amazing-deal-text">

                            <h3>Dubai</h3>

                            <h4><span>&#8377;</span>59,500<span>/per person</span></h4>

                            <ul class="d-flex amazing-deal-bottom">

                                <li><i class="fas fa-clock"></i> 6D/5N</li>

                                <li><i class="fas fa-map-marker-alt"></i> Dubai</li>

                            </ul>

                        </div>

                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#book-now-modal">Book now</a>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-4" data-aos="fade-right" data-aos-duration="1000">

                    <div class="amazing-deal-box">

                        <div class="amazing-deal-box-img">

                            <img src="<?= base_url('material/front/assets/img') ?>/deal-7.webp" alt="" class="img-fluid">

                        </div>

                        <div class="amazing-deal-text">

                            <h3>Kerala</h3>

                            <h4><span>&#8377;</span>28,000<span>/per person</span></h4>

                            <ul class="d-flex amazing-deal-bottom">

                                <li><i class="fas fa-clock"></i> 7D/6N</li>

                                <li><i class="fas fa-map-marker-alt"></i> India</li>

                            </ul>

                        </div>

                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#book-now-modal">Book now</a>

                    </div>

                </div>

                <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1000">

                    <div class="amazing-deal-box">

                        <div class="amazing-deal-box-img">

                            <img src="<?= base_url('material/front/assets/img') ?>/deal-8.webp" alt="" class="img-fluid">

                        </div>

                        <div class="amazing-deal-text">

                            <h3>Andaman</h3>

                            <h4><span>&#8377;</span>25,400<span>/per person</span></h4>

                            <ul class="d-flex amazing-deal-bottom">

                                <li><i class="fas fa-clock"></i> 7D/6N</li>

                                <li><i class="fas fa-map-marker-alt"></i> Andaman</li>

                            </ul>

                        </div>

                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#book-now-modal">Book now</a>

                    </div>

                </div>

                <div class="col-md-4" data-aos="fade-left" data-aos-duration="1000">

                    <div class="amazing-deal-box">

                        <div class="amazing-deal-box-img">

                            <img src="<?= base_url('material/front/assets/img') ?>/deal-9.webp" alt="" class="img-fluid">

                        </div>

                        <div class="amazing-deal-text">

                            <h3>Kenya & Tanzania</h3>

                            <h4><span>&#8377;</span>218,954<span>/per person</span></h4>

                            <ul class="d-flex amazing-deal-bottom">

                                <li><i class="fas fa-clock"></i> 7D/6N</li>

                                <li><i class="fas fa-map-marker-alt"></i> Kenya–Tanzania</li>

                            </ul>

                        </div>

                        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#book-now-modal">Book now</a>

                    </div>

                </div>

            </div> -->

            <div class="row">

                <div  class="btn-box" data-aos="fade-left" data-aos-duration="1500">

                    <a href="#" class="btn primary-btn load-more-btn">View More</a>

                </div>

            </div>

        </div>

    </section>

    <!-- Corporate Travel info end -->



    <!-- Corporate-services offer start -->

    <section class="allied-services Corporate-Travel-services">

        <img src="<?= base_url('material/front/assets/img') ?>/amazing-right.webp" alt="amazing-right" class="img-fluid amazing-img d-none d-md-block fade-up">

        <img src="<?= base_url('material/front/assets/img') ?>/footstep-right.webp" alt="footstep-right" class="img-fluid footstep-img d-none d-md-block fade-up">

        <div class="container">

            <div class="row align-items-center Corporate-services-row">

                <div class="col-md-6">

                    <div class="Tailored-services-text">

                        <div class="heading-box heading-box-3">

                            <h3 class="sub-heading sub-heading-3" data-aos="fade-down" data-aos-duration="1500">Tailored</h3>

                            <h2 class="main-heading main-heading-3 Service" data-aos="fade-up" data-aos-duration="1500">Experiences</h2>

                            <h4 data-aos="fade-right" data-aos-duration="1500">We believe that every traveler is unique, and their holiday experiences should reflect their individual desires.</h4>

                            <p data-aos="fade-right" data-aos-duration="1500">Our travel agency excels in creating personalized holiday packages that align with your specific interests and preferences.</p>

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="allied-services-img" data-aos="fade-left" data-aos-duration="1500">

                        <img src="<?= base_url('material/front/assets/img') ?>/Tailored.webp" alt="Tailored" class="img-fluid">

                    </div>

                </div>

            </div>

            <div class="flex-md-row row flex-column-reverse align-items-center Corporate-services-row">

                <div class="col-md-6">

                    <div class="allied-services-img" data-aos="fade-right" data-aos-duration="1500">

                        <img src="<?= base_url('material/front/assets/img') ?>/Destination.webp" alt="Destination" class="img-fluid">

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="Destination-services-text">

                        <div class="heading-box heading-box-3">

                            <h3 class="sub-heading sub-heading-3" data-aos="fade-down" data-aos-duration="1500">Expert</h3>

                            <h2 class="main-heading main-heading-3 Service" data-aos="fade-up" data-aos-duration="1500">Destination Knowledge</h2>

                            <p data-aos="fade-left" data-aos-duration="1500">Our team of experienced travel consultants possesses extensive knowledge of various destinations worldwide.</p>

                            <h4 data-aos="fade-left" data-aos-duration="1500">Rely on our expertise to uncover hidden gems and embark on extraordinary journeys.</h4>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- allied-services offer end -->

    <!-- other services offer start -->

    <section class="other-services">

        <img src="<?= base_url('material/front/assets/img') ?>/footstep-left.webp" alt="footstep-left" class="img-fluid amazing-img-2 d-none d-md-block" data-aos="fade-right" data-aos-duration="1500">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    <div class="row other-secvices-box">

                        <div class="col-lg-3 col-md-3 col-sm-2">

                            <div class="icon-box" data-aos="fade-right" data-aos-duration="1500">

                                <img src="<?= base_url('material/front/assets/img') ?>/seamless-icon.webp" alt="seamless-icon" class="img-fluid">

                            </div>

                        </div>

                        <div class="col-lg-9 col-md-9 col-sm-10">

                            <div class="other-secvices-text">

                                <h3 data-aos="fade-left" data-aos-duration="1500">Seamless Travel Planning</h3>



                                <p data-aos="fade-up" data-aos-duration="1500">Our meticulous attention to detail ensures a seamless travel experience, allowing you to relax and enjoy every moment of your well-deserved holiday.</p>





                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row other-secvices-box">

                        <div class="col-lg-3 col-md-3 col-sm-2">

                            <div class="icon-box" data-aos="fade-right" data-aos-duration="1500">

                                <img src="<?= base_url('material/front/assets/img') ?>/pricing-icon.webp" alt="pricing-icon" class="img-fluid">

                            </div>

                        </div>

                        <div class="col-lg-9 col-md-9 col-sm-10">

                            <div class="other-secvices-text">

                                <h3 data-aos="fade-left" data-aos-duration="1500">Competitive Pricing</h3>



                                <p data-aos="fade-up" data-aos-duration="1500">Benefit from our industry connections as we provide you with cost-effective holiday packages that offer exceptional value for your investment.</p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="row mt-100">

                <div class="col-md-6">

                    <div class="row other-secvices-box">

                        <div class="col-lg-3 col-md-3 col-sm-2">

                            <div class="icon-box" data-aos="fade-right" data-aos-duration="1500">

                                <img src="<?= base_url('material/front/assets/img') ?>/seafty-icon.webp" alt="seafty-icon" class="img-fluid">

                            </div>

                        </div>

                        <div class="col-lg-9 col-md-9 col-sm-10">

                            <div class="other-secvices-text">

                                <h3 data-aos="fade-left" data-aos-duration="1500">Safety and Security</h3>

                                <p data-aos="fade-down" data-aos-duration="1500">Your safety and security are our utmost priority.</p>

                                <p data-aos="fade-up" data-aos-duration="1500">We work with trusted partners and meticulously assess the safety standards of all elements of your holiday package.</p>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="row other-secvices-box">

                        <div class="col-lg-3 col-md-3 col-sm-2">

                            <div class="icon-box" data-aos="fade-right" data-aos-duration="1500">

                                <img src="<?= base_url('material/front/assets/img') ?>/authentic-icon.webp" alt="authentic-icon" class="img-fluid">

                            </div>

                        </div>

                        <div class="col-lg-9 col-md-9 col-sm-10">

                            <div class="other-secvices-text">

                                <h3 data-aos="fade-left" data-aos-duration="1500">Authentic Cultural Immersion</h3>

                                <p data-aos="fade-down" data-aos-duration="1500">We believe that the essence of travel lies in authentic cultural experiences.</p>

                                <p data-aos="fade-up" data-aos-duration="1500">Our holiday packages are designed to immerse you in the local customs, traditions, and flavors of your chosen destinations.</p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- other services offer end -->



    <section class="remember-section unforgettable-memories cherished-memories">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <div class="remember-box">

                        <p data-aos="fade-down" data-aos-duration="1500">Let us be your trusted travel partner as you<br class="d-none d-md-block"> embark on remarkable journeys that will</p>

                        <h3 data-aos="fade-up" data-aos-duration="1500">leave you with cherished

                            memories for a lifetime.</h3>

                    </div>

                </div>

                <div class="col-md-4 d-flex justify-content-md-end">

                    <div class="remember-btn" data-aos="fade-left" data-aos-duration="1500">

                        <a href="javascript: void(0)" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#book-now-modal">Contact us</a>

                    </div>

                </div>

            </div>

        </div>

    </section>