﻿jQuery(function($) {
    "use strict";
    var fooday = window.fooday || {};

    /*------------------------------------------------------------------
    This file include js code for shortcode, element in main content
    -------------------------------------------------------------------*/

    fooday.mainlayoutFuntion = function() {
        var svg_height = 35 - $(window).width() / 2 * 0.06;
        $('.bg-top-header').css('transform','translateY(' + svg_height + 'px) scale(-1,-1)');
        // Top Slider
        $(".top-slider").slick({
            dots: true,
            arrow: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            speed: 1000,
            nextArrow: "<div class='next-slide'><a class='arrow-slide'><i class='fa fa-chevron-right'></i></a></div>",
            prevArrow: "<div class='prev-slide'><a class='arrow-slide'><i class='fa fa-chevron-left'></i></a></div>",
        });
        // On before slide change
        $('.home-one-page #main-nav li a').bind('click', function(event){
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: ($($anchor.attr('href')).offset().top )
            }, 1000, 'easeInOutExpo');
           event.preventDefault();s
        });

        // Highlight the top nav as scrolling occurs
        $('body').scrollspy({
            target: '.main-nav-wrapper',
            offset: 50
        });

        //to top
        $('#totop').on('click', function(e){
            e.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');
            return false;
        });

        $('.parallax-window').each(function(){
            var $this = $(this);
            var image_src = $this.attr('data-image-src');
            setTimeout(function(){
                $this.parallax({
                    imageSrc: image_src
                })
            },200);
        });
    }

    fooday.niceScroll = function() {
        // Smooth Scroll
        if ( $.fn.niceScroll ) {
            var nice = $("html").niceScroll({
                cursorborder:"",
                horizrailenabled:false,
                smoothscroll: true,
                scrollspeed: 100,
                mousescrollstep: 80,
            });
        }
    }

    // Set menu fixed when scroll
    fooday.menuScroll = function() {
        var window_height = $(window).height();
        $(window).bind('scroll load', function() {
            if ($(this).scrollTop() > window_height) {
                $("header").addClass("header-fixed");
                $('#totop').removeClass('zoomOut');
                $('#totop').addClass('zoomIn');
                $('#totop') .fadeIn();
            } else {
                $('#totop').addClass('zoomOut');
                $('#totop').removeClass('zoomIn');
                $('#totop').fadeOut();
                $("header").removeClass("header-fixed");
            }
        });
    }

    // Menu Hover
    fooday.menuHover = function() {

        // Using class swin-transition to check function menuOffcanvas run already or not - Avoid run double time
        $(".wrapper-content").remove('swin-transition');

        // Dropdown Hover
        $('ul#main-nav li.dropdown').hover(function() {
          $(this).addClass('open');
        }, function() {
          $(this).removeClass('open')
        });
    }

    // Menu Offcanvas for table and mobile device
    fooday.menuOffcanvas = function() {

        // Using class swin-transition to check this function run already or not - Avoid run double time
        $(".wrapper-content").addClass('swin-transition');

        // Task in Offcanvas
        function openNav() {
            $('body').addClass('offcanvas-on');
        }

        function closeNav() {
            $('body').removeClass('offcanvas-on');
        }
        $('.open-offcanvas').on('click', function(){
            openNav();
        });
        $('.close-offcanvas').on('click', function(){
            closeNav();
        });
        $('#main-nav .btn-open-dropdown').on('click',function(e){
            e.preventDefault();
            $(this).next().toggleClass('open');
        });
    }

    /*------------------------------------------------------------------
    Initialize Function
    -------------------------------------------------------------------*/
    $(document).ready(function(){

        //page loader
        if ( $('#loader').length ) {
            var loader = new SVGLoader( document.getElementById( 'loader' ), { speedIn : 500, easingIn : mina.easeinout } );
            loader.show();
        }

        // Main function
        fooday.mainlayoutFuntion();
        if ( ! $('body').hasClass('st-fullpage') ) {
            fooday.menuScroll();
        }

        /* Nicescroll with beautiful effect when scrolling website, but there are some bugs with responsive device, please check this site
        and open below code if you like it https://nicescroll.areaaperta.com */
        // fooday.niceScroll();

        // Check Menu Style
        if ($(window).width() < 1025) {
            // active offcanvas menu
            fooday.menuOffcanvas();
        } else {
            // active hover menu
            fooday.menuHover();
            var s = skrollr.init({forceHeight: false});
        }
        new WOW().init();

        // Close loader and active Nicescroll
        if ( $('#loader').length ) {
            setTimeout(function(){
                loader.hide();
                $("#loader").css('display','none');
                $('.pageload-overlay').css('background-color','transparent');
                /* Nicescroll with beautiful effect when scrolling website, but there are some bugs with responsive device, please check this site
                and open below code if you like it https://nicescroll.areaaperta.com */
                // fooday.niceScroll();
            }, 1500);
        }
    });

    $( window ).resize(function() {
        if ($(window).width() < 1025) {
            if ( !$(".wrapper-content").hasClass('swin-transition') ) {
                // active offcanvas menu
                $(".wrapper-content").addClass('swin-transition');
                fooday.menuOffcanvas();
            }
        } else {
            // active hover menu
            fooday.menuHover();
        }
        var svg_height = 35 - $(window).width() / 2 * 0.06;
        $('.bg-top-header').css('transform','translateY(' + svg_height + 'px) scale(-1,-1)');
    });

});
