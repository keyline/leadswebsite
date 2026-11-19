
//navigation-part start

//navigation



//navigation-part end





//search




$(document).ready(function() {
    var brandSlider = $('#commodites-artist');
    brandSlider.owlCarousel({
    loop: true,
    margin: 20,
    dots: false,
    nav: true,
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
            items: 1.2,
        },
        750: {
            items: 2.2,
        },
        1000: {
            items: 2.2,
        }
    }
})
function brandSliderClasses() {
    brandSlider.each(function() {
        var total = $(this).find('.owl-item.active').length;
        $(this).find('.owl-item').removeClass('firstactiveitem');
        $(this).find('.owl-item').removeClass('lastactiveitem');
        $(this).find('.owl-item.active').each(function(index) {
            if (index === 0) {
                $(this).addClass('firstactiveitem')
            }
            if (index === total - 1 && total > 1) {
                $(this).addClass('lastactiveitem')
            }
        })
    })
}
brandSliderClasses();
brandSlider.on('translated.owl.carousel', function(event) {
    brandSliderClasses()
}); 

    $('#homefade-slider').owlCarousel({
        animateOut: 'fadeOut',
        items:1,
        loop: true,
        margin:30,
        autoplay: false,
        autoplayTimeout: 4000,
        stagePadding:30,
        smartSpeed:450,
        nav: true,
        dots: false,
        navText: ["<i class='zmdi zmdi-arrow-left'></i>", "<i class='zmdi zmdi-arrow-right'></i>"],
    });

    $("#home-successstories").owlCarousel({
        loop: true,
        margin: 20,
		dots: false,
		nav: true,
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
                items: 3,
            },
            1000: {
                items: 4,
            },
            1200: {
                items: 6,
            }
        }
    });

    $("#sucess_board_listing").owlCarousel({
        animateOut: 'fadeOut',
        items:1,
        loop: true,
        margin:10,
        autoplay: false,
        autoplayTimeout: 4000,
        //stagePadding:30,
        smartSpeed:450,
        nav: true,
        dots: false,
        navText: ["<i class='zmdi zmdi-arrow-left'></i>", "<i class='zmdi zmdi-arrow-right'></i>"],
    });
    

    


    
  
   
 
});




$(document).ready(function() {
    //Horizontal Tab
    $('#parentHorizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion
        width: 'auto', //auto or any width like 600px
        fit: true, // 100% fit in a container
        tabidentify: 'hor_1', // The tab groups identifier
        activate: function(event) { // Callback function if tab is switched
            var $tab = $(this);
            var $info = $('#nested-tabInfo');
            var $name = $('span', $info);
            $name.text($tab.text());
            $info.show();
        }
    });

    
    
});


$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 400) {
        $(".header").addClass("sticky-header");
    } else {
        $(".header").removeClass("sticky-header");
    }
});

// aos animation



// ============= Page right sticky form =================






