(function($) {
    'use strict';  

/*===============
Preloader js
=================*/
jQuery(window).on('load', function(e) {
  setTimeout(function() {
    jQuery('.preloader').fadeOut('slow', function() {});
  }, 2000);
});

/* -------------------------------------- */
    //              Sticky Nav
    /* -------------------------------------- */
    $(window).on('scroll', function(){'use strict';
        if ( $(window).scrollTop() > 130 ) {
            $('#masthead').addClass('sticky');
        } else {
            $('#masthead').removeClass('sticky');
        }
    });

/* -------------------------------------- */
    //              Search onclick
    /* -------------------------------------- */
    $('.hd-search-btn').on('click', function(event) { 'use strict';
        event.preventDefault();
        var $searchBox = $('.home-search');
        if ($searchBox.hasClass('show')) {
            $searchBox.removeClass('show');
            $searchBox.fadeOut('fast');
        }else{
            $searchBox.addClass('show');
            $searchBox.fadeIn('slow');
        }
    });

    $('.hd-search-btn-close').on('click', function(event) { 'use strict';
        event.preventDefault();

        var $searchBox = $('.home-search');
        $searchBox.removeClass('show');
        $searchBox.fadeOut('fast');
    }); 


/* --------------------------------------
    *       3. Elimentor Editor Menu Hide
    *  -------------------------------------- */
    $(".elementor-editor-active .header").on('mouseover', function(){
        $(".header").hide();
    });
    $(".elementor-inner").on('mouseout', function(){
        $(".header").show();
    });

/*------------------------------ 
WOW Active
---------------------------------*/
new WOW().init();
  
/*------------------------------ 
Nice Select Active
---------------------------------*/
jQuery('select').niceSelect();

$('.prettySocial').prettySocial();
$("a[data-rel=prettyPhoto]").prettyPhoto();
    

    /* --------------------------------------
    *       8. Testimonial & Slider
    *  -------------------------------------- */
    var dir = jQuery("html").attr("dir");
    var rtl = false;
    if( dir == 'rtl' ){
        rtl = true;
    }

    // Testimonial Code
    if( jQuery('.testimonial_content_wrapper').length > 0 ){
        var auto    = jQuery('.testimonial_content_wrapper').data('autoplay'),
            dot     = jQuery('.testimonial_content_wrapper').data('showdots'),
            navi    = $('.testimonial_content_wrapper').data('showarrow');
        var argument = {
                        rtl: rtl,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    };
        if( auto == 'yes' ){ argument.autoplay = true ; }else{ argument.autoplay = false; }
        if( dot == 'yes' ){ argument.dots = true; }else{ argument.dots = false; }
        if( navi == 'yes' ){
            argument.nextArrow = '<span class="slick-next"><i class="fa fa-arrow-right"></i></span>'; 
            argument.prevArrow = '<span class="slick-prev"><i class="fa fa-arrow-left"></i></span>'; 
        } else {
            argument.nextArrow = '';
            argument.prevArrow = '';
        }
        argument.responsive =  [
                                {
                                breakpoint: 1024,
                                settings: { slidesToShow: 2, slidesToScroll: 2, }
                                },
                                {
                                breakpoint: 600,
                                settings: { 
                                    slidesToShow: 1, 
                                    slidesToScroll: 1 
                                }
                                },
                                {
                                breakpoint: 480,
                                settings: { 
                                    slidesToShow: 1, 
                                    slidesToScroll: 1
                                }
                                }
                            ];
                            
        jQuery('.testimonial_content_wrapper').slick( argument );
    }
// Slider Video & Image Popup
jQuery('.popup-youtube, .popup-vimeo').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
});


/*--------------------------
Imager Popup js
-----------------------------*/
  jQuery('.image-link').magnificPopup({
    type: 'image',
    gallery: {
    enabled: true
    }
  });

/*====================
Video Popup js
======================*/
 jQuery('.popup-video').magnificPopup({
    type: 'iframe',
  });

