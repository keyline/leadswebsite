<?php
$db = \Config\Database::connect();
?>
    <!-- ********|| BANNER ENDS ||******** -->
    <div class="home_slider_section">
        <div>
            <div>
                <div id="tt-home-carousel" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="home_banner_slider_holder">
                                    <div class="row vh-100">
                                        <div class="col-md-4 d-none d-md-block d-flex align-items-end ">
                                            <img src="<?= base_url('public/') ?>/assets/img/home_model.webp" alt=""
                                                class="img-fluid home_banner_model animated fadeInLeft delay-1">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="home_slider_info">
                                                <img src="<?= base_url('public/') ?>/assets/img/home_banner_product.webp" alt=""
                                                    class="img-fluid home_banner_slider_product animated fadeInDown delay-2">
                                                <div class="home_slider_inner">
                                                    <h2 class="animated fadeInRight delay-3">Smart</h2>
                                                    <p class="animated fadeInRight delay-4"><span>Chimney</span> for Smart
                                                        People</p>
                                                    <div class="home_banner_btn_holder animated fadeInUp delay-5">
                                                        <a href="#" class="home_banner_btn">View All <img
                                                                src="<?= base_url('public/') ?>/assets/img/arrow-long.webp" alt=""
                                                                class="img-fluid long-arrow"></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="home_banner_slider_holder home_banner_slider_holder2">
                                    <div class="row vh-100">
                                        <div class="col-md-5 d-none d-md-block d-flex align-items-end ">
                                            <img src="<?= base_url('public/') ?>/assets/img/banner_ai_model.webp" alt=""
                                                class="img-fluid home_banner_model animated fadeInLeft delay-1">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="home_slider_info">
                                                <img src="<?= base_url('public/') ?>/assets/img/banner_ai_product.webp" alt=""
                                                    class="img-fluid home_banner_slider_product animated fadeInDown delay-2">
                                                <div class="home_slider_inner">
                                                    <h2 class="animated fadeInRight delay-3"><span>India's</span>No. 1</h2>
                                                    <p class="animated fadeInRight delay-4"><span>First</span> Ai Integrated <span>Kitchen Chimney</span></p>
                                                    <div class="home_banner_btn_holder animated fadeInUp delay-5">
                                                        <a href="#" class="home_banner_btn">View All <img
                                                                src="<?= base_url('public/') ?>/assets/img/arrow-long.webp" alt=""
                                                                class="img-fluid long-arrow"></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="home_banner_slider_holder home_banner_slider_holder3">
                                    <div class="row vh-100">

                                        <div class="col-md-7">
                                            <div class="home_slider_info">
                                                <div class="home_silder_imginner">
                                                    <img src="<?= base_url('public/') ?>/assets/img/banner_3_product.png" alt=""
                                                        class="img-fluid home_banner_slider_product animated fadeInDown delay-2">
                                                </div>
                                                <div class="home_slider_inner">
                                                    <h2 class="animated fadeInLeft delay-3">Pure Water, Pure Life –</h2>
                                                    <p class="animated fadeInRight delay-4">Drink Safe, Live Healthy</p>
                                                    <div class="home_banner_btn_holder animated fadeInUp delay-5">
                                                        <a href="#" class="home_banner_btn">View All <img
                                                                src="<?= base_url('public/') ?>/assets/img/arrow-long.webp" alt=""
                                                                class="img-fluid long-arrow"></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-5 d-none d-md-block d-flex align-items-end ">
                                            <img src="<?= base_url('public/') ?>/assets/img/banner_3_human.png" alt=""
                                                class="img-fluid home_banner_model animated fadeInRight delay-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="home_banner_slider_holder home_banner_slider_holder4">
                                    <div class="row vh-100">
                                        <div class="col-md-7">
                                            <div class="home_slider_info">
                                                <div class="home_slider_inner">
                                                    <h2 class="animated fadeInRight delay-3">Effortless Cooking,<br>Elegant Design</h2>
                                                    <p class="animated fadeInRight delay-4">Upgrade Your Cook Top!</p>
                                                    <div class="home_banner_btn_holder animated fadeInUp delay-5">
                                                        <a href="#" class="home_banner_btn">View All <img
                                                                src="<?= base_url('public/') ?>/assets/img/arrow-long.webp" alt=""
                                                                class="img-fluid long-arrow"></a>
                                                    </div>
                                                </div>
                                                <div class="home_silder_imginner">
                                                    <img src="<?= base_url('public/') ?>/assets/img/banner_4_product.png" alt=""
                                                        class="img-fluid home_banner_slider_product animated fadeInDown delay-2">
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-md-4 d-none d-md-block d-flex align-items-end ">
                                            <img src="<?= base_url('public/') ?>/assets/img/banner_4_human.png" alt=""
                                                class="img-fluid home_banner_model animated fadeInLeft delay-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#tt-home-carousel" data-bs-slide-to="0" class="active thumb_inner"
                                aria-current="true" aria-label="Slide 1">
                                <div>
                                    <img src="<?= base_url('public/') ?>/assets/img/banner_icon1.png" />
                                    <h4>Kitchen Chimney</h4>
                                </div>
                            </button>
                            <button type="button" data-bs-target="#tt-home-carousel" data-bs-slide-to="1"
                                aria-label="Slide 2" class="thumb_inner">
                                <div>
                                    <img src="<?= base_url('public/') ?>/assets/img/bulet_ai_icon.png" />
                                    <h4>ai enabled Chimney</h4>
                                </div>
                            </button>
                            <button type="button" data-bs-target="#tt-home-carousel" data-bs-slide-to="2"
                                aria-label="Slide 3" class="thumb_inner">
                                <div>
                                    <img src="<?= base_url('public/') ?>/assets/img/banner_icon2.png" />
                                    <h4>RO Water Purifier</h4>
                                </div>
                            </button>
                            <button type="button" data-bs-target="#tt-home-carousel" data-bs-slide-to="3"
                                aria-label="Slide 4" class="thumb_inner">
                                <div>
                                    <img src="<?= base_url('public/') ?>/assets/img/banner_icon3.png" />
                                    <h4>Cook Tops Hob Tops</h4>
                                </div>
                            </button>
                        </div>
                    </div>
                    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#tt-home-carousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#tt-home-carousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- ********||HOME PRODUCT SECTION START ||******** -->

    <section class="home_product_section">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-sm-3">
                    <div class="home_product_heading_box" data-aos="fade-right">
                        <h2>Products</h2>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="home_product_tab_box" data-aos="fade-left">
                        <ul class="nav nav-pills home_product_tab" id="pills-tab" role="tablist">
                            <?php foreach($product_category as $key => $row) {    ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?= $key == 0 ? 'active' : '' ?>" id="<?=$row->id?>-tab" data-bs-toggle="pill"
                                    data-bs-target="#<?=$row->id?>" type="button" role="tab" aria-controls="<?=$row->id?>"
                                    aria-selected="<?= $key == 0 ? 'true' : 'false' ?>"><?= $row->name;?></button>
                            </li>
                            <?php } ?>
                           
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-4 mt-sm-5">
                <div class="col-12">
                    <div class="home_product_tab_content_box" data-aos="fade-down" data-aos-duration="1000">
                        <div class="tab-content" id="pills-tabContent">
                            <?php foreach($product_category as $key => $row) { 
                                $productcatID = $row->id;
                                $sql = "SELECT * FROM `product` WHERE `product_category` = '$productcatID'";
                                $products = $db->query($sql)->getResult();                                     
                                ?>
                            <div class="tab-pane fade <?= $key == 0 ? 'show active' : '' ?>" id="<?=$row->id?>" role="tabpanel"
                                aria-labelledby="<?=$row->id?>-tab" tabindex="0">
                                <!-- Swiper -->
                                <div class="swiper productswiper">
                                    <div class="swiper-wrapper">
                                    <?php foreach($products as $product){  ?>
                                        <div class="swiper-slide">
                                            <div class="product_item">
                                                <div class="badge-product-sale">
                                                    <?php if($product->is_new == 1) {?>
                                                    <span class="ribbon-v">
                                                        <p>new</p>
                                                    </span>
                                                    <?php } ?>
                                                </div>
                                                <div class="swiper productimgswiper" id="mySwiperId">
                                                    <div class="swiper-wrapper">
                                                        <?php $productID = $product->id;
                                                        $sql1 = "SELECT * FROM `product_others_image` WHERE `product_id` = '$productID'";
                                                        $others_images = $db->query($sql1)->getResult();
                                                         foreach($others_images as $others_image){ ?>
                                                        <div class="swiper-slide">
                                                            <div class="product_info">                                                           
                                                                <img src="<?=base_url('/uploads/product/'.$others_image->image_file)?>" alt="" class="img-fluid">
                                                                <h4><?=$product->product_title?></h4>
                                                                <p>Air Flow : <?=$product->air_flow?></p>                                                            
                                                            </div>
                                                        </div>  
                                                        <?php } ?>                                                     
                                                    </div>
                                                    <div class="swiper-pagination"></div>
                                                </div>
                                                <div class="other_info_box">
                                                    <ul class="d-flex justify-content-center">
                                                        <?php foreach(json_decode($product->warrenty_section) as $warrenty_section) { ?>                                                    
                                                        <li> 
                                                        <?php if($warrenty_section == "warrenty") {  ?>                                                           
                                                            <img src="<?= base_url('public/') ?>/assets/img/warenty.webp" alt="" class="img-fluid">
                                                            <?php } else if($warrenty_section == "motion_sensor") {?>   
                                                            <img src="<?= base_url('public/') ?>/assets/img/hand.webp" alt="" class="img-fluid">
                                                            <?php } else if($warrenty_section == "isa_technology") {?>   
                                                            <img src="<?= base_url('public/') ?>/assets/img/isa.webp" alt="" class="img-fluid">
                                                            <?php } ?> 
                                                        </li>                                                         
                                                        <?php } ?>                                                 
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </div>
                                    <div class="navegiation_position">
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="view_all_box mt-5 text-end">
                            <a href="#">View all Chimney</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ********|| PRODUCT SECTION ENDS ||******** -->


    <!-- ********|| Home About STARTS ||******** -->
    <section class="home_about_section">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="about_info" data-aos="fade-down" data-aos-duration="1000">
                        <p>LEADS is the Brand Name of Leads Overseas Pvt. Ltd. AN ISO 9001:2008 Certified company, established in 2002. Company has gained excellent reputation within a very short period.</p>
                        <p class="mt-3">We Presently importing kitchen appliances from Malaysia and Manufactured Domestic and commercial water purification system with reputed High quality imported spare..</p>
                        <div class="about_more_box">
                            <a href="<?= base_url('about') ?>">
                                <h4>About</h4>
                                <p>MORE <img src="<?= base_url('public/') ?>/assets/img/arrow-long.webp" alt="" class="img-fluid long-arrow"></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ********|| Home About ENDS ||******** -->


    <!-- ********|| Home Success Stories STARTS ||******** -->



    <!-- ********|| Home Success Stories End ||******** -->






    <!-- ********|| Home 3 button Start ||******** -->
    <!-- feature icon section start -->
    <?= $feature ?>
    <!-- feature icon section end -->

    <!-- video section start -->
    <section class="home_video">
        <div class="home_debo_video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Vw7FQ4FaRKc?si=029kv4bemvaYcHFG" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <!-- <div id="video_section">
            <div class="video_text">
                <h2 class="where">Where</h2>
                <h2 class="technology">Technology</h2>
                <h2 class="meets">Meets</h2>
                <h2 class="style">Style</h2>
                <div class="video_holder">
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/Vw7FQ4FaRKc?si=xyqH8VeqKopfdb3e" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div> -->
    </section>
    <!-- video section end -->
    <!-- testimonias start section -->

    <?= $testimonialbox ?>
    <!-- testimonias end section -->

    <!-- home enquiry start -->
    <?= $enquiry ?>
    <!-- home enquiry end -->


    <!-- our clients start -->
    <?= $clientbox ?>
    <!--our clients  end -->


    <!-- home blog section start -->
    <?= $homepageBlogs ?>
    <!-- home blog section end -->

    <?= $this->section('scripts') ?>
    <script>
        $(document).ready(function() {

        });
    </script>
    <?= $this->endSection() ?>