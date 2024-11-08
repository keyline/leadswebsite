<!-- Corporate Travel banner start -->
<!-- ?php pr($packages); ?> -->
<section class="allied-services-banner corporate-services-banner promos-banner">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <h1>PROMOS</h1>

                <div class="breadcrumb-box">

                    <nav aria-label="breadcrumb">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="/">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">PROMOS</li>

                        </ol>

                    </nav>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Corporate Travel banner end -->

<!-- promos tab section start -->

<section class="promos-tab-section">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="promos-tab">

                    <ul class="nav nav-pills" id="pills-tab" role="tablist" data-aos="fade-down" data-aos-duration="1500">

                        <li class="nav-item" role="presentation">

                            <button class="nav-link active select_type" data-id="<?= $categories[0]->id ?>" id="pills-international-tab" data-bs-toggle="pill" data-bs-target="#pills-international" type="button" role="tab" aria-controls="pills-international" aria-selected="true"><?= $categories[0]->name ?></button>

                        </li>

                        <li class="nav-item" role="presentation">

                            <button class="nav-link select_type" data-id="<?= $categories[1]->id ?>" id="pills-domestic-tab" data-bs-toggle="pill" data-bs-target="#pills-domestic" type="button" role="tab" aria-controls="pills-domestic" aria-selected="false"><?= $categories[1]->name ?></button>

                        </li>

                        <li class="nav-item" role="presentation">

                            <button class="nav-link select_type" data-id="<?= $categories[2]->id ?>" id="pills-exclusive-properties-tab" data-bs-toggle="pill" data-bs-target="#pills-exclusive-properties" type="button" role="tab" aria-controls="pills-exclusive-properties" aria-selected="false"><?= $categories[2]->name ?></button>

                        </li>

                    </ul>

                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active show_promos<?= $categories[0]->id ?>" id="pills-international" role="tabpanel" aria-labelledby="pills-international-tab" tabindex="0">

                            <!-- fetch here 1 -->

                            <?php foreach ($packages[$categories[0]->id] as $package) : ?>

                                <div class="tab-content-box">

                                    <div class="row">

                                        <div class="col-md-5">

                                            <div class="tab-img" >

                                                <img src="<?= $package['feature_img'] ?>" alt="package-img" class="img-fluid">

                                            </div>

                                        </div>

                                        <div class="col-md-5">

                                            <div class="tab-content-text" >

                                                <h3><?= $package['package_name'] ?></h3>

                                                <ul class="d-flex amazing-deal-bottom">

                                                    <li><i class="fa-solid fa-location-dot"></i><?= $package['country_name'] ?></li>

                                                    <li><i class="fas fa-users"></i> pax: <?= $package['person'] ?></li>

                                                </ul>

                                                <div class="highlight-box">

                                                    <h5><?= $package['heading_one'] ?></h5>

                                                    <ul>

                                                        <?php foreach ($package['heading_one_points'] as $item_one) : ?>

                                                            <li><?= $item_one ?></li>

                                                        <?php endforeach; ?>

                                                    </ul>

                                                </div>

                                                <div class="inclusions-box">

                                                    <h5><?= $package['heading_two'] ?></h5>

                                                    <ul class="term-list2">

                                                        <?php foreach ($package['heading_two_points'] as $item_two) : ?>

                                                            <li class="term-item "><?= $item_two ?></li>

                                                        <?php endforeach; ?>

                                                    </ul>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-2" >

                                            <div class="price-box">

                                                <h4><span>₹</span> <?= $package['price'] ?></h4>

                                                <p>/<?= $package['person'] ?></p>

                                            </div>

                                            <div class="btn-box">

                                                <a href="#" class="btn primary-btn bookPkg" data-bs-toggle="modal" data-bs-target="#book-now-modal" data-pkg_name="<?= $package['package_name'] ?>"  data-pkg="<?= $package['package_id'] ?>">book now</a>

                                                <a href="promos-details/<?= encoded($package['package_id']) ?>" class="btn primary-btn">View more</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            <?php endforeach; ?>



                        </div>

                        <div class="tab-pane fade show_promos<?= $categories[1]->id ?>" id="pills-domestic" role="tabpanel" aria-labelledby="pills-domestic-tab" tabindex="0">

                            <!-- fetch here 2 -->

                            <?php foreach ($packages[$categories[1]->id] as $package) : ?>

                                <div class="tab-content-box">

                                    <div class="row">

                                        <div class="col-md-5">

                                            <div class="tab-img" >

                                                <img src="<?= $package['feature_img'] ?>" alt="package-img2" class="img-fluid">

                                            </div>

                                        </div>

                                        <div class="col-md-5">

                                            <div class="tab-content-text" >

                                                <h3><?= $package['package_name'] ?></h3>

                                                <ul class="d-flex amazing-deal-bottom">

                                                    <li><i class="fa-solid fa-location-dot"></i><?= $package['country_name'] ?></li>

                                                    <li><i class="fas fa-users"></i> pax: <?= $package['person'] ?></li>

                                                </ul>

                                                <div class="highlight-box">

                                                    <h5><?= $package['heading_one'] ?></h5>

                                                    <ul>

                                                        <?php foreach ($package['heading_one_points'] as $item_one) : ?>

                                                            <li><?= $item_one ?></li>

                                                        <?php endforeach; ?>

                                                    </ul>

                                                </div>

                                                <div class="inclusions-box">

                                                    <h5><?= $package['heading_two'] ?></h5>

                                                    <ul class="term-list2">

                                                        <?php foreach ($package['heading_two_points'] as $item_two) : ?>

                                                            <li class="term-item "><?= $item_two ?></li>

                                                        <?php endforeach; ?>



                                                    </ul>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-2" >

                                            <div class="price-box">

                                                <h4><span>₹</span> <?= $package['price'] ?></h4>

                                                <p>/<?= $package['person'] ?></p>

                                            </div>

                                            <div class="btn-box">

                                            <a href="#" class="btn primary-btn bookPkg" data-bs-toggle="modal" data-bs-target="#book-now-modal" data-pkg_name="<?= $package['package_name'] ?>"  data-pkg="<?= $package['package_id'] ?>">book now</a>

                                                <a href="promos-details/<?= encoded($package['package_id']) ?>" class="btn primary-btn">View more</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            <?php endforeach;  ?>

                        </div>

                        <div class="tab-pane fade show_promos<?= $categories[2]->id ?>" id="pills-exclusive-properties" role="tabpanel" aria-labelledby="pills-exclusive-properties-tab" tabindex="0">

                            <!-- fetch here 3 -->

                            <?php foreach ($packages[$categories[2]->id] as $package) : 
                                
                                ?>                              

                                <div class="tab-content-box">

                                    <div class="row">

                                        <div class="col-md-5">

                                            <div class="tab-img" >

                                                <img src="<?= $package['feature_img'] ?>" alt="package-img3" class="img-fluid">

                                            </div>

                                        </div>

                                        <div class="col-md-4">

                                            <div class="tab-content-text" >

                                                <h3><?= $package['package_name'] ?></h3>

                                                <ul class="d-flex">

                                                    <li><i class="fa-solid fa-location-dot"></i> <?= $package['country_name'] ?></li>

                                                    <!-- <li><i class="fas fa-users"></i> pax: <?= $package['person'] ?></li> -->

                                                </ul>

                                                <div class="highlight-box">

                                                    <h5><?= $package['heading_one'] ?></h5>

                                                    <ul>

                                                        <?php foreach ($package['heading_one_points'] as $item_one) : ?>

                                                            <li><?= $item_one ?></li>

                                                        <?php endforeach; ?>

                                                    </ul>

                                                </div>

                                                <div class="inclusions-box">

                                                    <h5><?= $package['heading_two'] ?></h5>

                                                    <ul class="term-list2">

                                                        <?php foreach ($package['heading_two_points'] as $item_two) : ?>

                                                            <li class="term-item "><?= $item_two ?></li>

                                                        <?php endforeach; ?>



                                                    </ul>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-3" >

                                            <div class="statictext-box">

                                                <!-- <h4><span>₹</span> <?= $package['price'] ?></h4>

                                                <p>/<?= $package['person'] ?></p> -->

                                                <h4>Best Deals Available</h4>

                                            </div>

                                            <div class="btn-box">

                                            <a href="#" class="btn primary-btn bookPkg" data-bs-toggle="modal" data-bs-target="#book-now-modal" data-pkg_name="<?= $package['package_name'] ?>" data-pkg="<?= $package['package_id'] ?>">book now</a>

                                                <!-- <a href="promos-details/?= encoded($package['package_id']) ?>" class="btn primary-btn">View more</a> -->

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            <?php endforeach; ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>



    </div>

