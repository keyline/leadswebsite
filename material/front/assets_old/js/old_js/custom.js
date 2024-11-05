/***************************************************************************************************************

||||||||||||||||||||||||||||        CUSTOM SCRIPT FOR ENDUZ                      |||||||||||||||||||||||||||||||

****************************************************************************************************************

||||||||||||||||||||||||||||              TABLE OF CONTENT                  ||||||||||||||||||||||||||||||||||||

****************************************************************************************************************

****************************************************************************************************************



01. Revolution slider

02. Sticky header

03. Prealoader

04. Language switcher

05. prettyPhoto

06. BrandCarousel

07. Testimonial carousel

08. ScrollToTop 

09. Cart Touch Spin

10. PriceFilter

11. Cart touch spin

12. Fancybox activator

13. ContactFormValidation

14. Scoll to target

15. PrettyPhoto



****************************************************************************************************************

||||||||||||||||||||||||||||            End TABLE OF CONTENT                ||||||||||||||||||||||||||||||||||||

****************************************************************************************************************/



"use strict";







//====Main menu===

function mainmenu() {

	//Submenu Dropdown Toggle

	if($('.main-menu li.dropdown ul').length){

		$('.main-menu li.dropdown').append('<div class="dropdown-btn"></div>');

		

		//Dropdown Button

		$('.main-menu li.dropdown .dropdown-btn').on('click', function() {

			$(this).prev('ul').slideToggle(500);

		});

	}

}



//===Language switcher===

function languageSwitcher() {

    if ($("#polyglot-language-options").length) {

        $('#polyglotLanguageSwitcher').polyglotLanguageSwitcher({

            effect: 'slide',

            animSpeed: 500,

            testMode: true,

            onChange: function(evt) {

                    alert("The selected language is: " + evt.selectedItem);

                }



        });

    };

}



//===Header Sticky===

function stickyHeader() {

    if ($('.stricky').length) {

        var strickyScrollPos = 100;

        if ($(window).scrollTop() > strickyScrollPos) {

            $('.stricky').addClass('stricky-fixed');

            $('.scroll-to-top').fadeIn(1500);

        } else if ($(this).scrollTop() <= strickyScrollPos) {

            $('.stricky').removeClass('stricky-fixed');

            $('.scroll-to-top').fadeOut(1500);

        }

    };

}







//Update Header Style and Scroll to Top

function headerStyle() {

    if($('.main-header').length){

        var windowpos = $(window).scrollTop();

        var siteHeader = $('.main-header');

        var sticky_header = $('.fixed-header .sticky-header');

        var scrollLink = $('.scroll-to-top');

        if (windowpos > 50) {

            siteHeader.addClass('fixed-header');

            sticky_header.addClass("animated slideInDown");

            scrollLink.fadeIn(300);

        } else {

            siteHeader.removeClass('fixed-header');

            sticky_header.removeClass("animated slideInDown");

            scrollLink.fadeOut(300);

        }

    }

}









//===Search box ===

function searchbox() {

	//Search Box Toggle

	if($('.seach-toggle').length){

		//Dropdown Button

		$('.seach-toggle').on('click', function() {

			$(this).toggleClass('active');

			$(this).next('.search-box').toggleClass('now-visible');

		});

	}

}



//  scoll to Top

function scrollToTop() {

    if ($('.scroll-to-target').length) {

        $(".scroll-to-target").on('click', function() {

            var target = $(this).attr('data-target');

            // animate

            $('html, body').animate({

                scrollTop: $(target).offset().top

            }, 1000);



        });

    }

}



// ===Prealoder===

function prealoader() {

    if($('.preloader').length){

        $('.preloader').delay(200).fadeOut(150);

    }

}



//  Fact counter

function CounterNumberChanger () {

	var timer = $('.timer');

	if(timer.length) {

		timer.appear(function () {

			timer.countTo();

		})

	}

}



