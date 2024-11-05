    <?php

    // Prevent caching

    // header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1

    // header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

    ?>

    <!-- Corporate Travel banner start -->

    <section class="details-banner">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <h2><?= $package['country_name'] ?></h2>

                    <div class="breadcrumb-box">

                        <nav aria-label="breadcrumb">

                            <ol class="breadcrumb">

                                <li class="breadcrumb-item"><a href="/">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page"><?= $package['country_name'] ?></li>

                            </ol>

                        </nav>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Corporate Travel banner end -->

    <!-- details box start -->

    <section class="details-section">

        <div class="container">

            <div class="row details-bg">

                <div class="col-md-6">

                    <div class="tab-content-text">

                        <h3 data-aos="fade-down" data-aos-duration="1500"><?= $package['package_name'] ?></h3>

                        <ul class="d-flex amazing-deal-bottom" data-aos="fade-up" data-aos-duration="1500">

                            <li><i class="fas fa-clock"></i><?= $package['day_night'] ?></li>

                            <li><i class="fas fa-users"></i> Pax: <?= $package['person'] ?></li>

                        </ul>

                        <div class="highlight-box" data-aos="fade-right" data-aos-duration="1500">

                            <h5><?= $package['heading_one'] ?></h5>

                            <ul>

                                <?php foreach ($package['heading_one_points'] as $point1) : ?>

                                    <li><?= $point1 ?></li>

                                    <?php endforeach ?>

                                <!-- <li>Hanoi City tour</li>

                                <li>Cuchi Tunnels, Mekong Delta tour</li>

                                <li>Hochiminh City Tour</li>

                                <li>Danang -Bana Hill tour with Golden Bridge</li> -->

                            </ul>

                        </div>

                        <div class="inclusions-box" data-aos="fade-left" data-aos-duration="1500">

                            <h5><?= $package['heading_two'] ?></h5>

                            <ul class="term-list">

                                <?php foreach ($package['heading_two_points'] as $point2) : ?>

                                    <li class="term-item "><?= $point2 ?></li>

                                <?php endforeach ?>

                            </ul>

                        </div>



                        <div class="price-box" data-aos="fade-up" data-aos-duration="1500">

                            <p style="color: #f47a27;">Starting from</p>

                            <h4><span>₹</span> <?= $package['price'] ?> <small>/Person</small></h4>

                        </div>

                        <a href="#" style="cursor:pointer ;text-decoration: none; color: inherit;"> *T&C Apply</a>

                        <div class="btn-box" data-aos="fade-down" data-aos-duration="1500">

                            <a href="#" class="btn primary-btn bookPkg" data-bs-toggle="modal"  data-pkg_name="<?= $package['package_name'] ?>"  data-pkg="<?= $package['package_id'] ?>" data-bs-target="#book-now-modal">book now</a>

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="details-slider" data-aos="fade-left" data-aos-duration="1500">

                        <div class="owl-carousel details-carousel owl-theme">

                            <?php foreach ($package['additional_imgs'] as $img) : ?>

                                <img class="item" src="<?= $img ?>" alt="details-slider">

                            <?php endforeach ?>



                            <!-- <img class="item" src="<?= base_url('material/front/assets/img') ?>/japan.webp">

                            <img class="item" src="<?= base_url('material/front/assets/img') ?>/japan.webp"> -->

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- details box end -->



    <section class="amazing-deal">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="heading-box" data-aos="fade-down" data-aos-duration="1000">

                        <h3 class="sub-heading">Popular Deals</h3>

                        <h2 class="main-heading">Our Amazing Deals</h2>

                    </div>

                </div>

            </div>





            <div class="row">

                <?php

                if (count($packages))

                    foreach ($packages as $dtl) : ?>

                    <div class="col-md-4 point_me" data-aos="fade-right" data-aos-duration="1000">

                        <div class="amazing-deal-box">

                            <div class="amazing-deal-box-img" onclick="window.location.href='<?= encoded($dtl['package_id']) ?>'">

                                <img src="<?= $dtl['feature_img'] ?>" alt="amazing-deal" class="img-fluid">

                            </div>

                            <div class="amazing-deal-text" onclick="window.location.href='<?= encoded($dtl['package_id']) ?>'">

                                <h3><?= $dtl['package_name'] ?></h3>

                                <h4><span>&#8377;</span><?= $dtl['price'] ?><span>/<?= $dtl['person'] ?></span></h4>

                                <ul class="d-flex amazing-deal-bottom">

                                    <li><i class="fas fa-clock"></i><?= $dtl['day_night'] ?></li>

                                    <li><i class="fas fa-map-marker-alt"></i><?= $dtl['country_name'] ?></li>

                                </ul>

                            </div>

                            <a href="#" class="btn bookPkg" data-bs-toggle="modal" data-bs-target="#book-now-modal" data-pkg_name="<?= $dtl['package_name'] ?>"  data-pkg="<?= $dtl['package_id'] ?>">Book now</a>

                        </div>

                    </div>

                <?php endforeach; ?>







                <div class="row">

                    <div class="btn-box" data-aos="fade-left" data-aos-offset="500" data-aos-duration="500">

                        <a href="#" class="btn primary-btn">View all deals</a>

                    </div>

                </div>

            </div>

    </section>







    <!-- lifetime-moments section strat -->

    <section class="remember-section">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <div class="remember-box" data-aos="fade-right" data-aos-duration="1500">

                        <h3>Ready for unforgettable

                            travel. Remember Us!</h3>

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

    <!-- lifetime-moments section end -->





    <script>

        setTimeout(() => {

            $(".details-banner").css("background-image", "url(<?= $package['banner_image'] ?>)");

        }, 100 * 1);

    </script>