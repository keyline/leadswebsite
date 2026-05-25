<?= $this->section('style') ?>
<style>
    svg {
        width: 70px;
        height: 70px;
        margin: 20px;
        display: inline-block;
    }
    .blogdetails_item {
    padding: 0px 0;
    }
    .product_listing {
    padding: 50px 0 50px;
}
.modular-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 20px;
    margin-top: 40px;
}

.modular-gallery .gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}

.modular-gallery .gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
    border-radius: 12px;
}

.modular-gallery .gallery-item:hover img {
    transform: scale(1.08);
}

.modular-gallery .gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

/* Responsive text styling */
.blogdetials_innerpart h2, 
.blogdetials_innerpart h3 {
    color: #1a2b48;
    font-weight: 700;
    margin-top: 25px;
    margin-bottom: 15px;
}

.blogdetials_innerpart p, 
.blogdetials_innerpart li {
    font-size: 17px;
    color: #333;
    line-height: 1.7;
}

@media (max-width: 767px) {
    .modular-gallery {
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 15px;
    }
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
            // pr($product_list);
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
                                <?php }     
                                // Show video slide AFTER all images
                                    if($product_list->isvideoupload == 'true' && $product_list->video_file != '') { ?>
                                        <div class="swiper-slide">
                                            <div class="product_info">
                                                <video class="img-fluid" controls>
                                                    <source src="<?= base_url('/uploads/product/' . $product_list->video_file) ?>" autoplay muted loop type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                                <h4><?= $product_list->product_title ?></h4>
                                                <?php
                                                $content_title        = json_decode($product_list->content_title);
                                                $content_description  = json_decode($product_list->content_description);
                                                ?>
                                                <p><?= $content_title[0] ?> : <?= $content_description[0] ?></p>
                                            </div>
                                        </div>
                                    <?php } elseif(!empty($product_list->video_code)) { ?>
                                        <div class="swiper-slide">
                                            <div class="product_info">
                                                <iframe class="img-fluid" src="https://www.youtube.com/embed/<?= $product_list->video_code ?>?autoplay=1&mute=1" 
                                                    title="YouTube video player" frameborder="0" 
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                                    allowfullscreen>
                                                </iframe>
                                                <h4><?= $product_list->product_title ?></h4>
                                                <?php
                                                $content_title        = json_decode($product_list->content_title);
                                                $content_description  = json_decode($product_list->content_description);
                                                ?>
                                                <p><?= $content_title[0] ?> : <?= $content_description[0] ?></p>
                                            </div>
                                        </div>
                                    <?php }     ?>                                                      
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>                            
                            <!-- ?php if (count(json_decode($product_list->warrenty_section))) { ?> -->
                                <div class="other_info_box">
                                    <ul class="d-flex justify-content-center">
                                        <?php 
                                        // foreach (json_decode($product_list->warrenty_section) as $warrenty_section) { 
                                            // $sql1 = "SELECT * FROM `warrenty_section` WHERE `id` = '$warrenty_section' and `published` != '3'";
                                            // $warrentySections = $db->query($sql1)->getResult();
                                            //  pr($product_list->warrenty_section); 
                                            foreach($product_list->warrenty_section as $warrentySection)   {?>
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
                                        <?php }  ?>
                                    </ul>
                                </div>
                            <!-- ?php } ?>                             -->
                        </div>
                    </a>
                </div>                
            <?php endforeach;?>            
        </div>
        <?php if(count($product_count) > 4) {?>
        <button id="load_more_btn" style="float: right;background-color:#ff6300;border: tomato;" class="btn btn-primary">Load More</button>
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
      <!-- mission section start -->
<?php
$current_url = current_url(); // Get current full page URL

if (strpos($current_url, 'product/kitchen-chimney') !== false) :
?>
 <section class="blogdetails_item">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-12">
                <div class="blogdetials_innerpart">
                    <div id="links-box" class="blogdetial_infomation">
                        <h2 id="h-why-choose-us"><strong>Cook with Comfort with the Leadss Kitchen Chimney</strong></h2>
                        <p>Make Your Kitchen Smoke-Free with the Best Kitchen Chimney in Eastern India</p>
                        <h2 id="h-why-choose-us"><strong>Experience Smart Cooking with the AI Kitchen Chimney & ISA Technology</strong></h2>

                        <p>Would you like to cook your favourite dish with comfort and want a smoke-free kitchen? If you want to prepare a delicious dish in a smoke-free kitchen, you should opt for an AI Kitchen Chimney & ISA Technology. Yes, Leadss can provide you with the most innovative AI-based kitchen chimney for your smart kitchen.</p>

                        <p>Apart from AI-based kitchen chimneys, we also offer innovative technology-based kitchen chimneys to make your kitchen a healthier space. Experience a perfect blend of innovation, elegance, and efficiency with our extensive range of kitchen chimneys.</p>

                        <!-- ============================================= -->
                        <h2 id="h-why-choose-us"><strong>Why Choose Us for the Best Kitchen Chimney for Indian Cooking</strong></h2>
                        <p>When you prepare an Indian dish, it generates huge amounts of smoke that can damage the interior of your kitchen. However, incorporating a smart kitchen chimney can help you cook effortlessly in a comfortable setting. Let's discuss the facts that led you to choose Leadss for the best auto clean filterless chimney.</p>

                        <h2 id="h-experience-auto-clean"><strong>Experience Auto Clean Technology</strong></h2>
                        <p>At Leadss, you can get the most innovative and AI-based kitchen chimney that does not require messy filters. You can experience a smoke-free kitchen with a single touch.</p>

                        <h2 id="h-smart-sensors"><strong>Include the Smart Sensors' Capacity</strong></h2>
                        <p>We offer the most innovative form of kitchen chimney that can take care of the interior of your kitchen. The latest sensor-based kitchen chimney can detect smoke and heat instantly during cooking.</p>

                        <h2 id="h-voice-bldc"><strong>Voice-Enabled with BLDC Technology</strong></h2>
                        <p>We offer a voice-enabled kitchen chimney option that allows you to operate every feature easily. Our kitchen chimney also features the BLDC model and its advanced technology.</p>

                        <h2 id="h-energy-efficiency"><strong>Energy Efficiency Capacity</strong></h2>
                        <p>We offer the most innovative range of kitchen chimneys, featuring unique suction power capacities tailored to your cooking needs.</p>

                        <h2 id="h-affordable-prices"><strong>Affordable Prices</strong></h2>
                        <p>Leadss is renowned for offering a wide range of innovative kitchen chimneys at an affordable rate. You can get an auto-clean kitchen chimney under ₹20,000 from Leadss.</p>

                        <!-- ============================================= -->
                        <h2 id="h-best-in-eastern-india"><strong>Innovative and the Best Kitchen Chimney in Eastern India</strong></h2>
                        <p>At Leadss, you can get the most innovative and the best kitchen chimney in Eastern India that matches your kitchen interior. You can choose from a wide range of smart kitchen chimneys, tailored to your style and preference. Let's have a look at our vast range of kitchen chimney designs.</p>

                        <p><b>Wall-Mounted Chimney:</b> This type of kitchen chimney fits perfectly with the stove that is placed against the wall. The sleek design of this kitchen chimney is ideal for small kitchen spaces.</p>

                        <p><b>Island Chimney Design:</b> If you are searching for the best auto-clean, filterless chimney for your large kitchen areas, an island chimney design should be your great choice. It hangs from the ceiling above the cooking space. If you're looking for a modern and stylish kitchen chimney, consider this option.</p>

                        <p><b>Corner Kitchen Chimney:</b> If you set your kitchen area at the corner of your home, a stylish and sleek-looking kitchen chimney should be your ideal choice.</p>

                        <p><b>Straight Line Chimney:</b> When you plan to buy a silent kitchen chimney with high suction capacity, a straight-line chimney should be an ideal option. The compact and straight design of this kitchen chimney fits perfectly in small kitchen areas.</p>

                        <!-- ============================================= -->
                        <h2 id="h-make-your-kitchen-smart"><strong>Make Your Kitchen Smart with Us</strong></h2>
                        <p>If you want to upgrade your kitchen area with innovative technology and protect the expensive interior, then you must contact Leadss. We offer the kitchen chimney at the best price in Eastern India, which is essential to make your kitchen spotless and showcase your modern lifestyle.</p>
                        
                        <p>Enjoy fresh air in your kitchen and enhance your cooking experience with the <b>Leadss Smart Kitchen Chimney</b>.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php
if (strpos($current_url, 'product/ro-water-purifier') !== false) :
?>

<!-- ====== Banner Section ====== -->
<section class="banner_section">
    <div class="container text-center">
        
    </div>
</section>

<!-- ====== Details Section ====== -->
<section class="blogdetails_item">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-12">
                <div class="blogdetials_innerpart">
                    <div id="links-box" class="blogdetial_infomation">
                        <h2 id="h-why-incorporate">Purify Your Life with Leadss Water Purifier</h2>
                        <h3 id="h-why-incorporate">Bring the Best Water Purifier in Eastern India for Your Family</h3>
                        <p><strong>Smart Living Starts with Safe Drinking — Trust the Best RO Water Purifier</strong></p>
                        <p>As we all know, each drop of water matters for a healthy life. When considering smart living, don't compromise on healthy living. Leadss has brought a great opportunity for you with the introduction of the latest technology-based best RO water purifier.</p>

                        <p>In the current scenario, tap water primarily contains several harmful impurities and bacteria that can adversely affect human health. Apart from that harmful contamination, regular drinking water also needs proper purification. To serve these purposes, Leadss has introduced a wide range of technology-based and highly efficient water purifiers to support your health and well-being.</p>

                        <!-- ============================================= -->
                        <h2 id="h-why-incorporate"><strong>Why Do You Incorporate with Leads Water Purifier?</strong></h2>
                        <p>Do you aspire to a smart living lifestyle? If you have a craving for a smart living experience with a healthy lifestyle, consider incorporating the Leads water purifier for multiple purposes.</p>

                        <h2 id="h-advanced-filtration"><strong>Advanced Filtration Technology</strong></h2>
                        <p>We know that every drop matters for a healthy life, which is why we incorporate the latest technology, including <b>RO, UV, and UF</b>. These technologies maximise the water purification level to ensure your safety.</p>

                        <h2 id="h-tds-control"><strong>Control TDS</strong></h2>
                        <p>Our smart water purifier specializes in TDS control that balances essential minerals in water.</p>

                        <h2 id="h-smart-indicators"><strong>Smart Indicators</strong></h2>
                        <p>Leadss offers the most innovative smart water purifier, which features smart indicators. These smart indicators alert for filter change and show the purification status.</p>

                        <h2 id="h-energy-efficiency"><strong>Energy Efficiency Capacity</strong></h2>
                        <p>Leads water purifiers are popular for their energy efficiency capacity. You don't need to pay an extra bill amount to run our most innovative smart water purifier.</p>

                        <!-- ============================================= -->
                        <h2 id="h-explore-best"><strong>Explore the Best Water Purifier in Eastern India</strong></h2>
                        <p>If you want to enjoy smart living with healthy and purified water, you must explore our vast range of water purifiers. Let's check them out.</p>

                        <p><b>RO Water Purifier:</b> If you have experienced high TDS in your area, then the RO water purifier should be your best choice.</p>

                        <p><b>UV Water Purifier:</b> If you want to consume the most purified water, a UV water purifier can provide complete safety.</p>

                        <p><b>RO, UV, and UF Water Purifier:</b> If you want comprehensive purification at the best water purifier price, then Leadss should be your top choice. We offer the most comprehensive water purifier at the best price.</p>

                        <p><b>Gravity-Based Water Purifier:</b> If you are searching for a budget-friendly and low-maintenance water purifier, a gravity-based water purifier should be your ideal choice.</p>

                        <!-- ============================================= -->
                        <h2 id="h-enjoy-pure-water"><strong>Enjoy Pure Drinking Water at a Reasonable Price</strong></h2>
                        <p>Leads offer the best water purifier price in Eastern India, which is highly useful for all types of customers. Our price range is so reasonable that it is budget-friendly for everyone. Thousands of families trust our water purifier to protect their health from water-borne diseases. With its stylish design and cutting-edge technology, we offer you the best water purifier.</p>

                        <p>Explore our wide range of smart water purifiers and protect your family from water-borne disease.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php
// ✅ Show only on Modular Kitchen page
if (strpos(current_url(), 'product/modular-kitchen') !== false) :
?>
<section class="blogdetails_item">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-12">
                <div class="blogdetials_innerpart">
                    <div id="links-box" class="blogdetial_infomation">
                        <h2>Discover the Best Modular Kitchen Designs</h2>
                        <h3>Cook Your Favourite Dish and Celebrate It with the Best Modular Kitchen Design</h3>
                        <p><strong>Decorate the Heart of Your Home with the Best Modular Kitchen Design</strong></p>

                        <p>Are you planning something innovative for your dream kitchen, and feeling confused about selecting the best modular kitchen designs? Then, Leadss should be your best choice to decorate the heart of your home lavishly. You may spend a little time in your kitchen, but its attractive design plays a vital role in enhancing the taste of your cooking.</p>

                        <p>When your kitchen area looks elegant and lavish, the taste of your food automatically improves. If you want to make your kitchen area the heart of your home, then you must incorporate our most stylish and innovative modular kitchen design.</p>

                        <h2><strong>Why Incorporate with the Best Modular Kitchen Makers in Eastern India</strong></h2>
                        <p>Leadss is the most versatile and best modular kitchen maker in Eastern India, which can understand your design aspect and provide an innovative modular kitchen design tailored to your requirements.</p>

                        <ol>
                            <li><b>Utilisation of Small Space Smartly:</b> We are experts in utilising small kitchen spaces efficiently to create a unique and stylish appearance. You can experience maximum storage in your kitchen without clutter with our modular kitchen design.</li>
                            <li><b>Stylish Appearance:</b> While designing your modular kitchen, we always focus on sleek finishes, trending colours, and gorgeous layouts. It is highly essential to make your small kitchen area a luxurious place in your home.</li>
                            <li><b>Availability of a Customised Option:</b> Whether you want a simple kitchen design or luxurious decoration, you can get a customised modular kitchen option from us. We will design your modular kitchen according to your lifestyle and choice preferences.</li>
                            <li><b>Premium-Grade Materials:</b> We always focus on using premium-quality materials for our modular kitchens, which ensures their long service life.</li>
                        </ol>

                        <h2><strong>Popular and the Best Modular Kitchen Design Layouts</strong></h2>
                        <p>At Leadss, you can find the best modular kitchen design layouts tailored to your taste and preferences. Basically, we focus on basic design layouts — just have a look:</p>

                        <ol>
                            <li><b>L-Shaped Kitchen Designs:</b> If you plan to install a smart modular kitchen in a small home area or want to utilize the corner space, an L-shaped modular kitchen design is ideal for you.</li>
                            <li><b>U-Shaped Kitchen Design:</b> If you have a huge passion for cooking or want to create cooking reels, then you need an attractive backdrop. In such a case, a U-shaped modular kitchen design can give a luxurious appearance.</li>
                            <li><b>Parallel Kitchen Design:</b> If you want a compact kitchen design with the best kitchen cabinet design, consider a parallel kitchen design. We offer the most unique kitchen cabinet design with lighting facilities that can make your kitchen space more elegant.</li>
                            <li><b>Island Kitchen Design:</b> If you are a bachelor and want an open space kitchen combined with dining, then we suggest an island kitchen design layout. It looks amazing, whether in a small space or a large one.</li>
                        </ol>

                        <h2><strong>Why Homeowners Love the Best Kitchen Cabinet Design</strong></h2>
                        <p>Leadss can provide you with the best kitchen cabinet design layout for your modular kitchen. With our unique design expertise, we can transform your small kitchen area into the most attractive part of your home. Soft-close drawers and cabinets, attractive cabinet lighting, and an organized storage facility are some of our most innovative design layouts for modular kitchens.</p>

                        <p>If you want to make your kitchen area the heart of your home, then you must explore our most innovative technology-based and stunning-looking modular kitchen design.</p>

                        <!-- 🖼️ Responsive Gallery Section -->
                        <div class="modular-gallery">
                            <div class="gallery-item">
                                <img src="<?= base_url('public/') ?>/assets/img/modular-kitchen-1.jpeg" alt="Modular Kitchen Design 1">
                            </div>
                            <div class="gallery-item">
                                <img src="<?= base_url('public/') ?>/assets/img/modular-kitchen-2.webp" alt="Modular Kitchen Design 2">
                            </div>
                            <div class="gallery-item">
                                <img src="<?= base_url('public/') ?>/assets/img/modular-kitchen-3.jpeg" alt="Modular Kitchen Design 3">
                            </div>
                            <div class="gallery-item">
                                <img src="<?= base_url('public/') ?>/assets/img/modular-kitchen-4.jpeg" alt="Modular Kitchen Design 4">
                            </div>
                            <div class="gallery-item">
                                <img src="<?= base_url('public/') ?>/assets/img/modular-kitchen-5.jpeg" alt="Modular Kitchen Design 4">
                            </div>
                        </div>
                        <!-- End Gallery -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
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
       // url: '?= base_url('Frontend/product/' . $productCat->slug) ?>',
        url: '<?= base_url('/product/' . $productCat->slug) ?>',
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
                                    if(product.isvideoupload == 'true' && product.video_file != '') { 
                                        const content_title        = JSON.parse(product.content_title);
                                        const content_description  = JSON.parse(product.content_description);
                                        productHtml += `
                                        <div class="swiper-slide">
                                            <div class="product_info">
                                                <video class="img-fluid" autoplay muted loop controls>
                                                    <source src="<?= base_url('/uploads/product/') ?>/${product.video_file}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                                <h4>${product.product_title}</h4>                                
                                            <p>${content_title[0]} : ${content_description[0]}</p>
                                            </div>
                                        </div>`;
                                    } else if (product.video_code && product.video_code !== '') {
                                        productHtml += `
                                        <div class="swiper-slide">
                                            <div class="product_info">
                                                <iframe class="img-fluid" src="https://www.youtube.com/embed/${product.video_code}?autoplay=1&mute=1" 
                                                    title="YouTube video player" frameborder="0" 
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                                    allowfullscreen>
                                                </iframe>
                                                <h4>${product.product_title}</h4>                                                                
                                                <p>${content_title[0]} : ${content_description[0]}</p>
                                            </div>
                                        </div>`;
                                    }                                              
                    productHtml += `</div><div class="swiper-pagination"></div></div>`;
                    // product.warrenty_section = JSON.parse(product.warrenty_section); 
                   
                    // if(Array.isArray(product.warrenty_section) && product.warrenty_section.length){
                    productHtml += `<div class="other_info_box">
                        <ul class="d-flex justify-content-center">`;
                    product.warrenty_section.forEach(warranty => {                         
                        productHtml += `<li><img src="<?= base_url('/uploads/warrenty_section/') ?>/${warranty.warrenty_section_icon}" alt="" class="img-fluid"></li>`;
                    });
                    productHtml += `</ul></div>`;
                // }                    
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
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
            alert('Could not load more products');
            $('#loading').hide();
            
        }
    });
});

</script>
<?= $this->endSection() ?>