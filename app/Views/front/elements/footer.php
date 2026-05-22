<!--    FOOTER STARTS-->

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <div class="footer_left">
                <div class="footer_logo">
                    <a href="<?= base_url() ?>"><img class="img-fluid" src="<?= base_url('public/assets/') ?>/img/logo.png" alt="logo"></a>
                </div>
                <div class="footer_subsocial">
                    <div class="footer_social">
                        <ul>
                            <?php if(!empty ($site_setting->facebook_link)){ ?>
                            <li><a href="<?= $site_setting->facebook_link ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <? } if(!empty ($site_setting->twitter_link)) { ?>
                            <li><a href="<?= $site_setting->twitter_link ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <?php } if(!empty ($site_setting->youtube_link)) { ?>
                            <li><a href="<?= $site_setting->youtube_link ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                            <?php } if(!empty ($whatsapp_link)) { ?>
                            <li><a href="<?= $whatsapp_link ?>" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="foot-righttop">
                <h4>Quick Links:</h4>
                <ul>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><a href="<?= base_url() ?>/career">Career</a></li>  
                    <li><a href="<?= base_url() ?>/about">About Us</a></li>  
                    <li><a href="<?= base_url() ?>/distributor">Become A Distributor</a></li>                                 
                    <li><a href="<?= base_url() ?>/contact">Contact Us</a></li>
                    <li><a href="<?= base_url() ?>/blog">Blog</a></li>                       
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="foot-righttop">
                <h4>Locations:</h4>
                <ul>
                    <li><a href="<?= base_url() ?>/location/kolkata">Kolkata</a></li>
                    <li><a href="<?= base_url() ?>/location/guwahati">Guwahati</a></li>  
                    <li><a href="<?= base_url() ?>/location/bhubaneswar">Bhubaneswar</a></li>  
                    <li><a href="<?= base_url() ?>/location/siliguri">Siliguri</a></li>                                 
                    <li><a href="<?= base_url() ?>/location/bilaspur">Bilaspur</a></li>
                    <li><a href="<?= base_url() ?>/location/agartala">Agartala</a></li>  
                    <li><a href="<?= base_url() ?>/location/patna">Patna</a></li>     
                </ul>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 paddingfoot-left">
            <div class="footer_rightadd">
                <h4>Quick Contact:</h4>

                <div class="footer_icon">
                    <ul>
                        <li class="foot_location">
                            <div class="footer_fa">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <p class="pb-3">
                                <?php if (count($phone_numbers)) {
                                    $totalNumbers = count($phone_numbers);
                                    foreach ($phone_numbers as $index => $number) { ?>
                                        <a href="tel:<?= $number ?>"> <?= $number ?> </a>
                                <?php
                                break;
                                        if ($index < $totalNumbers - 1) {
                                            echo ', '; // Add comma if it's not the last number
                                        }
                                    }
                                } ?>

                            </p>
                        </li>
                        <li class="foot_location">
                            <div class="footer_fa">
                                <i class="fa-solid fa-at"></i>
                            </div>
                            <p>

                                <?php if (count($admin_mails)) {
                                    $totalNumbers = count($admin_mails);
                                    foreach ($admin_mails as $index => $mail) { ?>
                                        <a href="mailto:"> <?= $mail ?> </a>
                                <?php
                                        if ($index < $totalNumbers - 1) {
                                            echo ', '; // Add comma if it's not the last number
                                        }
                                    }
                                } ?>


                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="foot_redline"></div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="footercopytext">Copyright © <span style="color:#ff6300;">Leads Overseas</span> 2024. All Rights Reserved.</div>
        </div>
        <!-- <div class="col-lg-6 col-md-6">
            <div class="footercopytext footdesign">Designed & Developed by <a href="https://keylines.net/" target="_blank" class="uppercase" style="color:#a1a1a1;text-decoration: none;">Keyline</a></div>
        </div> -->
    </div>
</div>
<script>
    (function(w,d,s,c,r,a,m){
      w['KiwiObject']=r;
      w[r]=w[r] || function () {
        (w[r].q=w[r].q||[]).push(arguments)};
      w[r].l=1*new Date();
        a=d.createElement(s);
        m=d.getElementsByTagName(s)[0];
      a.async=1;
      a.src=c;
      m.parentNode.insertBefore(a,m)
    })(window,document,'script',"https://app.interakt.ai/kiwi-sdk/kiwi-sdk-17-prod-min.js?v="+ new Date().getTime(),'kiwi');
    window.addEventListener("load",function () {
      kiwi.init('', '0mnsTKHjWTrigG1g1wZW19k5vevxApQ8', {});
    });
  </script>

<!--    FOOTER ENDS-->



