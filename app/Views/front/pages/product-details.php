<?php $db = \Config\Database::connect();?>
<section class="inner_banner inner_floting_box_banner producttop_banner_section">
    <?php if ($productCat->banner != '') { ?>
        <img src="<?php echo base_url(); ?>/uploads/product/<?php echo $productCat->banner; ?>" class="img-responsive img-thumbnail producttop_banner_img" />
    <?php } else { ?>
        <img src="<?= base_url('public/') ?>/assets/img/about-inner-bg.webp" alt="" class="img-fluid">
    <?php  } ?>    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="inner_floting_box">
                    <div class="about_more_box">
                        <div class="mission_tabs productlist_bannericon">
                        <?php if ($productCat->icon != '') { ?>
                            <img src="<?php echo base_url(); ?>/uploads/product/<?php echo $productCat->icon; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;" />
                        <?php } else { ?>
                            <img src="<?= base_url('public/') ?>/assets/img/chimney-icon.webp" alt="" class="img-fluid">
                      <?php  } ?>
                            
                            <h4><?= $productCat->name?></h4>
                        </div>
                    </div>
                    <div class="backlistproduct">
                        <a href="<?=base_url()?>/product/<?=$productCat->slug?>"><i class="fa-solid fa-angles-left"></i> Back to Listing</a>
                        <!-- <button><a href="<?=base_url()?>/product/<?=$productCat->slug?>">Back to List</a></button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ?php pr($product); ?> -->