</section>

<!-- promos tab section end -->



<!-- remember section start-->

<section class="remember-section">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-8">

                <div class="remember-box" >

                    <h3>Ready for unforgettable

                        travel. Remember Us!</h3>

                </div>

            </div>

            <div class="col-md-4 d-flex justify-content-md-end">

                <div class="remember-btn" >

                    <!-- <a href="#" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#contact-modal">Contact us</a> -->

                    <a class="btn primary-btn contact_us_btn"  href="javascript: void(0)" data-bs-toggle="modal" data-bs-target="#book-now-modal">Contact us</a>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- remember section end-->







<!-- proms pkg html view -->

<!-- 

<div class="tab-content-box">

    <div class="row">

        <div class="col-md-5">

            <div class="tab-img" data-aos="fade-right" data-aos-duration="1500">

                <img src="<?= base_url('material/front/assets/img') ?>/japan.webp" alt="" class="img-fluid">

            </div>

        </div>

        <div class="col-md-5">

            <div class="tab-content-text" data-aos="zoom-in" data-aos-duration="1500">

                <h3>Japan</h3>

                <ul class="d-flex amazing-deal-bottom">

                    <li><i class="fas fa-clock"></i> 7D/6N</li>

                    <li><i class="fas fa-users"></i> pax: 4</li>

                </ul>

                <div class="highlight-box">

                    <h5>Highlights</h5>

                    <ul>

                        <li>Halong Bay Cruise</li>

                        <li>Hanoi City tour</li>

                        <li>Cuchi Tunnels, Mekong Delta tour</li>

                        <li>Hochiminh City Tour</li>

                        <li>Danang -Bana Hill tour with Golden Bridge</li>

                    </ul>

                </div>

                <div class="inclusions-box">

                    <h5>Inclusions</h5>

                    <ul>

                        <li>Accommodation at 4 * with breakfast</li>

                        <li>English-speaking tour guide</li>

                        <li>Both ways airport transfers by</li>

                    </ul>

                </div>

            </div>

        </div>

        <div class="col-md-2" data-aos="fade-left" data-aos-duration="1500">

            <div class="price-box">

                <h4><span>₹</span> 178,095</h4>

                <p>/per person</p>

            </div>

            <div class="btn-box">

                <a href="#" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#book-now-modal">book now</a>

                <a href="#" class="btn primary-btn">View more</a>

            </div>

        </div>

    </div>

