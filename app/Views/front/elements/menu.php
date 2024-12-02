<div class="hide_notshow_normal">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="headlogo"><a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('public/assets/img/') ?>/logo.png" alt="logo"></a></div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-6 col-6">
                <div class="head_top_right">
                    <ul class="head_social">
                        <li><a href="<?= $site_setting->facebook_link ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="<?= $site_setting->twitter_link ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a href="<?= $site_setting->youtube_link ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="<?= $whatsapp_link ?>" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="full_desktop_menu">
        <div class="full_menu_flex">
            <div class="fullsreen_menu">
                <ul>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <!-- <li><a href="#">Produst Registration</a></li> -->
                    <li class="deskrewad_img"><img src="<?= base_url('public/assets/') ?>/img/desktop_rewardoffer.png" alt="logo"></li>
                </ul>
            </div>
            <div class="fullsreen_menu">
                <ul>
                    <li><a href="<?= base_url() ?>/about">About Us</a>
                        <ul>
                            <li><a href="<?= base_url() ?>/about">Mission & Vision</a></li>
                            <li><a href=" <?= base_url() ?>/about">Our Presence</a></li>
                            <li><a href="<?= base_url() ?>/about">Certificates</a></li>
                        </ul>
                    </li>
                    <li><span class="without_melink">Products</span>
                        <ul>
                            <?php foreach ($product_menu as $key => $category) { ?>
                                <li><a href="<?= base_url() ?>/product/<?= $category->slug ?>"><?= $category->name ?></a></li>
                            <?php }  ?>
                        </ul>
                    </li>

                    <li>
                        <span class="without_melink">Media</span>

                        <ul>
                            <?php foreach (MEDIA_CATEGORIES as $key => $media) {
                                $mediaSlug = strtolower(explode(" ", $media)[0]);
                            ?>
                                <li><a href="<?= base_url() ?>/media/<?= $mediaSlug ?>"><?= $media ?></a></li>
                            <?php }  ?>

                        </ul>
                    </li>
                </ul>
            </div>
            <div class="fullsreen_menu">
                <ul>
                    <li>
                        <span class="without_melink">Download</span>

                        <ul>
                            <?php foreach ($download as $key => $val) { ?>
                                <li><a target="_blank" href="<?= base_url() ?>/uploads/download/<?= $val->file ?>"><?= $val->name ?></a></li>
                            <?php }  ?>
                        </ul>
                    </li>
                    <li><a href="<?= base_url() ?>/distributor">Become A Distributor</a></li>
                    <li><a href="<?= base_url() ?>/blog">Blog</a></li>
                    <li>
                        <span class="without_melink">Reach Us</span>

                        <ul>                            
                            <li><a href="<?= base_url('/career') ?>">Career</a></li>
                            <li><a href="<?= base_url() ?>/contact">Contact Us</a></li>
                        </ul>
                    </li>
                    <li>
                        <span class="without_melink">After Sales Sevices</span>
                        <ul>
                            <li><a href="<?= base_url('/amc') ?>">AMC</a></li>
                            <li><a href="<?= base_url('/service') ?>">Enquiry & Service Request</a></li>
                            <li><a href="<?= base_url('/return-policy') ?>">Return policy</a></li>
                            <!-- <li><a href="#">Service Policy</a></li> -->
                            <?php foreach ($contents as $key => $page) { ?>
                                <li><a href="<?= base_url() ?>/page/<?= $page->slug ?>"><?= $page->title ?></a></li>
                            <?php }  ?>
                            
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <!-- MOBILE MENU -->

    <div id="cssmenu">
        <ul class="menu-show">
            <li><a href="<?= base_url() ?>">Home</a></li>
            <!-- <li><a href="#">Produst Registration</a></li> -->
            <li><a href="<?= base_url() ?>/about">About Us</a>
                <ul>
                    <li><a href="<?= base_url() ?>/about">Mission & Vision</a></li>
                    <li><a href="<?= base_url() ?>/about">Our Presence</a></li>
                    <li><a href="<?= base_url() ?>/about">Certificates</a></li>
                </ul>
            </li>
            <li>
                <span class="without_melink">Products</span>
                <ul>
                    <?php foreach ($product_menu as $key => $category) { ?>
                        <li><a href="<?= base_url() ?>/product/<?= $category->slug ?>"><?= $category->name ?></a></li>
                    <?php } ?>                    
                </ul>
            </li>
            <li>
                <!-- <a href="#">Media</a> -->
                
                <span class="without_melink">Media</span>
                <ul>
                    <?php foreach (MEDIA_CATEGORIES as $key => $media) {
                        $mediaSlug = strtolower(explode(" ", $media)[0]);
                    ?>
                        <li><a href="<?= base_url() ?>/media/<?= $mediaSlug ?>"><?= $media ?></a></li>
                    <?php }  ?>

                </ul>
            </li>
            <li>
                <!-- <a href="#">Download</a> -->
                <span class="without_melink">Download</span>
                <ul>


                    <?php foreach ($download as $key => $val) { ?>
                        <li><a target="_blank" href="<?= base_url() ?>/uploads/download/<?= $val->file ?>"><?= $val->name ?></a></li>
                    <?php }  ?>
                </ul>
            </li>
            <li><a href="<?=base_url() ?>/distributor">Become A Distributor</a></li>
            <li><a href="<?= base_url() ?>/blog">Blog</a></li>
            <li>
                <!-- <a href="#">Reach Us</a> -->
                <span class="without_melink">Reach Us</span>
                <ul>                    
                    <li><a href="<?= base_url('/career') ?>">Career</a></li>
                    <li><a href="<?= base_url() ?>/contact">Contact Us</a></li>
                </ul>
            </li>
            <li>
                <!-- <a href="#">After Sales Sevices</a> -->
                <span class="without_melink">After Sales Sevices</span>
                <ul>
                    <li><a href="<?= base_url('/amc') ?>">AMC</a></li>
                    <!-- <li><a href="#">Service Policy</a></li> -->
                    <?php foreach ($contents as $key => $page) { ?>
                        <li><a href="<?= base_url() ?>/page/<?= $page->slug ?>"><?= $page->title ?></a></li>
                    <?php }  ?>
                    <li><a href="<?= base_url('/service') ?>">Enquiry & Service Request</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>