function singleProductTab () {

    if($('.tabs-box').length){

        $('.tabs-box .tab-buttons .tab-btn').on('click', function(e) {

            e.preventDefault();

            var target = $($(this).attr('data-tab'));



            if ($(target).is(':visible')){

                return false;

            }else{

                target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');

                $(this).addClass('active-btn');

                target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);

                target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');

                $(target).fadeIn(300);

                $(target).addClass('active-tab');

            }

        });

    }

}







function customTabSingleService () {

    if ($('.tabmenu-box').length) {

        var tabWrap = $('.tab-content-box');

        var tabClicker = $('.tabmenu-box ul li');

        

        tabWrap.children('div').hide();

        tabWrap.children('div').eq(0).show();

        tabClicker.on('click', function() {

            var tabName = $(this).data('tab-name');

            tabClicker.removeClass('active');

            $(this).addClass('active');

            var id = '#'+ tabName;

            tabWrap.children('div').not(id).hide();

            tabWrap.children('div'+id).fadeIn('500');

            return false;

        });        

    }

}















//Accordion Box

function accordion() {

    if($('.accordion-box').length){

        $(".accordion-box").on('click', '.accord-btn', function() {



            if($(this).hasClass('active')!==true){

            $('.accordion .accord-btn').removeClass('active');



            }



            if ($(this).next('.accord-content').is(':visible')){

                $(this).removeClass('active');

                $(this).next('.accord-content').slideUp(500);

            }else{

                $(this).addClass('active');

                $('.accordion .accord-content').slideUp(500);

                $(this).next('.accord-content').slideDown(500);	

            }

        });	

    }

}







if($('.slider-nav').length){

       $('.slider-nav').slick({

        slidesToShow: 1,

        slidesToScroll: 1,

        dots: true,

        arrows: false,

        fade: true,

        autoplay: true,

        focusOnSelect: true

    });

}













//Accordions

// if($('.accordion-holder').length){

//     $('.accordion-holder .acc-btn').on('click', function() {

//     if($(this).hasClass('active')!==true){

//             $('.accordion-holder .acc-btn').removeClass('active');

//         }



//     if ($(this).next('.acc-content').is(':visible')){

//             $(this).removeClass('active');

//             $(this).next('.acc-content').slideUp(500);

//         }

//     else{

//             $(this).addClass('active');

//             $('.accordion-holder .acc-content').slideUp(500);

//             $(this).next('.acc-content').slideDown(500);	

//         }

//     });

// }












//=== Tool tip ===

function tooltip () {

	if ($('.tool_tip').length) {

			$('.tool_tip').tooltip();

		};

	$

}























// Select menu 

function selectDropdown() {

    if ($(".selectmenu").length) {

        $(".selectmenu").selectmenu();



        var changeSelectMenu = function(event, item) {

            $(this).trigger('change', item);

        };

        $(".selectmenu").selectmenu({ change: changeSelectMenu });

    };

}







//=== Services Carousel ===

function servicesCarousel () {

    if ($('.services-carousel').length) {

        $('.services-carousel').owlCarousel({

            dots: true,

            loop:true,

            margin:20,

            nav:false,

            navText: [

                '<i class="fa fa-angle-left"></i>',

                '<i class="fa fa-angle-right"></i>'

            ],

            autoplayHoverPause: false,

            autoplay: 6000,

            smartSpeed: 1000,

            responsive:{

                0:{

                    items:1

                },

                600:{

                    items:1

                },

                800:{

                    items:2

                },

                1024:{

                    items:2

                },

                1100:{

                    items:2

                },

                1200:{

                    items:3

                }

            }

        });    		

    }

}







//=== Testimonial Carousel ===