/* -------------------------------------- */
    //          Woocommerce
    /* -------------------------------------- */    
    $( ".woocart" ).hover(function() {
        $(this).find('.widget_shopping_cart').stop( true, true ).fadeIn();
    }, function() {
        $(this).find('.widget_shopping_cart').stop( true, true ).fadeOut();
    }); 



    $('.woocart a').html( $('.woo-cart').html() );

    $('.add_to_cart_button').on('click',function(){'use strict';

            $('.woocart a').html( $('.woo-cart').html() );          

            var total = 0;
            if( $('.woo-cart-items span.cart-has-products').html() != 0 ){
                if( $('#navigation ul.cart_list').length  > 0 ){
                    for ( var i = 1; i <= $('#navigation ul.cart_list').length; i++ ) {
                        var total_string = $('#navigation ul.cart_list li:nth-child('+i+') .quantity').text();
                        total_string = total_string.substring(-3, total_string.length);
                        total_string = total_string.replace('×', '');
                        total_string = parseInt( total_string.trim() );
                        //alert( total_string );
                        if( !isNaN(total_string) ){ total = total_string + total; }
                    }
                }
            }
            $('.woo-cart-items span.cart-has-products').html( total+1 );

    }); 

    

    // Slider Code
    if( $('.slider_content_wrapper').length > 0 ){
        var control = false;
        if(  $('.slider_content_wrapper').data('control') == 'yes' ){ control = true; }
        var autoplay = false;
        if(  $('.slider_content_wrapper').data('autoplay') == 'yes' ){ autoplay = true; }

        $('.slider_content_wrapper').slick({
            rtl: rtl,
            autoplay: autoplay,
            dots: control,
            dotsClass: 'thm-slide-control',
            nextArrow: '',
            prevArrow: '',
            speed: 300,
            autoplaySpeed: 3000,
            adaptiveHeight: true
        });

        // Slider Animation
        setInterval(function(){
            $('.slider-single-wrapper').each(function(){
                
                var $speed_ = 'animation-duration';
                if( $(this).hasClass('slick-active') ) {
                    $(this).find('.slider-media').addClass( $(this).find('.slider-media').data( 'animation' ) ).css( $speed_ , $(this).find('.slider-media').data( 'speed' ) );
                    $(this).find('.slider-subtitle').addClass( $(this).find('.slider-subtitle').data( 'animation' ) ).css( $speed_ , $(this).find('.slider-subtitle').data( 'speed' ) );
                    $(this).find('.slider-title').addClass( $(this).find('.slider-title').data( 'animation' ) ).css( $speed_ , $(this).find('.slider-title').data( 'speed' ) );
                    $(this).find('.slider-content').addClass( $(this).find('.slider-content').data( 'animation' ) ).css( $speed_ , $(this).find('.slider-content').data( 'speed' ) );
                    $(this).find('.slider-button-1').addClass( $(this).find('.slider-button-1').data( 'animation' ) ).css( $speed_ , $(this).find('.slider-button-1').data( 'speed' ) );
                    $(this).find('.slider-button-2').addClass( $(this).find('.slider-button-2').data( 'animation' ) ).css( $speed_ , $(this).find('.slider-button-2').data( 'speed' ) );
                } else {
                    $(this).find('.slider-media').removeClass( $(this).find('.slider-media').data( 'animation' ) ).css( $speed_ , $(this).find('.slider-media').data( 'speed' ) );
                    $(this).find('.slider-subtitle').removeClass( $(this).find('.slider-subtitle').data( 'animation' ) ).css( $speed_ , $(this).find('.slider-subtitle').data( 'speed' ) );
                    $(this).find('.slider-title').removeClass( $(this).find('.slider-title').data( 'animation' ) ).css( $speed_ , $(this).find('.slider-title').data( 'speed' ) );
                    $(this).find('.slider-content').removeClass( $(this).find('.slider-content').data( 'animation' ) ).css( $speed_ , $(this).find('.slider-content').data( 'speed' ) );
                    $(this).find('.slider-button-1').removeClass( $(this).find('.slider-button-1').data( 'animation' ) ).css( $speed_ , $(this).find('.slider-button-1').data( 'speed' ) );
                    $(this).find('.slider-button-2').removeClass( $(this).find('.slider-button-2').data( 'animation' ) ).css( $speed_ , $(this).find('.slider-button-2').data( 'speed' ) );
                }
            });
        }, 1 );

    }


/* --------------------------------------
    *       9. Portfolio Items Filter
    *  -------------------------------------- */
    $(window).load(function(){
        var $container = $('.portfolioContainer');
        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
    
        jQuery('.portfolioFilter a').click(function(){
            $('.portfolioFilter .current').removeClass('current');
            $(this).addClass('current');
     
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
             });
             return false;
        }); 
    });


    

/*========================
Back To Top
==========================*/
  jQuery(window).on('scroll',function(e) {
    if (jQuery(this).scrollTop() > 350) {
      jQuery('#scroll_top').fadeIn();
        } else {
        jQuery('#scroll_top').fadeOut();
      }
    });

/*===========================
scroll body to 0px on click
=============================*/ 
  jQuery('#scroll_top').on('click', function(e) {
    jQuery('#scroll_top').tooltip('hide');
    jQuery('body,html').animate({
      scrollTop: 0
        }, 1500);
          return false;
      });

  })(jQuery);