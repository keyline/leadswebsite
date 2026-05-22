<?php
$db = \Config\Database::connect();
?>
<!-- ********|| BANNER ENDS ||******** -->
<!-- home page popup start-->
<!-- Modal -->
<div class="modal fade home_offer_modal"  id="home_offer_modal" tabindex="-1" aria-labelledby="home_offer_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <div class="modal-body">

                <?php if (session()->getFlashdata('success_message')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> <?= session()->getFlashdata('success_message') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error_message')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> <?= session()->getFlashdata('error_message') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <?php 
                // echo $popup_settings->popup_type;
                  if(isset($popup_settings) && $popup_settings->popup_type == 'form'){
                ?>
                <div class="offer_popup_holder">
                    <h1 class="heading">Get Your<br><strong> 10% OFF Coupon!</strong></h1>
                    <div class="sign-up">
                        <!-- <p class="text-center">Fill out the form below and receive your unique code instantly, Show your nearest Leads dealer & enjoy the discount.</p> -->
                        <form id="warranty_registration_form" method="POST" action="/offer" class="w-100">
                            <div class="input_holder">
                                <div class="text">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" placeholder="Full Name *" id="full_name" name="full_name" required>
                                </div>
                                <p class="text-danger ms-4 error" id="name-error"><?= session('errors.full_name') ?? '' ?></p>
                            </div>

                            <div class="input_holder">
                                <div class="text">
                                    <i class="fa fa-envelope"></i>
                                    <input type="email" placeholder="Email Address *" class="form-control" id="email_address" name="email_address" required>
                                </div>
                                <p class="text-danger ms-4 error" id="email-error"><?= session('errors.email_address') ?? '' ?></p>
                            </div>
                            <div class="input_holder">
                                <div class="text">
                                    <i class="fa fa-mobile"></i>
                                    <input type="text" class="form-control" placeholder="Phone Number *" id="phone_number" name="phone_number" required>
                                </div>
                                <p class="text-danger ms-4 error" id="phone-error"><?= session('errors.phone_number') ?? '' ?></p>
                            </div>
                            <div class="input_holder">
                                <div class="text">
                                    <i class="fa fa-globe"></i>                                    
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Address *" required>
                                </div>
                                <p class="text-danger ms-4 error" id="address-error"><?= session('errors.address') ?? '' ?></p>
                            </div>                            
                            <div class="input_holder">
                                <input type="hidden" name="recaptcha_token" id="recaptcha_token">

                                <!-- g-recaptcha -->
                                <button class="btn btn-primary g-recaptcha " data-sitekey="<?= SITE_KEY ?>" data-callback='onSubmit1'>Generate My Coupon</button>
                            </div>
                        </form>
                    </div>
                </div> 
                <?php } else if(isset($popup_settings) && $popup_settings->popup_type == 'image' && !empty($popup_settings->image_path)) { 
                    $imagePath = base_url('uploads/popup/'.$popup_settings->image_path);
                ?>
                <div class="offer_popup_holder">
                      <img src="<?= $imagePath ?>" style="width:100%;" alt="Popup Image" />
                </div>   
                <?php } else if(isset($popup_settings) && $popup_settings->popup_type == 'video' && !empty($popup_settings->video_path)) { 
                    $videoPath = base_url('uploads/popup/'.$popup_settings->video_path);
                ?>
                <div class="offer_popup_holder">
                      <video src="<?= $videoPath ?>" style="width:100%;" autoplay muted loop controls >
                      </video>
                </div>
                <?php } else if(isset($popup_settings) && $popup_settings->popup_type == 'youtube_url' && !empty($popup_settings->youtube_url)) { 
                    // Extract YouTube video ID from URL
                    function getYoutubeId($url) { 
                                                  if (preg_match('/v=([^&]+)/', $url, $match)) { return $match[1];}
                                                  if (preg_match('/youtu\.be\/([^?]+)/', $url, $match)) { return $match[1]; }
                                                    return null;
                                                }
                    $videoId = getYoutubeId($popup_settings->youtube_url);                            
                    $youtubeVideoID = "https://www.youtube.com/embed/".htmlspecialchars($videoId);
                ?>

                  <div class="offer_popup_holder">
                    <?php if($videoId != null){ ?>
                    <iframe class="embed-responsive-item" src="<?= $youtubeVideoID ?>?autoplay=1&mute=1" 
                     allow="autoplay; encrypted-media"
                        style="width:100%; height: 400px;"
                        allowfullscreen></iframe>
                    <?php }else{ ?>
                         <p>Not found the url</p>
                     <?php } ?>
                  </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#home_offer_modal">
        Launch demo modal
    </button> -->
<!-- home page popup end -->
<!-- home slider backup  -->
<!-- <div class="home_slider_section">
    <div>
        <div>
            <div id="tt-home-carousel" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-inner">
                        slider 5 Cook Top
                        <div class="carousel-item active">
                            <div class="home_banner_slider_holder home_banner_slider_holder5 desktop_banner">
                                <div class="row justify-content-center align-items-end vh-100">
                                    <div class="col-lg-10 col-md-10">
                                        <div class="home_slider_info">
                                            <div class="slider5_model_box">
                                                <img src="<?= base_url('public/') ?>/assets/img/slider5_slider_model.webp" alt=""
                                            class="img-fluid home_banner_model animated fadeInLeft delay-1">
                                            </div>
                                            <div class="home_silder_imginner">
                                                <img src="<?= base_url('public/') ?>/assets/img/slider5_slider_products.webp" alt=""
                                                    class="img-fluid home_banner_slider_product animated fadeInRight delay-3">
                                            </div>
                                            <div class="home_slider_inner">
                                                <h4 class="animated fadeInRight delay-3">Reimagine your <br><strong>Kitchen</strong></h4>
                                                <p class="animated fadeInRight delay-4">With Leadss <br>Innovative technology</p>
                                                <div class="home_banner_btn_holder animated fadeInUp delay-5">
                                                    <a href="<?= base_url('/product/kitchen-chimney') ?>" class="home_banner_btn">View All <img
                                                            src="<?= base_url('public/') ?>/assets/img/arrow-org.webp" alt=""
                                                            class="img-fluid long-arrow"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            mobile banner
                            <a href="<?= base_url('/product/kitchen-chimney') ?>" class="mobile_banner">
                                <img src="<?= base_url('public/') ?>/assets/img/slider5_Mobile.webp" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                        Kitchen Chimney
                        <div class="carousel-item">
                            <div class="home_banner_slider_holder home_banner_slider_holder1 desktop_banner">
                                <div class="row vh-100">
                                    <div class="col-md-4 d-none d-md-block d-flex align-items-end ">
                                        <img src="<?= base_url('public/') ?>/assets/img/banner_new_lady1.webp" alt=""
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
                                                    <a href="<?= base_url('/product/kitchen-chimney') ?>" class="home_banner_btn">View All <img
                                                            src="<?= base_url('public/') ?>/assets/img/arrow-long.webp" alt=""
                                                            class="img-fluid long-arrow"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            mobile banner
                            <a href="<?= base_url('/product/kitchen-chimney') ?>" class="mobile_banner">
                                <img src="<?= base_url('public/') ?>/assets/img/leads_m_banner1.webp" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                        ai Kitchen Chimney
                        <div class="carousel-item">
                            <div class="home_banner_slider_holder home_banner_slider_holder2 desktop_banner">
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
                                                    <a href="<?= base_url('/product/kitchen-chimney') ?>" class="home_banner_btn">View All <img
                                                            src="<?= base_url('public/') ?>/assets/img/arrow-long.webp" alt=""
                                                            class="img-fluid long-arrow"></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            mobile banner
                            <a href="<?= base_url('/product/kitchen-chimney') ?>" class="mobile_banner">
                                <img src="<?= base_url('public/') ?>/assets/img/leads_m_banner2.webp" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                        Pure Water
                        <div class="carousel-item">
                            <div class="home_banner_slider_holder home_banner_slider_holder3 desktop_banner">
                                <div class="row justify-content-center vh-100">
                                    <div class="col-lg-8 col-md-10">
                                        <div class="home_slider_info">
                                            <div class="home_silder_imginner">
                                                <img src="<?= base_url('public/') ?>/assets/img/banner_3_product.png" alt=""
                                                    class="img-fluid home_banner_slider_product animated fadeInDown delay-2">
                                            </div>
                                            <div class="home_slider_inner">
                                                <h2 class="animated fadeInLeft delay-3">Pure Water, Pure Life –</h2>
                                                <p class="animated fadeInRight delay-4">Drink Safe, Live Healthy</p>
                                                <div class="home_banner_btn_holder animated fadeInUp delay-5">
                                                    <a href="<?= base_url('/product/ro-water-purifier') ?>" class="home_banner_btn">View All <img
                                                            src="<?= base_url('public/') ?>/assets/img/arrow-long.webp" alt=""
                                                            class="img-fluid long-arrow"></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            mobile banner
                            <a href="<?= base_url('/product/ro-water-purifier') ?>" class="mobile_banner">
                                <img src="<?= base_url('public/') ?>/assets/img/leads_m_banner3.webp" alt="" class="img-fluid">
                            </a>
                        </div>
                        Cook Top
                        <div class="carousel-item">
                            <div class="home_banner_slider_holder home_banner_slider_holder4 desktop_banner">
                                <div class="row justify-content-center align-items-end vh-100">
                                    <div class="col-lg-10 col-md-10">
                                        <div class="home_slider_info">
                                            <div class="home_silder_imginner">
                                                <img src="<?= base_url('public/') ?>/assets/img/banner_4_product.png" alt=""
                                                    class="img-fluid home_banner_slider_product animated fadeInDown delay-2">
                                            </div>
                                            <div class="home_slider_inner">
                                                <h2 class="animated fadeInRight delay-3">Effortless Cooking,<br>Elegant Design</h2>
                                                <p class="animated fadeInRight delay-4">Upgrade Your Cook Top!</p>
                                                <div class="home_banner_btn_holder animated fadeInUp delay-5">
                                                    <a href="<?= base_url('/product/cook-tops-hob-tops') ?>" class="home_banner_btn">View All <img
                                                            src="<?= base_url('public/') ?>/assets/img/arrow-long.webp" alt=""
                                                            class="img-fluid long-arrow"></a>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= base_url('/product/cook-tops-hob-tops') ?>" class="mobile_banner">
                                <img src="<?= base_url('public/') ?>/assets/img/leads_m_banner4.webp" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                        
                        
                    </div>


                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#tt-home-carousel" data-bs-slide-to="0" class="active thumb_inner"
                            aria-current="true" aria-label="Slide 0">
                            <div>
                                <img src="<?= base_url('public/') ?>/assets/img/all_products.svg" />
                                <h4>All Products</h4>
                            </div>
                        </button>
                        <button type="button" data-bs-target="#tt-home-carousel" data-bs-slide-to="1" class="thumb_inner"
                            aria-current="true" aria-label="Slide 1">
                            <div>
                                <img src="<?= base_url('public/') ?>/assets/img/banner_icon1.png" />
                                <h4>Kitchen Chimney</h4>
                            </div>
                        </button>
                        <button type="button" data-bs-target="#tt-home-carousel" data-bs-slide-to="2"
                            aria-label="Slide 2" class="thumb_inner">
                            <div>
                                <img src="<?= base_url('public/') ?>/assets/img/bulet_ai_icon.png" />
                                <h4>ai enabled Chimney</h4>
                            </div>
                        </button>
                        <button type="button" data-bs-target="#tt-home-carousel" data-bs-slide-to="3"
                            aria-label="Slide 3" class="thumb_inner">
                            <div>
                                <img src="<?= base_url('public/') ?>/assets/img/banner_icon2.png" />
                                <h4>RO Water Purifier</h4>
                            </div>
                        </button>
                        <button type="button" data-bs-target="#tt-home-carousel" data-bs-slide-to="4"
                            aria-label="Slide 4" class="thumb_inner">
                            <div>
                                <img src="<?= base_url('public/') ?>/assets/img/banner_icon3.png" />
                                <h4>Cook Tops Hob Tops</h4>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="home_slider_section">
    <div>
        <div>
            <div id="tt-home-carousel" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-inner">
                        <!--ai enable chemny-->
                        <div class="carousel-item active">
                            <a href="<?= base_url('/product/kitchen-chimney') ?>">
                            <div class="home_banner_slider_holder home_banner_slider_holder3 desktop_banner">
                                <div class="row justify-content-center vh-100">
                                    <!-- <div class="col-lg-8 col-md-10">
                                        <div class="home_slider_info">
                                            <div class="home_silder_imginner">
                                                <img src="<?= base_url('public/') ?>/assets/img/banner_3_product.png" alt=""
                                                    class="img-fluid home_banner_slider_product animated fadeInDown delay-2">
                                            </div>
                                            <div class="home_slider_inner">
                                                <h2 class="animated fadeInLeft delay-3">Pure Water, Pure Life –</h2>
                                                <p class="animated fadeInRight delay-4">Drink Safe, Live Healthy</p>
                                                <div class="home_banner_btn_holder animated fadeInUp delay-5">
                                                    <a href="<?= base_url('/product/ro-water-purifier') ?>" class="home_banner_btn">View All <img
                                                            src="<?= base_url('public/') ?>/assets/img/arrow-long.webp" alt=""
                                                            class="img-fluid long-arrow"></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            </a>
                            <!-- mobile banner -->
                            <a href="<?= base_url('/product/kitchen-chimney') ?>" class="mobile_banner">
                                <img src="<?= base_url('public/') ?>/assets/img/ai-kitchen-chimney-mobile.webp" alt="" class="img-fluid">
                            </a>
                        </div>
                        <!-- Kitchen Chimney -->
                        <div class="carousel-item">
                            <a href="<?= base_url('/product/kitchen-chimney') ?>">
                            <div class="home_banner_slider_holder home_banner_slider_holder1 desktop_banner">
                                <div class="row vh-100">
                                    <!-- <div class="col-md-4 d-none d-md-block d-flex align-items-end ">
                                        <img src="<?= base_url('public/') ?>/assets/img/banner_new_lady1.webp" alt=""
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
                                                    <a href="<?= base_url('/product/kitchen-chimney') ?>" class="home_banner_btn">View All <img
                                                            src="<?= base_url('public/') ?>/assets/img/arrow-long.webp" alt=""
                                                            class="img-fluid long-arrow"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            </a>
                            <!-- mobile banner -->
                            <a href="<?= base_url('/product/kitchen-chimney') ?>" class="mobile_banner">
                                <img src="<?= base_url('public/') ?>/assets/img/kitchen-chimney-mobile.webp" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                        <!-- Pure Water -->
                        <div class="carousel-item">
                            <a href="<?= base_url('/product/ro-water-purifier') ?>">
                            <div class="home_banner_slider_holder home_banner_slider_holder4 desktop_banner">
                                <div class="row justify-content-center align-items-end vh-100">
                                    <!-- <div class="col-lg-10 col-md-10">
                                        <div class="home_slider_info">
                                            <div class="home_silder_imginner">
                                                <img src="<?= base_url('public/') ?>/assets/img/banner_4_product.png" alt=""
                                                    class="img-fluid home_banner_slider_product animated fadeInDown delay-2">
                                            </div>
                                            <div class="home_slider_inner">
                                                <h2 class="animated fadeInRight delay-3">Effortless Cooking,<br>Elegant Design</h2>
                                                <p class="animated fadeInRight delay-4">Upgrade Your Cook Top!</p>
                                                <div class="home_banner_btn_holder animated fadeInUp delay-5">
                                                    <a href="<?= base_url('/product/cook-tops-hob-tops') ?>" class="home_banner_btn">View All <img
                                                            src="<?= base_url('public/') ?>/assets/img/arrow-long.webp" alt=""
                                                            class="img-fluid long-arrow"></a>
                                                </div>
                                            </div>



                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <a href="<?= base_url('/product/ro-water-purifier') ?>" class="mobile_banner">
                                <img src="<?= base_url('public/') ?>/assets/img/ro-water-purifier-mobile.webp" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                        </a>
                        
                    </div>
                        <!--all product-->
                        <div class="carousel-item">
                            <a href="<?= base_url('/product/kitchen-chimney') ?>">
                            <div class="home_banner_slider_holder home_banner_slider_holder5 desktop_banner">
                                <div class="row justify-content-center align-items-end vh-100">
                                    <div class="col-lg-10 col-md-10">
                                        <!-- <div class="home_slider_info">
                                            <div class="slider5_model_box">
                                                <img src="<?= base_url('public/') ?>/assets/img/slider5_slider_model.webp" alt=""
                                            class="img-fluid home_banner_model animated fadeInLeft delay-1">
                                            </div>
                                            <div class="home_silder_imginner">
                                                <img src="<?= base_url('public/') ?>/assets/img/slider5_slider_products.webp" alt=""
                                                    class="img-fluid home_banner_slider_product animated fadeInRight delay-3">
                                            </div>
                                            <div class="home_slider_inner">
                                                <h4 class="animated fadeInRight delay-3">Reimagine your <br><strong>Kitchen</strong></h4>
                                                <p class="animated fadeInRight delay-4">With Leadss <br>Innovative technology</p>
                                                <div class="home_banner_btn_holder animated fadeInUp delay-5">
                                                    <a href="<?= base_url('/product/kitchen-chimney') ?>" class="home_banner_btn">View All <img
                                                            src="<?= base_url('public/') ?>/assets/img/arrow-org.webp" alt=""
                                                            class="img-fluid long-arrow"></a>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            </a>
                            <!-- mobile banner -->
                            <a href="<?= base_url('/product/kitchen-chimney') ?>" class="mobile_banner">
                                <img src="<?= base_url('public/') ?>/assets/img/all-product-mobile.webp" alt=""
                                    class="img-fluid">
                            </a>
                        </div>

                        <div class="carousel-indicators">
                        <button type="button" data-bs-target="#tt-home-carousel" data-bs-slide-to="0"
                            aria-label="Slide 0" class="active thumb_inner">
                            <div>
                                <img src="<?= base_url('public/') ?>/assets/img/bulet_ai_icon.png" />
                                <h4>ai enabled Chimney</h4>
                            </div>
                        </button>
                        <button type="button" data-bs-target="#tt-home-carousel" data-bs-slide-to="1" class="thumb_inner"
                            aria-current="true" aria-label="Slide 1">
                            <div>
                                <img src="<?= base_url('public/') ?>/assets/img/banner_icon1.png" />
                                <h4>Kitchen Chimney</h4>
                            </div>
                        </button>
                        
                        <button type="button" data-bs-target="#tt-home-carousel" data-bs-slide-to="2"
                            aria-label="Slide 2" class="thumb_inner">
                            <div>
                                <img src="<?= base_url('public/') ?>/assets/img/banner_icon2.png" />
                                <h4>RO Water Purifier</h4>
                            </div>
                        </button>
                        <button type="button" data-bs-target="#tt-home-carousel" data-bs-slide-to="3" class="thumb_inner"
                            aria-current="true" aria-label="Slide 3">
                            <div>
                                <img src="<?= base_url('public/') ?>/assets/img/all_products.svg" />
                                <h4>All Products</h4>
                            </div>
                        </button>
                        <!-- <button type="button" data-bs-target="#tt-home-carousel" data-bs-slide-to="4"
                            aria-label="Slide 4" class="thumb_inner">
                            <div>
                                <img src="<?= base_url('public/') ?>/assets/img/banner_icon3.png" />
                                <h4>Cook Tops Hob Tops</h4>
                            </div>
                        </button> -->
                    </div>
                </div>
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
                        <?php foreach ($product_category as $key => $row) {    ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?= $key == 0 ? 'active' : '' ?>" id="<?= $row->id ?>-tab" data-bs-toggle="pill"
                                    data-bs-target="#<?= $row->id ?>" type="button" role="tab" aria-controls="<?= $row->id ?>"
                                    aria-selected="<?= $key == 0 ? 'true' : 'false' ?>">
                                    <img src="<?= base_url('/uploads/product/' . $row->icon) ?>" class="img-fluid home_product_cat_icon" />
                                    <p><?= $row->name; ?></p>
                                </button>
                            </li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-4 mt-sm-5">
            <div class="col-12">
                <div class="home_product_tab_content_box" data-aos="fade-down" data-aos-duration="1000">
                    <?php
                    // Determine the active category
                    $activeCategory = $product_category[$key]; // Assuming the first category is active 
                    // pr($activeCategory);
                    // die;
                    ?>
                    <div class="tab-content" id="pills-tabContent">
                        <?php foreach ($product_category as $key => $row) {
                            $productcatID = $row->id;
                            $sql = "SELECT * FROM `product` WHERE `product_category` = '$productcatID' and `published` = '1' and `is_home` = '1' ORDER BY `regular_price` DESC LIMIT 5";
                            $products = $db->query($sql)->getResult();
                        ?>
                            <div class="tab-pane fade <?= $key == 0 ? 'show active' : '' ?>" id="<?= $row->id ?>" role="tabpanel"
                                aria-labelledby="<?= $row->id ?>-tab" tabindex="0">
                                <!-- Swiper -->
                                <div class="swiper productswiper">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($products as $product) {  ?>

                                            <div class="swiper-slide">
                                                <a href="<?= base_url('product-details') ?>/<?= $product->slug ?>">
                                                    <div class="product_item">
                                                        <div class="badge-product-sale">
                                                            <?php if ($product->is_new == 1) { ?>
                                                                <span class="ribbon-v">
                                                                    <p>new</p>
                                                                </span>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="swiper productimgswiper" id="mySwiperId">
                                                            <div class="swiper-wrapper">
                                                                <?php $productID = $product->id;
                                                                //  Show video slide AFTER all images                                                                   
                                                                $sql1 = "SELECT * FROM `product_others_image` WHERE `product_id` = '$productID' and `published` = '1'";
                                                                $others_images = $db->query($sql1)->getResult();
                                                                foreach ($others_images as $others_image) { ?>
                                                                    <div class="swiper-slide">
                                                                        <div class="product_info">
                                                                            <img src="<?= base_url('/uploads/product/' . $others_image->image_file) ?>" alt="" class="img-fluid">                                                                            
                                                                            <h4><?= $product->product_title ?></h4>
                                                                            <?php
                                                                            $content_title        = json_decode($product->content_title);
                                                                            $content_description  = json_decode($product->content_description);
                                                                            ?>
                                                                            <p><?= $content_title[0] ?> : <?= $content_description[0] ?></p>
                                                                        </div>                                                                        
                                                                    </div>
                                                                <?php }  
                                                                    if($product->isvideoupload == 'true' && $product->video_file != '') { ?>
                                                                    <div class="swiper-slide">
                                                                        <div class="product_info">
                                                                            <video width="100%" autoplay muted loop controls>
                                                                                <source src="<?= base_url('/uploads/product/' . $product->video_file) ?>" type="video/mp4">
                                                                            </video>
                                                                            <h4><?= $product->product_title ?></h4>
                                                                            <?php
                                                                            $content_title        = json_decode($product->content_title);
                                                                            $content_description  = json_decode($product->content_description);
                                                                            ?>
                                                                            <p><?= $content_title[0] ?> : <?= $content_description[0] ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <?php } elseif(!empty($product->video_code)) { ?>
                                                                        <div class="swiper-slide">
                                                                            <div class="product_info">
                                                                                <iframe class="img-fluid" src="https://www.youtube.com/embed/<?= $product->video_code ?>?autoplay=1&mute=1" 
                                                                                    title="YouTube video player" frameborder="0" 
                                                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                                                                    allowfullscreen>
                                                                                </iframe>
                                                                                <h4><?= $product->product_title ?></h4>
                                                                                <?php
                                                                                $content_title        = json_decode($product->content_title);
                                                                                $content_description  = json_decode($product->content_description);
                                                                                ?>
                                                                                <p><?= $content_title[0] ?> : <?= $content_description[0] ?></p>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>                                                               
                                                                </div>
                                                            <div class="swiper-pagination"></div>
                                                        </div>
                                                        <?php if (count(json_decode($product->warrenty_section))) { ?>
                                                            <div class="other_info_box">
                                                                <ul class="d-flex justify-content-center">
                                                                    <?php foreach (json_decode($product->warrenty_section) as $warrenty_section) { 
                                                                        $sql1 = "SELECT * FROM `warrenty_section` WHERE `id` = '$warrenty_section' and `published` != '3'";
                                                                        $warrentySections = $db->query($sql1)->getResult();
                                                                        // pr($warrentySections); 
                                                                        foreach($warrentySections as $warrentySection)   {?>
                                                                        <li>
                                                                            <img src="<?=base_url('/uploads/warrenty_section/'.$warrentySection->warrenty_section_icon)?>" alt="icon" class="img-fluid">
                                                                            <!-- ?php if ($warrenty_section == "warrenty") {  ?>
                                                                                <img src="?= base_url('public/') ?>/assets/img/warenty.svg" alt="" class="img-fluid">
                                                                            ?php } else if ($warrenty_section == "motion_sensor") { ?>
                                                                                <img src="?= base_url('public/') ?>/assets/img/hand.svg" alt="" class="img-fluid">
                                                                            ?php } else if ($warrenty_section == "isa_technology") { ?>
                                                                                <img src="?= base_url('public/') ?>/assets/img/isa.svg" alt="" class="img-fluid">
                                                                            ?php } ?> -->
                                                                        </li>
                                                                    <?php }  }?>
                                                                </ul>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </a>
                                            </div>

                                        <?php } ?>
                                    </div>
                                    <div class="navegiation_position">
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                                <div class="view_all_box mt-5 text-end">
                                    <a href="<?= base_url('product') ?>/<?= $row->slug ?>">View all <?= $row->name; ?></a>
                                </div>
                            </div>

                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ********|| PRODUCT SECTION ENDS ||******** -->


<!-- ********|| Home About STARTS ||******** -->
<section class="home_about_section video_section about_section_content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                
                <div class="about_info" data-aos="fade-down" data-aos-duration="1000">
                 <div class="video_box">
                            <?php if(isset($home_page_video_settings) && $home_page_video_settings->content_type == 'video' && !empty($home_page_video_settings->video_path)) { 
                                $videoPath = base_url('uploads/home_page_video/'.$home_page_video_settings->video_path);
                            ?>
                                    <video controls autoplay width="100%" height="300">
                                        <source src="<?= $videoPath ?>" type="video/mp4">
                                    </video>
                            <?php } else if(isset($home_page_video_settings) && $home_page_video_settings->content_type == 'youtube_url' && !empty($home_page_video_settings->youtube_url)) { 
                                // Extract YouTube video ID from URL (for server upload please comment this function for stop duplicate issue)
                                function getYoutubeIdForAbout($url) { 
                                                            if (preg_match('/v=([^&]+)/', $url, $match)) { return $match[1];}
                                                            if (preg_match('/youtu\.be\/([^?]+)/', $url, $match)) { return $match[1]; }
                                                                return null;
                                                            }
                                $videoId = getYoutubeIdForAbout($home_page_video_settings->youtube_url);                            
                                $youtubeVideoID = "https://www.youtube.com/embed/".htmlspecialchars($videoId);
                            ?>

                                <?php if($videoId != null){ ?>
                                   <iframe width="100%" height="300" src="<?= $youtubeVideoID ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                <?php }?>
                            <?php } ?>
                        <!-- <video controls autoplay>
                            <source src="</?= base_url('public/') ?>/assets/img/test.mp4" type="video/mp4">
                        </video> -->
                        <!-- <iframe width="100%" height="300" src="https://www.youtube.com/embed/oN9eLn-kg1w?si=fpIYx0IRef0GRPOK" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                    </div>
                    <div class="about_content">
                        <p>LEADSS is the Brand Name of Leads Overseas Pvt. Ltd. AN ISO 9001:2008 Certified company, established in 2002. Company has gained excellent reputation within a very short period.</p>
                        <p class="mt-3">We Presently importing kitchen appliances from Malaysia and Manufactured Domestic and commercial water purification system with reputed High quality imported spare..</p>
                    </div>
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
<section class="section-vid hideon_tab" id="home-section-4">
    <div class="text-line">Where</div>
    <div class="text-line">Technology</div>
    <div class="text-line">Meets</div>
    <div class="text-line">Style</div>
    <!--<div class="video-container">-->
    <!--    <iframe src="https://www.youtube.com/embed/UfIITDxhRJE?si=DbWBdXW3v739DMBJ?rel=0"-->
    <!--        title="YouTube video player"-->
    <!--        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"-->
    <!--        allowfullscreen>-->
    <!--    </iframe>-->
    <!--</div>-->
</section>
<style>
    body {
        overflow-x: hidden;
    }
</style>


<section class="home_enquiry video_section">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="about_info d-block" data-aos="fade-down" data-aos-duration="1000">
                    <div class="row">
                        <div class="col-md-6">
                           <?php if(isset($products_video_settings) && $products_video_settings->content_type1 == 'video' && !empty($products_video_settings->video_path1)){ 
                                  $videoPathForCont1 = base_url('uploads/products_video/'.$products_video_settings->video_path1);
                            ?>
                                    <video controls autoplay width="100%" height="315" style="background: #000;">
                                        <source src="<?= $videoPathForCont1 ?>" type="video/mp4">
                                    </video>

                           <?php } else if(isset($products_video_settings) && $products_video_settings->content_type1 == 'youtube_url' && !empty($products_video_settings->youtube_url1)) { 
                                function getYoutubeIdForCont1($url) { 
                                                            if (preg_match('/v=([^&]+)/', $url, $match)) { return $match[1];}
                                                            if (preg_match('/youtu\.be\/([^?]+)/', $url, $match)) { return $match[1]; }
                                                                return null;
                                                            }
                                $videoIdForCont1 = getYoutubeIdForCont1($products_video_settings->youtube_url1);                            
                                $youtubeVideoIDForCont1 = "https://www.youtube.com/embed/".htmlspecialchars($videoIdForCont1);
                            ?>
                                 <!-- <iframe width="100%" height="315" src="https://www.youtube.com/embed/PX9XNfsm4s8?si=WIFPY2br91YHCOnL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                                 <iframe width="100%" height="315" src="<?= $youtubeVideoIDForCont1 ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                           <?php } ?>     
                        </div>
                        <div class="col-md-6">
                            <?php if(isset($products_video_settings) && $products_video_settings->content_type2 == 'video' && !empty($products_video_settings->video_path2)){ 
                                  $videoPathForCont2 = base_url('uploads/products_video/'.$products_video_settings->video_path2);
                            ?>
                                    <video controls autoplay width="100%" height="315">
                                        <source src="<?= $videoPathForCont2 ?>" type="video/mp4">
                                    </video>

                           <?php } else if(isset($products_video_settings) && $products_video_settings->content_type2 == 'youtube_url' && !empty($products_video_settings->youtube_url2)) { 
                                function getYoutubeIdForCont2($url) { 
                                                            if (preg_match('/v=([^&]+)/', $url, $match)) { return $match[1];}
                                                            if (preg_match('/youtu\.be\/([^?]+)/', $url, $match)) { return $match[1]; }
                                                                return null;
                                                            }
                                $videoIdForCont2 = getYoutubeIdForCont2($products_video_settings->youtube_url2);                            
                                $youtubeVideoIDForCont2 = "https://www.youtube.com/embed/".htmlspecialchars($videoIdForCont2);
                            ?>
                                 <!-- <iframe width="100%" height="315" src="https://www.youtube.com/embed/UfIITDxhRJE?si=Qevm7DtfVGwvvyK3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                                 <iframe width="100%" height="315" src="<?= $youtubeVideoIDForCont2 ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                           <?php } ?>
                        </div>
                    </div>
                    
                    <div class="about_more_box">
                        <a href="javascript: void(0)">
                            <h4>Products</h4>
                            <p>Video <img src="<?= base_url('public/') ?>/assets/img/arrow-long.webp" alt="" class="img-fluid long-arrow"></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

<?php
/*
if (session()->get('offer_submit')): ?>
    <script>
        showAlert({
            title: 'Request sent successfully',
            icon: "success"
        });
    </script>
<?php
    session()->remove('offer_submit');
endif;
*/
?>



<script>
    function validateForm() {
        let isValid = true;

        // Get form field values
        const fullName = $('#full_name').val().trim();
        const address = $('#address').val().trim();
        const email = $('#email_address').val().trim();
        const phoneNumber = $('#phone_number').val().trim();

        // Clear previous error messages
        $('.error').text('');

        // Validate Full Name
        if (fullName === '') {
            $('#name-error').text('Full Name is required.');
            isValid = false;
        }

        // Validate Email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === '') {
            $('#email-error').text('Email Address is required.');
            isValid = false;
        } else if (!emailRegex.test(email)) {
            $('#email-error').text('Enter a valid Email Address.');
            isValid = false;
        }

        // Validate Phone Number
        const phoneRegex = /^[0-9]{10}$/;
        if (phoneNumber === '') {
            $('#phone-error').text('Phone Number is required.');
            isValid = false;
        } else if (!phoneRegex.test(phoneNumber)) {
            $('#phone-error').text('Enter a valid 10-digit Phone Number.');
            isValid = false;
        }

        // Validate Address
        if (address === '') {
            $('#address-error').text('Address is required.');
            isValid = false;
        }

        // Return the overall validation status
        return isValid;
    }



    function onSubmit1(token) {
        if (validateForm()) {
            // Set the token in the hidden input
            $('#recaptcha_token').val(token);

            $('#warranty_registration_form').submit();
        } else return false;

    }


    $(document).ready(function() {
        $("#home_offer_modal").modal('show');
    });

    // Register ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);

    // Select text lines and video container
    const lines = document.querySelectorAll(".text-line");
    const videoContainer = document.querySelector(".video-container");

    // Create GSAP timeline
    const timeline = gsap.timeline({
        scrollTrigger: {
            trigger: "#home-section-4", // Trigger on section-4
            start: "top top", // Start when section-4 reaches the top
            end: "+=400%", // Scroll space to handle animations
            scrub: true, // Smooth scroll effect
            pin: true, // Pin the section during animation
        },
    });

    // Animate each line one by one with zoom effect
    lines.forEach((line, index) => {
        timeline.to(line, {
                opacity: 1, // Fade in
                scale: 1, // Zoom to normal size
                duration: 1.5,
                ease: "power3.out",
            }, index * 2) // Delay the start of each line
            .to(line, {
                opacity: 0, // Fade out as the next line starts to appear
                scale: 1.2, // Slight zoom-out as it fades away
                duration: 1,
                ease: "power3.in",
            }, index * 2 + 1); // Overlap fade-out with the next line fade-in
    });

    // Animate video fade-in after the last line
    timeline.to(videoContainer, {
        opacity: 1,
        scale: 1, // Zoom to normal size
        duration: 1.5,
        ease: "power3.out",
    });
</script>
<?= $this->endSection() ?>