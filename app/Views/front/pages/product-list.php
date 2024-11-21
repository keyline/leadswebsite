<?= $this->section('style') ?>
<style>
    svg {
        width: 70px;
        height: 70px;
        margin: 20px;
        display: inline-block;
    }
</style>
<?= $this->endSection() ?>

<?php $db = \Config\Database::connect();?>

<!-- inner page banner start -->

<section class="inner_banner inner_floting_box_banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="inner_floting_box">
                    <div class="about_more_box">
                        <div class="mission_tabs">
                            <img src="<?= base_url('public/') ?>/assets/img/chimney-icon.webp" alt="" class="img-fluid">
                            <h4><?= $productCat->name?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- inner page banner end -->
<!-- mission section start -->
<section class="product_listing">
    <div class="container">
        <div class="row" id="product_list">
            <?php foreach ($product as $product_list):
            ?>                
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <a href="<?= base_url('product-details')?>/<?= $product_list->slug?>">
                        <div class="product_item">
                            <div class="badge-product-sale">
                                <?php if($product_list->is_new == 1) {?>
                                    <span class="ribbon-v">
                                        <p>new</p>
                                    </span>
                                <?php } ?>
                            </div>
                            <div class="swiper productimgswiper" id="mySwiperId">
                                <div class="swiper-wrapper">
                                    <?php $productID = $product_list->id;
                                        // $sql1 = "SELECT * FROM `product_others_image` WHERE `product_id` = '$productID' and `published` != '3'";
                                        // $others_images = $db->query($sql1)->getResult();
                                            foreach($product_list->others_images as $others_image){ 
                                                //   pr($others_image);?>
                                        <div class="swiper-slide">
                                            <div class="product_info">                                                           
                                                <img src="<?=base_url('/uploads/product/'.$others_image->image_file)?>" alt="" class="img-fluid">
                                                <h4><?=$product_list->product_title?></h4>
                                                <?php 
                                                    $content_title        = json_decode($product_list->content_title);
                                                    $content_description  = json_decode($product_list->content_description);
                                                    ?>
                                                    <p><?=$content_title[0]?> : <?=$content_description[0]?></p>                                                             
                                            </div>
                                        </div>  
                                <?php } ?>                               
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="other_info_box">
                                <ul class="d-flex justify-content-center">
                                    <?php foreach(json_decode($product_list->warrenty_section) as $warrenty_section) { ?>                                                    
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
                    </a>
                </div>                
            <?php endforeach;?>            
        </div>
        <button id="load_more_btn" style="float: right;background-color:#ed1c24;border: tomato;" class="btn btn-primary">Load More</button>
        <div id="loading" style="display: none;text-align: center;">

            <svg version="1.1" id="L5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <circle fill="#ed1c24" stroke="none" cx="6" cy="50" r="6">
                    <animateTransform
                        attributeName="transform"
                        dur="1s"
                        type="translate"
                        values="0 15 ; 0 -15; 0 15"
                        repeatCount="indefinite"
                        begin="0.1" />
                </circle>
                <circle fill="#ed1c24" stroke="none" cx="30" cy="50" r="6">
                    <animateTransform
                        attributeName="transform"
                        dur="1s"
                        type="translate"
                        values="0 10 ; 0 -10; 0 10"
                        repeatCount="indefinite"
                        begin="0.2" />
                </circle>
                <circle fill="#ed1c24" stroke="none" cx="54" cy="50" r="6">
                    <animateTransform
                        attributeName="transform"
                        dur="1s"
                        type="translate"
                        values="0 5 ; 0 -5; 0 5"
                        repeatCount="indefinite"
                        begin="0.3" />
                </circle>
            </svg>

            <!-- <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <path fill="#ed1c24" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                    <animateTransform
                        attributeName="transform"
                        attributeType="XML"
                        type="rotate"
                        dur="1s"
                        from="0 50 50"
                        to="360 50 50"
                        repeatCount="indefinite" />
                </path>
            </svg> -->

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

<?= $this->section('scripts') ?>
<!-- <script>
    $(document).ready(function() {
        // _________________________ load more _________________________
        let page = 1;
        let loading = false;

        function loadMoreContent() {
            if (!loading) {
                loading = true; // Set loading to true
                $('#loading').show(); // Show loading indicator

                page++; // Increment the page number
                $.ajax({
                    url: 'api/load_more_products', // URL to load more content
                    type: 'GET', // HTTP method
                    data: {
                        page: page
                    }, // Pass the page number to the server
                    success: function(response) {

                        if (response.status) {
                            $('#product_list').append(response.html); // Append new content
                        } else {
                            $('#load_more_btn').hide(); // Hide the button if no more content
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error loading Products:', textStatus, errorThrown);
                    },
                    complete: function() {
                        loading = false; // Reset loading flag
                        $('#loading').hide(); // Hide loading indicator
                    }
                });
            }
        }

        $('#load_more_btn').on('click', loadMoreContent);







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


        $("#blogdetails-recent").owlCarousel({
            loop: true,
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
</script> -->

<script>
    let offset = <?= count($product) ?>; // Track how many products have been loaded
    const limit = 4; // Number of products per batch

    $('#load_more_btn').on('click', function () {
        $('#loading').show();

        $.ajax({
            url: '<?= base_url('Frontend/product/' . $productCat->slug) ?>',
            type: 'POST',
            data: { offset: offset },
            success: function (response) {
                //  console.log(response); // Check the raw response from the server                
                const products = JSON.parse(response);
                // console.log(products); 
                $length = products.length;
                console.log(length);
                if ($length > 0) {                    
                    console.log("exsist product") ;
                    let productHtml = '';
                    products.forEach(product => {
                        // console.log(product.warrenty_section);
                        productHtml += `
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <a href="<?= base_url('product-details')?>/${product.slug}">
                                <div class="product_item">
                                    <div class="badge-product-sale">
                                        ${product.is_new == 1 ? `<span class="ribbon-v"><p>new</p></span>` : ''}
                                    </div>
                                    <div class="swiper productimgswiper" id="mySwiperId">
                                        <div class="swiper-wrapper">`;
                                        
                        product.others_images.forEach(image => {
                            //  console.log(image);
                            const contentTitle = JSON.parse(product.content_title);
                            const contentDescription = JSON.parse(product.content_description);
                            productHtml += `
                                <div class="swiper-slide">
                                    <div class="product_info">
                                        <img src="<?= base_url('/uploads/product/') ?>/${image.image_file}" alt="" class="img-fluid">
                                        <h4>${product.product_title}</h4>
                                        <p>${contentTitle[0]} : ${contentDescription[0]}</p>
                                    </div>
                                </div>`;
                        });

                        productHtml += `</div><div class="swiper-pagination"></div></div>`;

                        productHtml += `<div class="other_info_box">
                            <ul class="d-flex justify-content-center">`;
                            product.warrenty_section = JSON.parse(product.warrenty_section); 
                            // console.log(product.warrenty_section);                           
                        product.warrenty_section.forEach(warranty => {
                            //  console.log(warranty);
                            if (warranty == 'warrenty') {
                                productHtml += `<li><img src="<?= base_url('public/assets/img/warenty.webp') ?>" alt="" class="img-fluid"></li>`;
                            } else if (warranty == 'motion_sensor') {
                                productHtml += `<li><img src="<?= base_url('public/assets/img/hand.webp') ?>" alt="" class="img-fluid"></li>`;
                            } else if (warranty == 'isa_technology') {
                                productHtml += `<li><img src="<?= base_url('public/assets/img/isa.webp') ?>" alt="" class="img-fluid"></li>`;
                            }
                        });

                        productHtml += `</ul></div></div></a></div>`;
                    });
                    
                    $('#product_list').append(productHtml);
                    offset += products.length; // Update offset

                } else {
                    console.log("no product") ;
                    $('#load_more_btn').hide(); // Hide button if no more products
                }

                $('#loading').hide();
            },
            error: function () {
                alert('Could not load more products');
                $('#loading').hide();
            }
        });
    });
</script>
<?= $this->endSection() ?>