<!-- product listing section start -->
        <section class="product_details_back">
            <div class="container">            
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
            </div>
        </section>
        <section class="product_details">
            <div class="container">            
                <div class="row">
                    <div class="col-lg-5  col-md-12 mobile_order_left">
                        <div class="product_dtl_info">
                            <h2><?php  echo $product->product_title; ?> <?php if($product->is_new == 1){ ?><a href="#" class="new_badge">New</a><?php }?> </h2>
                        </div>
                        <div class="product_dtl_left">
                            <!-- Swiper -->
                            <div class="product_main_img">
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                class="swiper mySwiper2">
                                <div class="swiper-wrapper">
                                    <?php foreach($others_images as $others_image) {?>
                                    <div class="swiper-slide">
                                        <img src="<?=base_url('/uploads/product/'.$others_image->image_file)?>" class="img-fluid" />
                                    </div>
                                    <?php } ?>                                   
                                </div>
                            </div>
                            </div>
                            <div class="product_thumb_box">
                                <div class="row  align-items-center">
                                    <div class="col-lg-8 product_thumb_mob col-md-12">
                                        <div thumbsSlider="" class="swiper mySwiper">
                                            <div class="swiper-wrapper">
                                                <?php foreach($others_images as $others_image) {?>
                                                    <div class="swiper-slide">
                                                        <img src="<?=base_url('/uploads/product/'.$others_image->image_file)?>" class="img-fluid" />
                                                    </div>
                                                <?php } ?>                                                
                                            </div>
                                            <!-- <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="head_top_right">
                                            <h4>Share</h4>
                                            <ul class="head_social">
                                                <li><a href="https://www.facebook.com/sharer.php?u=<?=base_url()?>/product-details/<?=$product->slug?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                                <li><a href="https://twitter.com/intent/tweet?url=<?=base_url()?>/product-details/<?=$product->slug?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                                                <!-- <li><a href="#" target="_blank"><i class="fa-brands fa-youtube"></i></a></li> -->
                                                <li><a href="https://wa.me/?text=<?=base_url()?>/product-details/<?=$product->slug?>" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 mobile_order_right">
                        <div class="product_details_right">
                            <div class="product_dtl_info">
                            <h2><?=$product->product_title; ?> <?php if($product->is_new == 1){ ?><a href="#" class="new_badge">New</a><?php }?> </h2>
                                <div class="offerprice_top">
                                    <h5>Offer Price <span class="spancolon" style="font-weight: normal;">:</span></h5>
                                    <?php if(!empty($product->regular_price)){ ?>                                  
                                    <div class="pricename_offer"> <span class="regular_price"><span style="padding-right: 5px;font-size: 18px;"><i class="fa-solid fa-indian-rupee-sign"></i></span><?=$product->regular_price?></span></div> 
                                    <?php }?>
                                </div>
                            
                                    
                                <h5>Specifications:</h5>
                               
                                <ul class="specify_list">
                                <?php 
                                $content_title  = json_decode($product->content_title);
                                $content_description  = json_decode($product->content_description);
                                if(!empty($content_title)){
                                for($i = 1; $i <= count($content_title); $i++) {?>
                                    <li><span class="specfy_name"><?=$content_title[$i-1]?> <span class="spancolon">:</span></span> <span class="spandesi_left"> <span class="spandesi_info"><?=$content_description[$i-1]?></span></span></li> 
                                    <?php } ?>                                     
                                    <!-- ?php if(!empty($product->sale_price)){ ?>                                   -->
                                    <!-- <li><span class="specfy_name">Sale Price :</span> <span> ?=$product->sale_price?></span></li>  -->
                                    <?php  }?>
                                </ul>
                            </div>
                            <div class="product_dtl_keyfeature">
                                <div class="keyfaatu_line"><h3><span>Key Feature:</span></h3></div>                                
                                <ul class="keyfeature_list">
                                    <?php $key_feature = (json_decode($product->key_feature));
                                        foreach($key_feature as $key){
                                            $sql1 = "SELECT * FROM `key_feature` WHERE `id` = '$key' and `published` != '3'";
                                            $keyFeatures = $db->query($sql1)->getResult();
                                            //  pr($keyFeatures);  
                                            foreach($keyFeatures as $key_features)   {                          
                                    ?>
                                    <li>
                                        <div class="keyfeat_img"><img src="<?=base_url('/uploads/key_feature/'.$key_features->key_feature_icon)?>" alt="icon"></div>
                                        <div class="keyfet_inner">
                                            <h4><?= $key_features->key_feature_title?>:</h4>
                                            <p><?= $key_features->key_feature_description?></p>
                                        </div>
                                    </li>
                                    <?php } }?>                                    
                                </ul>
                                
                            </div>
                            <div class="prod_garaty">                                
                                <?php foreach(json_decode($product->warrenty_section) as $warrenty_section) { ?> 
                                <div class="gradt_icon">
                                    <?php if($warrenty_section == "warrenty") {  ?>
                                    <img src="<?= base_url('public/') ?>/assets/img/warenty.svg" alt="" class="img-fluid">
                                    <?php } else if($warrenty_section == "motion_sensor") {?>   
                                    <img src="<?= base_url('public/') ?>/assets/img/hand.svg" alt="" class="img-fluid">
                                    <?php } else if($warrenty_section == "isa_technology") {?>   
                                    <img src="<?= base_url('public/') ?>/assets/img/isa.svg" alt="" class="img-fluid">
                                    <?php } ?>
                                </div>     
                                <?php } ?>                                                                                                                                                                                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- product listing section end -->  
    <section class="product_related">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title"><h3>View Similar Products</h3></div>
                </div>
                <div class="col-md-12">                   
                    <div class="swiper productrelated">
                        <div class="swiper-wrapper">
                        <?php foreach ($relatedProduct as $relatedProducts) {  ?>
                            <div class="swiper-slide">
                                <a href="<?= base_url('product-details') ?>/<?= $relatedProducts->slug ?>">
                                    <div class="product_item">
                                        <div class="badge-product-sale">
                                            <?php if ($relatedProducts->is_new == 1) { ?>
                                                <span class="ribbon-v">
                                                    <p>new</p>
                                                </span>
                                            <?php } ?>
                                        </div>
                                        <div class="swiper productimgswiper" id="mySwiperId">
                                            <div class="swiper-wrapper">
                                                <?php $productID = $relatedProducts->id;
                                                $sql1 = "SELECT * FROM `product_others_image` WHERE `product_id` = '$productID' and `published` = '1'";
                                                $others_images = $db->query($sql1)->getResult();
                                                foreach ($others_images as $others_image) { ?>
                                                    <div class="swiper-slide">
                                                        <div class="product_info">                                                            
                                                            <img src="<?= base_url('/uploads/product/' . $others_image->image_file) ?>" alt="" class="img-fluid">
                                                            <h4><?= $relatedProducts->product_title ?></h4>
                                                            <?php
                                                            $content_title        = json_decode($relatedProducts->content_title);
                                                            $content_description  = json_decode($relatedProducts->content_description);
                                                            ?>
                                                            <p><?= $content_title[0] ?> : <?= $content_description[0] ?></p>
                                                        </div>
                                                    </div> 
                                                <?php } ?>                                               
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                        <div class="other_info_box">
                                            <ul class="d-flex justify-content-center">
                                                <?php foreach (json_decode($relatedProducts->warrenty_section) as $warrenty_section) { ?>
                                                    <li>
                                                        <?php if ($warrenty_section == "warrenty") {  ?>
                                                            <img src="<?= base_url('public/') ?>/assets/img/warenty.svg" alt="" class="img-fluid">
                                                        <?php } else if ($warrenty_section == "motion_sensor") { ?>
                                                            <img src="<?= base_url('public/') ?>/assets/img/hand.svg" alt="" class="img-fluid">
                                                        <?php } else if ($warrenty_section == "isa_technology") { ?>
                                                            <img src="<?= base_url('public/') ?>/assets/img/isa.svg" alt="" class="img-fluid">
                                                        <?php } ?>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
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
                </div>
            </div>
        </div>
    </section>


  <?= $this->section('scripts') ?>
  <script>
      $(document).ready(function() {
         

          var a = new StickySidebar('#sticky-sidebar-demo', {
              topSpacing: 25,
              containerSelector: '.blogdetails_item',
              innerWrapperSelector: '.sidebar__inner'
          });

          var a = new StickySidebar('#sticky-sidebar-cateogy', {
              topSpacing: 25,
              containerSelector: '.blogdetails_item',
              innerWrapperSelector: '.sidebar__inner'
          });



          // Count the number of items
          var itemCount = $("#blogdetails-recent .item").length;
          $("#blogdetails-recent").owlCarousel({
              loop: itemCount > 4,
              margin: 20,
              dots: false,
              nav: false,
              autoplay: false,
              autoplayTimeout: 4000,
              autoplayHoverPause: true,
              animateIn: 'fadeIn',
              animateOut: 'fadeOut',
              navText: ["<i class='zmdi zmdi-arrow-left'></i>", "<i class='zmdi zmdi-arrow-right'></i>"],
              responsive: {
                  0: {
                      items: 1,
                  },
                  600: {
                      items: 2,
                  },
                  750: {
                      items: 2,
                  },
                  1000: {
                      items: 3,
                  },
                  1200: {
                      items: 4,
                  }
              }
          });
      });
  </script>
  <script>
        var swiper = new Swiper(".productrelated", {
            loop: true,
            spaceBetween: 25,
            slidesPerView: 4,
            rewind: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                575: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
                1400: {
                    slidesPerView: 4,
                },
            }
        });
        
    </script>
    <script>
        // first product image slider
        var swiper = new Swiper(".productimgswiper", {
            loop: true,
            spaceBetween: 0,
            
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            }
        });
        
        // swiper.autoplay.stop(), mySwiperId.addEventListener("mouseover", (function() {
        // swiper.autoplay.start()
        
        // })), mySwiperId.addEventListener("mouseout", (function() {
        // swiper.autoplay.stop()
        // }));
        
    </script>
  <?= $this->endSection() ?>