jQuery(function($) {
    "use strict";

    //Preloader
    $(window).on('load', function() {
        $('body').delay(500).addClass('loaded').find('.loader').fadeOut(1000);
    });
    

    //Product Carousel
    $(".product-carousel").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds
        autoHeight: false,
        pagination: false,
        touchDrag: true,
        navigation: true,
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        items: 4,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3],
    });
    

    //Blog Carousel
    $(".blog-carousel").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds
        autoHeight: false,
        pagination: false,
        touchDrag: true,
        navigation: true,
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        items: 2,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3],
    });


    //Clients Carousel
    $(".clients").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds
        autoHeight: false,
        pagination: false,
        touchDrag: true,
        items: 5,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3]
    });


    //Testimonial Carousel
    $('.testimonial-slider').bxSlider({
        auto: true,
        mode: 'horizontal'
    });


    //Side Cart 
    $(".side-cart-toggle").on('click', function(e) {
        e.preventDefault();
        $(".side-cart").toggleClass("side-cart-open");
    });

    $(".close-cart").on('click', function(e) {
        e.preventDefault();
        $(".side-cart").toggleClass("side-cart-open");
    });


    //Side Menu
    $("#menu-toggle").on('click', function(e) {
        e.preventDefault();
        $(".side-nav").toggleClass("toggled");
    });

    $('.close-menu').on('click', function() {
        $(".side-nav").toggleClass("toggled");
        return false;
    });
    
    
    //Change Menu Background color On Scroll
    $(window).on('ready , scroll', function() {
        if ($(window).scrollTop() > 30) {
            $('.menu-transparent').addClass('active');
        } else {
            $('.menu-transparent').removeClass('active');
        }
    });
    

    //Mobile sub menu
    $(".submenu, .level-dropdown").on('click', function(event) {
        event.stopPropagation();
        $(this).find(".submenu, .level-dropdown").removeClass('open');
        $(this).parents(".submenu, .level-dropdown").addClass('open');
        $(this).toggleClass('open');
    });
    

    //Search
    $('#search-trigger').on('click', function() {
        $('#search').addClass('active').find('.search').focus();
        return false;
    });

    $('#search').on('click', function() {
        $(this).find('.search').focus();
    });

    $('#close').on('click', function() {
        $('#search').removeClass('active');
    });


    //Magnific Popup / Product Quickview
    $('.product-quick-view').magnificPopup({
        type: 'ajax'
    });
    

    //Magnific Popup / Video Popup
    $('.play-button').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });


    //Back To Top
    $("#back-top").hide();

    // fade in #back-top
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 500) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });

    $('#back-top').on('click', function(e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });


    //Accordion
    $(".set > a").on("click", function() {
        if ($(this).hasClass('active')) {
            $(this).removeClass("active");
            $(this).siblings('.content').slideUp(500);
        } else {
            $(".set > a").removeClass("active");
            $(this).addClass("active");
            $('.content').slideUp(500);
            $(this).siblings('.content').slideDown(500);
        }

    });


    //Tabs
    jQuery('.tabs .tab-links a').on('click', function(e) {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).fadeIn(500).siblings().hide();;

        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });


    //Product Quantity
    $('.quantity-number input').keydown(function(e) {
        e.preventDefault();
        return false;
    });
    var minNumber = 1;
    var maxNumber = 10;
    $('.quantity-number .btn:first-of-type').on('click', function() {
        if ($('.quantity-number input').val() == maxNumber) {
            return false;
        } else {
            $('.quantity-number input').val(parseInt($('.quantity-number input').val(), 10) + 1);
        }
    });

    $('.quantity-number .btn:last-of-type').on('click', function() {
        if ($('.quantity-number input').val() == minNumber) {
            return false;
        } else {
            $('.quantity-number input').val(parseInt($('.quantity-number input').val(), 10) - 1);
        }
    });
});