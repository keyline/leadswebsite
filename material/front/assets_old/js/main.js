$(document).ready(function () {



    $(window).scroll(function () {

        if ($(window).scrollTop() > 76) {

            $('.desk-menu').addClass('scroll');

        } else {

            $('.desk-menu').removeClass('scroll');

        }

    });





    gsap.to(".fade-up", {

        scrollTrigger: {

            trigger: "amazing-deal",

            scroller: "body",

            // markers: true,

            start: "top 80%",

            end: "bottom 20%",

            scrub: 2,

            pin: true

        },

        y: -1000,

        duration: 3,

        delay: 1,

    })





    gsap.to(".fly", {

        scrollTrigger: {

            trigger: "amazing-deal",

            scroller: "body",

            markers: false,

            start: "top 0%",

            end: "bottom 20%",

            scrub: 2,

            pin: true

        },

        y: -500,

        x: -500,

        duration: 3,

        delay: 1,

    })



    gsap.to(".fly2", {

        scrollTrigger: {

            trigger: "amazing-deal",

            scroller: "body",

            markers: false,

            start: "top 0%",

            end: "bottom 20%",

            scrub: 2,

            pin: true

        },

        y: -800,

        x: 800,

        duration: 3,

        delay: 1,

    })

    gsap.to(".fly3", {

        scrollTrigger: {

            trigger: "allied-services",

            scroller: "body",

            // markers: true,

            start: "top 50%",

            end: "bottom 50%",

            scrub: 2,

            pin: true

        },

        y: -800,

        x: -800,

        duration: 3,

        delay: 1,

    })







    $('.home-carousel').owlCarousel({

        loop: true,

        margin: 10,

        nav: false,

        dots: true,

        autoplay: true,

        items: 1,

    });

    $(".client-carousel").owlCarousel({

        items: 1,



        loop: true,



        margin: 10,



        dots: false,



        nav: true,



        autoplay: true,



        autoplayHoverPause: true,



        navText: ['<img src="material/front/assets/img/left-arrow.webp"  width="42" height="10">', '<img src="material/front/assets/img/right-arrow.webp"  width="42" height="10">'],

    });

    $('.details-carousel').owlCarousel({

        loop: true,

        autoplay: true,

        margin: 20,

        items: 1,

        nav: true,

        dots: false,

        autoplayHoverPause: true,

        navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],

    });



    $('.accreditation-slider').owlCarousel({

        loop:true,

        margin:10,

        autoplay: true,

        nav:true,

        dots: false,

        navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],

        responsive:{

            0:{

                items:2

            },

            600:{

                items:3

            },

            1000:{

                items:6

            }

        }

    })



    AOS.init();







  



});

$("ul.term-list").each(function () {

    var LiN = $(this).find("li").length;

    if (LiN > 6) {

        $("li", this).eq(5).nextAll().hide().addClass("toggleable");

        $(this).append('<li class="more">See More...</li>');

    }

    });

    $("ul.term-list").on("click", ".more", function () {

    if ($(this).hasClass("less")) {

        $(this).text("See More...").removeClass("less");

    } else {

        $(this).text("See Less...").addClass("less");

    }

    $(this).siblings("li.toggleable").slideToggle();

    });


    $("ul.term-list2").each(function () {

        var LiN = $(this).find("li").length;
    
        if (LiN > 3) {
    
            $("li", this).eq(2).nextAll().hide().addClass("toggleable");
    
            $(this).append('<li class="more">See More...</li>');
    
        }
    
        });
    
        $("ul.term-list2").on("click", ".more", function () {
    
        if ($(this).hasClass("less")) {
    
            $(this).text("See More...").removeClass("less");
    
        } else {
    
            $(this).text("See Less...").addClass("less");
    
        }
    
        $(this).siblings("li.toggleable").slideToggle();
    
        });

        // $("body, html").mousedown(function (event) {
        //     event.preventDefault();
        //   });