</div>



<div class="tab-content-box">

    <div class="row">

        <div class="col-md-5">

            <div class="tab-img" data-aos="fade-right" data-aos-duration="1500">

                <img src="<?= base_url('material/front/assets/img') ?>/Vietnam.webp" alt="" class="img-fluid">

            </div>

        </div>

        <div class="col-md-5">

            <div class="tab-content-text" data-aos="zoom-in" data-aos-duration="1500">

                <h3>Vietnam</h3>

                <ul class="d-flex amazing-deal-bottom">

                    <li><i class="fas fa-clock"></i> 7D/6N</li>

                    <li><i class="fas fa-users"></i> pax: 4</li>

                </ul>

                <div class="highlight-box">

                    <h5>Highlights</h5>

                    <ul>

                        <li>Halong Bay Cruise</li>

                        <li>Hanoi City tour</li>

                        <li>Cuchi Tunnels, Mekong Delta tour</li>

                        <li>Hochiminh City Tour</li>

                        <li>Danang -Bana Hill tour with Golden Bridge</li>

                    </ul>

                </div>

                <div class="inclusions-box">

                    <h5>Inclusions</h5>

                    <ul>

                        <li>Accommodation at 4 * with breakfast</li>

                        <li>English-speaking tour guide</li>

                        <li>Both ways airport transfers by</li>

                    </ul>

                </div>

            </div>

        </div>

        <div class="col-md-2" data-aos="fade-left" data-aos-duration="1500">

            <div class="price-box">

                <h4><span>₹</span> 58,639</h4>

                <p>/per person</p>

            </div>

            <div class="btn-box">

                <a href="#" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#book-now-modal">book now</a>

                <a href="#" class="btn primary-btn">View more</a>

            </div>

        </div>

    </div>

</div>

