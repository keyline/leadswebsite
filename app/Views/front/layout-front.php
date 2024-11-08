<!doctype html>

<html lang="en">

<head>

    <?= $head ?>
    <!-- [ page wise css ] -->
    <?= $this->renderSection('style') ?>
</head>

<body>

    <nav id="nav-main" class="">
        <?= $menu ?>
    </nav>

    <!------------|| NAV BAR STARTS ||------------>

    <header class="header">

        <?= $header ?>

    </header>

    <!------------|| NAV BAR ENDS ||------------>




    <?= $maincontent ?>


    <!--    FOOTER STARTS-->

    <footer class="footer">

        <?= $footer ?>

        <?php

        $this->session = \Config\Services::session();

        $this->session->setFlashdata('success_message', '');

        $this->session->setFlashdata('error_message', '');

        ?>

    </footer>




    <!-- Optional JavaScript; choose one of the two! -->


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('public/assets/bootstrap/') ?>/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <!-- <script src="assets/js/jquery.serialtabs.js"></script> -->
    <!-- <script defer type="text/javascript" src="assets/js/script.js"></script> -->
    <script src="<?= base_url('public/assets/') ?>/owl/owl-min.js"></script>
    <script src="<?= base_url('public/assets/') ?>/js/menumaker.js"></script>
    <script src="https://www.jquery-az.com/jquery/js/sticky-sidebar/sticky-sidebar.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(function() {
                AOS.init();
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="https://designmodo.static.domains/full-nav-menu/app.js" charset="utf-8"></script>

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
        // testimonial slider
        var swiper = new Swiper(".testimonialSwiper", {
            loop: true,
            autoHeight: true,
            slidesPerView: 1,
            autoplay: false,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
        // blog slider
        var swiper = new Swiper(".blogswiper", {
            loop: true,
            slidesPerView: 1,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".productswiper", {
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



    <script id="rendered-js">
        //By @nodws

        $(window).scroll(function() {

            let oppai = $(this).scrollTop();

            $('#content article').css({
                opacity: 100 / oppai,
                filter: 'blur(' + oppai / 100 + 'px)'
            });
            $('#content').css({
                opacity: 100 / oppai
            });

            if (oppai > 190) {
                if (!$('body').hasClass('abrido'))
                    $('#header-main').addClass('arre');
            } else {
                $('#header-main').removeClass('arre');
            }
        });

        $('#burger').on('click', function(e) {

            e.preventDefault();

            $('#nav-main, body, #burger').toggleClass('abrido');

            if ($('#header-main').hasClass('arre')) {
                $('#header-main').removeClass('arre').addClass('arreno');
            } else
            if ($('#header-main').hasClass('arreno')) {
                $('#header-main').removeClass('arreno');
                setTimeout(() => {
                    $('#header-main').addClass('arre');
                }, 800);
            }

        });
        //# sourceURL=pen.js
    </script>
    <script type="text/javascript">
        $("#cssmenu").menumaker({
            title: "Menu",
            breakpoint: 991,
            format: "multitoggle"
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#burger").click(function() {
                $(".menu-show").addClass("intro");
            });
        });
    </script>
    <!-- end -->

    <script src="<?= base_url('material/front') ?>/assets/jquery.loading.js"></script>

    <script src="<?= base_url('material/front') ?>/assets/common-function.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // jQuery(function() {

        //     jQuery('.popup-youtube, .popup-vimeo').magnificPopup({

        //         disableOn: 700,

        //         type: 'iframe',

        //         mainClass: 'mfp-fade',

        //         removalDelay: 160,

        //         preloader: false,

        //         fixedContentPos: false

        //     });

        // });
        
    </script>

    <script type="text/javascript" src="<?= base_url('material/assets/js/jquery.captcha.basic.min.js') ?>"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('.my-contactForm4').captcha();

        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script type="text/javascript">
        function commonFormChecking(flag, cls = '', msgbox = '') {

            if (cls == '') {

                cls = 'requiredCheck';

            }

            $('.' + cls).each(function() {

                if ($(this).hasClass("ckeditor")) {

                    if (CKEDITOR.instances[$(this).attr('id')].getData() == '') {

                        if (msgbox != '') {

                            //$("." + msgbox).text($(this).attr('data-check') + ' is mandatory !!!');

                            $("." + msgbox).text('Please enter your ' + $(this).attr('data-check') + ' !!!');

                        } else {

                            toastAlert('warning', 'Please enter your ' + $(this).attr('data-check') + ' !!!');

                        }

                        flag = false;

                        return false;

                    } else {

                        if (CKEDITOR.instances[$(this).attr("id")].getData().replace(/ |\s/g, '') === '<p></p>') {

                            if (msgbox != "") {

                                $("." + msgbox).text(

                                    $(this).attr("data-check") + " contains only blankspace !!!"

                                );

                            } else {

                                toastAlert("warning", $(this).attr("data-check") + " contains only blankspace !!!");

                            }

                            flag = false;

                            return false;

                        }

                    }

                } else {

                    if ($.trim($(this).val()) == '') {

                        if (msgbox != '') {

                            $("." + msgbox).text($(this).attr('data-check') + ' is mandatory !!!');

                        } else {

                            //swalAlert($(this).attr('data-check') + ' is mandatory !!!', 'warning');

                            toastAlert('warning', 'Please enter your ' + $(this).attr('data-check') + ' !!!');

                        }

                        flag = false;

                        return false;

                    } else {

                        if ($(this).attr('data-check') == 'Email' || $(this).attr('data-check') == 'Business Email' || $(this).attr('data-check') == 'To Email' || $(this).attr('data-check') == 'Contact Email' || $(this).attr('data-check') == 'Admin Email' || $(this).attr('data-check') == 'Email Form') {

                            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

                            if (reg.test($.trim($(this).val())) == false) {

                                if (msgbox != '') {

                                    $("." + msgbox).text('Enter valid Email address!!!');

                                } else {

                                    toastAlert('warning', 'Enter valid Email address !!!');

                                }

                                flag = false;

                                return false;

                            }

                        }

                        if ($(this).attr('data-check') == 'Phone' || $(this).attr('data-check') == 'Mobile') {

                            if ($.trim($(this).val()).length < 10) {

                                var txt = 'Enter 10 digit phone number !!!';

                                if (msgbox != '') {

                                    $("." + msgbox).text('Please enter a valid phone number !!!');

                                } else {

                                    toastAlert('warning', 'Please enter a valid phone number !!!');

                                }

                                flag = false;

                                return false;

                            }

                        }

                        /*if ($(this).attr('data-check') == 'Zip') {

                            if ($.trim($(this).val()).length != 6) {

                                if (msgbox != '') {

                                    $("." + msgbox).text('Enter 6 digit Postcode !!!');

                                } else {

                                    toastAlert('warning', 'Enter 6 digit Postcode !!!');

                                }

                                flag = false;

                                return false;

                            }

                        }*/

                    }

                }

            });

            return flag;

        }

        function toastAlert(type, message, redirectStatus = false, redirectUrl = '') {

            toastr.options = {

                "closeButton": true,

                "debug": true,

                "newestOnTop": false,

                "progressBar": true,

                "positionClass": "toast-bottom-left",

                "preventDuplicates": false,

                "showDuration": "3000",

                "hideDuration": "1000000",

                "timeOut": "5000",

                "extendedTimeOut": "1000",

                "showEasing": "swing",

                "hideEasing": "linear",

                "showMethod": "fadeIn",

                "hideMethod": "fadeOut"

            }

            toastr[type](message);

            if (redirectStatus) {

                setTimeout(function() {
                    window.location = redirectUrl;
                }, 3000);

            }

        }

        $(document).ready(function() {

            // subscribe form

            $(".newsletter-form").submit(function(e) {

                e.preventDefault();

                let flag = commonFormChecking(true, 'requiredSubscribe');

                if (flag) {

                    if (flag) {

                        var formData = new FormData(this);

                        $.ajax({

                            type: "POST",

                            url: '<?php echo base_url('submit-subscriber'); ?>',

                            data: formData,

                            cache: false,

                            contentType: false,

                            processData: false,

                            dataType: "JSON",

                            beforeSend: function() {



                            },

                            success: function(res) {

                                if (res.status) {

                                    $('.newsletter-form').trigger("reset");

                                    toastAlert("success", res.message);

                                } else {

                                    $('.newsletter-form').trigger("reset");

                                    toastAlert("error", res.message);

                                }

                            },

                        });

                    }

                }

            });

            // enquiry form contact page

            $("#contactForm").submit(function(e) {

                e.preventDefault();

                let flag = commonFormChecking(true, 'requiredContactPage');

                if (flag) {

                    if (flag) {

                        var formData = new FormData(this);

                        $.ajax({

                            type: "POST",

                            url: '<?php echo base_url('submit-contact'); ?>',

                            data: formData,

                            cache: false,

                            contentType: false,

                            processData: false,

                            dataType: "JSON",

                            beforeSend: function() {



                            },

                            success: function(res) {

                                if (res.status) {

                                    $('#contactForm').trigger("reset");

                                    toastAlert("success", res.message);

                                } else {

                                    $('#contactForm').trigger("reset");

                                    toastAlert("error", res.message);

                                }

                            },

                        });

                    }

                }

            });

            // enquiry form home page

            $("#contactFormHome").submit(function(e) {

                e.preventDefault();

                let flag = commonFormChecking(true, 'requiredContactHomePage');

                if (flag) {

                    if (flag) {

                        var formData = new FormData(this);

                        $.ajax({

                            type: "POST",

                            url: '<?php echo base_url('submit-contact'); ?>',

                            data: formData,

                            cache: false,

                            contentType: false,

                            processData: false,

                            dataType: "JSON",

                            beforeSend: function() {



                            },

                            success: function(res) {

                                if (res.status) {

                                    $('#contactFormHome').trigger("reset");

                                    toastAlert("success", res.message);

                                } else {

                                    $('#contactFormHome').trigger("reset");

                                    toastAlert("error", res.message);

                                }

                            },

                        });

                    }

                }

            });

            // enquiry form popup

            $("#consultForm").submit(function(e) {

                e.preventDefault();

                let flag = commonFormChecking(true, 'requiredConsult');

                if (flag) {

                    if (flag) {

                        var formData = new FormData(this);

                        $.ajax({

                            type: "POST",

                            url: '<?php echo base_url('submit-contact'); ?>',

                            data: formData,

                            cache: false,

                            contentType: false,

                            processData: false,

                            dataType: "JSON",

                            beforeSend: function() {



                            },

                            success: function(res) {

                                if (res.status) {

                                    $('#consultForm').trigger("reset");

                                    toastAlert("success", res.message);

                                } else {

                                    $('#consultForm').trigger("reset");

                                    toastAlert("error", res.message);

                                }

                            },

                        });

                    }

                }

            });

        });


        function showAlert({
            position = "center",
            icon = "success",
            title = "Data saved",
            showConfirmButton = false,
            timer = 1500
        }) {
            Swal.fire({
                position: position,
                icon: icon,
                title: title,
                showConfirmButton: showConfirmButton,
                timer: timer
            });
        }
    </script>


    <!-- [ page wise Scripts ] -->
    <?= $this->renderSection('scripts') ?>

</body>

</html>