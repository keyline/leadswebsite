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

<section class="inner_banner inner_floting_box_banner producttop_banner_section">
<?php if ($productCat->banner != '') { ?>
        <img src="<?php echo base_url(); ?>/uploads/product/<?php echo $productCat->banner; ?>" class="img-responsive producttop_banner_img img-thumbnail"  />
    <?php } else { ?>
        <img src="<?= base_url('public/') ?>/assets/img/about-inner-bg.webp" alt="" class="img-fluid producttop_banner_img">
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
                    <a href="<?= base_url('product-details')?>/<?= $product_list->slug?>" class="d-block">
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
                            <?php if(count(json_decode($product_list->warrenty_section))){?>   
                                
                                <div class="other_info_box">
                                <ul class="d-flex justify-content-center">
                                    <?php foreach(json_decode($product_list->warrenty_section) as $warrenty_section) { ?>                                                    
                                    <li> 
                                    <?php if($warrenty_section == "warrenty") {  ?>                                                           
                                        <img src="<?= base_url('public/') ?>/assets/img/warenty.svg" alt="" class="img-fluid">
                                        <?php } else if($warrenty_section == "motion_sensor") {?>   
                                        <img src="<?= base_url('public/') ?>/assets/img/hand.svg" alt="" class="img-fluid">
                                        <?php } else if($warrenty_section == "isa_technology") {?>   
                                        <img src="<?= base_url('public/') ?>/assets/img/isa.svg" alt="" class="img-fluid">
                                        <?php } ?> 
                                    </li>                                                         
                                    <?php } ?>  
                                </ul>
                            </div>
                                
                                <?php } ?>
                            
                        </div>
                    </a>
                </div>                
            <?php endforeach;?>            
        </div>
        <?php if(count($product_count) > 4) {?>
        <button id="load_more_btn" style="float: right;background-color:#ed1c24;border: tomato;" class="btn btn-primary">Load More</button>
        <?php } ?>
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
            const products = JSON.parse(response);
            let length = products.length;

            if (length > 0) {
                let productHtml = '';
                products.forEach(product => {
                    productHtml += `
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <a href="<?= base_url('product-details')?>/${product.slug}">
                                <div class="product_item">
                                    <div class="badge-product-sale">
                                        ${product.is_new == 1 ? `<span class="ribbon-v"><p>new</p></span>` : ''}
                                    </div>
                                    <div class="swiper productimgswiper">
                                        <div class="swiper-wrapper">`;
                    
                    product.others_images.forEach(image => {
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
                    product.warrenty_section = JSON.parse(product.warrenty_section); 
                   
if(Array.isArray(product.warrenty_section) && product.warrenty_section.length){
    productHtml += `<div class="other_info_box">
                        <ul class="d-flex justify-content-center">`;
                    product.warrenty_section.forEach(warranty => {
                        if (warranty == 'warrenty') {
                            productHtml += `<li><img src="<?= base_url('public/assets/img/warenty.svg') ?>" alt="" class="img-fluid"></li>`;
                        } else if (warranty == 'motion_sensor') {
                            productHtml += `<li><img src="<?= base_url('public/assets/img/hand.svg') ?>" alt="" class="img-fluid"></li>`;
                        } else if (warranty == 'isa_technology') {
                            productHtml += `<li><img src="<?= base_url('public/assets/img/isa.svg') ?>" alt="" class="img-fluid"></li>`;
                        }
                    });
                    productHtml += `</ul></div>`;
}
                     
                       


                 



                    
                    productHtml += `</div></a></div>`;
                });

                $('#product_list').append(productHtml);
                offset += products.length;

                // Update Swiper after new slides are added
                setTimeout(() => {
                    const swiperInstance = new Swiper('.productimgswiper', {
                        slidesPerView: 1,
                        spaceBetween: 10,
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                    });
                    swiperInstance.update();
                }, 0);

                $('#loading').hide();

            } else {
                $('#loading').hide();
                $('#load_more_btn').hide();
                if ($('#no_more_products').length === 0) {
                    $('#product_list').after('<p id="no_more_products" class="text-center">No more products to load.</p>');
                }
            }
        },
        error: function () {
            alert('Could not load more products');
            $('#loading').hide();
        }
    });
});

</script>
<?= $this->endSection() ?>