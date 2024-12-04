<!-- ********|| HEADER START ||******** -->

<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
            <div class="headlogo"><a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('public/assets/img/') ?>/logo.png" alt="logo"></a></div>
            <?php if($page_header != 'Blog Details') {?>
            <div class="head_roationlogo"><img src="<?= base_url('public/assets/img/') ?>/header_logo_rotation.png" alt="logo"></div>
            <?php }?>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-6 col-6">
            <div class="head_top_right">
                <ul class="head_social">
                    <?php
            
                    
                    if(!empty ($site_setting->facebook_link)){ ?>
                    <li><a href="<?= $site_setting->facebook_link ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <?php } if(!empty ($site_setting->twitter_link)) { ?>
                    <li><a href="<?= $site_setting->twitter_link ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                    <?php } if(!empty ($site_setting->youtube_link)) { ?>
                    <li><a href="<?= $site_setting->youtube_link ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                    <?php } if(!empty ($whatsapp_link)) { ?>
                    <li><a href="<?= $whatsapp_link ?>" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
                    <?php } ?>
                </ul>
                <a href="#" id="burger"> <span></span> <span></span> <span></span> <span></span></a>
            </div>
        </div>
    </div>
</div>

<!-- ********|| HEADER ENDS ||******** -->