function testimonialCarousel () {

    if ($('.testimonial-carousel').length) {

        $('.testimonial-carousel').owlCarousel({

            dots: false,

            loop:true,

            margin:20,

            nav:true,

            navText: [

                '<span class="icon-arrow left"><p>Prev</p></span>',

                '<span class="icon-arrow right"><p>Next</p></span>'

            ],

            autoplayHoverPause: false,

            autoplay: 6000,

            smartSpeed: 1000,

            responsive:{

                0:{

                    items:1

                },

                600:{

                    items:1

                },

                800:{

                    items:2

                },

                1024:{

                    items:2

                },

                1100:{

                    items:3

                },

                1200:{

                    items:3

                }

            }

        });    		

    }

}















//=== Services Carousel 2===

function servicesCarousel2 () {

    if ($('.services-carousel2').length) {

        $('.services-carousel2').owlCarousel({

            dots: true,

            loop:true,

            margin:30,

            nav:false,

            navText: [

                '<i class="fa fa-angle-left"></i>',

                '<i class="fa fa-angle-right"></i>'

            ],

            autoplayHoverPause: false,

            autoplay: 6000,

            smartSpeed: 1000,

            responsive:{

                0:{

                    items:1

                },

                600:{

                    items:1

                },

                800:{

                    items:1

                },

                1024:{

                    items:2

                },

                1100:{

                    items:2

                },

                1200:{

                    items:3

                }

            }

        });    		

    }

}













	













    

    













//LightBox / Fancybox

if($('.lightbox-image').length) {

    $('.lightbox-image').fancybox({

        openEffect  : 'fade',

        closeEffect : 'fade',

        helpers : {

            media : {}

        }

    });

}





// Elements Animation

if($('.wow').length){

    var wow = new WOW(

      {

        boxClass:     'wow',      // animated element css class (default is wow)

        animateClass: 'animated', // animation css class (default is animated)

        offset:       0,          // distance to the element when triggering the animation (default is 0)

        mobile:       false,       // trigger animations on mobile devices (default is true)

        live:         true       // act on asynchronously loaded content (default is true)

      }

    );

    wow.init();

}































// Dom Ready Function

jQuery(document).on('ready', function () {

	(function ($) {

        // add your functions

        mainmenu ();

        languageSwitcher ();

        searchbox ();

        scrollToTop ();

        CounterNumberChanger ();

        singleProductTab ();

        customTabSingleService ();

        //priceFilter ();

        // accordion ();

        //cartTouchSpin ();

        selectDropdown ();

        //datepicker ();

        //timepicker ();

        tooltip ();

        //countDownTimer ();

        //projectMasonaryLayout ();

        //countryInfo ();



     

  

        

        servicesCarousel ();

        testimonialCarousel ();

        //featuredProjectCarousel ();

        //featuredCarousel ();

        servicesCarousel2 ();

        //featuredProjectCarouselv2();

        //testimonialCarouselv2();

        //singleServiceCarousel()

       



  

        

        

   

 

	})(jQuery);

    

});

jQuery(document).ready(function(){
    // $('.about-accordion').click(function(){
    //     $(this).parent('.accordion-body').find(".panel").slideDown();
    //     $(this).parent('.accordion-body').prevAll('.accordion-body').find('.panel').slideUp(500);
    //     $(this).parent('.accordion-body').nextAll('.accordion-body').find('.panel').slideUp(500);
    // });

    $('.card-header').click(function(){
        var a = $(this).parent('.card').find('.show').removeAttr('');
        // alert('dfsdgf');
    });
    
});


// jQuery(document).click(function(event){
//     $('.slide-menu').css('transform','translateX(100%)');
//     event.stopPropagation();
//     event.preventDefault();
// });







jQuery(window).on('scroll', function(){

	(function ($) {

	stickyHeader ();

    headerStyle ()  

    

	})(jQuery);

});







// Instance Of Fuction while Window Load event

jQuery(window).on('load', function() {

    (function($) {

        prealoader ();

        

    })(jQuery);

});




$('#responsiveTabsDemo').responsiveTabs({
    startCollapsed: 'accordion'
});
;