<div class="tab-content-box">

    <div class="row">

        <div class="col-md-5">

            <div class="tab-img" data-aos="fade-right" data-aos-duration="1500">

                <img src="<?= base_url('material/front/assets/img') ?>/Azerbaijan.webp" alt="" class="img-fluid">

            </div>

        </div>

        <div class="col-md-5">

            <div class="tab-content-text" data-aos="zoom-in" data-aos-duration="1500">

                <h3>Azerbaijan</h3>

                <ul class="d-flex amazing-deal-bottom">

                    <li><i class="fas fa-clock"></i> 6D/5N</li>

                    <li><i class="fas fa-users"></i> pax: 4</li>

                </ul>

                <div class="highlight-box">

                    <h5>Highlights</h5>

                    <ul>

                        <li>Baku city tour</li>

                        <li>Fire worship temple</li>

                        <li>Gabala tour with cable car</li>

                    </ul>

                </div>

                <div class="inclusions-box">

                    <h5>Inclusions</h5>

                    <ul>

                        <li>Accommodation at 4 * with breakfast</li>

                        <li>Transportation with private car air-conditioned

                            (for airport transfers)</li>

                        <li>Baku city tour-Observation tour to Baku TV Tower,

                            Highland park,Nizami street for shopping,Baku</li>

                    </ul>

                </div>

            </div>

        </div>

        <div class="col-md-2" data-aos="fade-left" data-aos-duration="1500">

            <div class="price-box">

                <h4><span>₹</span> 25,334</h4>

                <p>/per person</p>

            </div>

            <div class="btn-box">

                <a href="#" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#book-now-modal">book now</a>

                <a href="#" class="btn primary-btn">View more</a>

            </div>

        </div>

    </div>

</div>

<div class="tab-content-box">

    <div class="row">

        <div class="col-md-5">

            <div class="tab-img" data-aos="fade-right" data-aos-duration="1500">

                <img src="<?= base_url('material/front/assets/img') ?>/Kenya.webp" alt="" class="img-fluid">

            </div>

        </div>

        <div class="col-md-5">

            <div class="tab-content-text" data-aos="zoom-in" data-aos-duration="1500">

                <h3>Kenya with Tanzania</h3>

                <ul class="d-flex amazing-deal-bottom">

                    <li><i class="fas fa-clock"></i> 8D/7N</li>

                    <li><i class="fas fa-users"></i> pax: 4</li>

                </ul>

                <div class="highlight-box">

                    <h5>Highlights</h5>

                    <ul>

                        <li>Jerusalem Photo Shoot enroute Masai Maara

                            Masai Maara Game Drive</li>

                        <li>Hippo Pool and Boundary Pillar Photo Shoot

                            enroute Serengeti </li>

                    </ul>

                </div>

                <div class="inclusions-box">

                    <h5>Inclusions</h5>

                    <ul>

                        <li>4-star Accommodation (double/twin sharing basis)

                            with daily breakfast</li>

                        <li>English-speaking Driver cum tour guide -Jomo

                            Kenyatta International Airport</li>

                    </ul>

                </div>

            </div>

        </div>

        <div class="col-md-2" data-aos="fade-left" data-aos-duration="1500">

            <div class="price-box">

                <h4><span>₹</span> 218,954</h4>

                <p>/per person</p>

            </div>

            <div class="btn-box">

                <a href="#" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#book-now-modal">book now</a>

                <a href="#" class="btn primary-btn">View more</a>

            </div>

        </div>

    </div>

</div>

<div class="tab-content-box">

    <div class="row">

        <div class="col-md-5">

            <div class="tab-img" data-aos="fade-right" data-aos-duration="1500">

                <img src="<?= base_url('material/front/assets/img') ?>/South-Africa.webp" alt="" class="img-fluid">

            </div>

        </div>

        <div class="col-md-5">

            <div class="tab-content-text" data-aos="zoom-in" data-aos-duration="1500">

                <h3>South Africa</h3>

                <ul class="d-flex amazing-deal-bottom">

                    <li><i class="fas fa-clock"></i> 7D/6N</li>

                    <li><i class="fas fa-users"></i> pax: 4</li>

                </ul>

                <div class="highlight-box">

                    <h5>Highlights</h5>

                    <ul>

                        <li>CAPE TOWN CITY TOUR</li>

                        <li>Table Mountain Ticket</li>

                        <li>Seal Island Cruise</li>

                        <li>Boulders Beach</li>

                    </ul>

                </div>

                <div class="inclusions-box">

                    <h5>Inclusions</h5>

                    <ul>

                        <li>4-star Accommodation (double/twin sharing basis)

                            with daily breakfast</li>

                        <li>Meals as mentioned above</li>

                    </ul>

                </div>

            </div>

        </div>

        <div class="col-md-2" data-aos="fade-left" data-aos-duration="1500">

            <div class="price-box">

                <h4><span>₹</span> 88,210</h4>

                <p>/per person</p>

            </div>

            <div class="btn-box">

                <a href="#" class="btn primary-btn" data-bs-toggle="modal" data-bs-target="#book-now-modal">book now</a>

                <a href="#" class="btn primary-btn">View more</a>

            </div>

        </div>

    </div>

</div> -->