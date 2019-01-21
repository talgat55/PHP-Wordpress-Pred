// ---------------------------------------------------------
// !!!!!!!!!!!!!!!!!document ready!!!!!!!!!!!!!!!!!!!!!!!!!!
// ---------------------------------------------------------

jQuery(document).ready(function() {
    "use strict";
    jQuery('.page-template-page-news .predprinimatel-block').matchHeight();
    /*
    * Slider Home
    */

    jQuery('.home-image-slider').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        arrows: false,
        asNavFor: '.home-text-slider'
    });

    jQuery('.home-text-slider').slick({
        infinite: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        vertical: true,
        verticalSwiping: true,
        dots: false,
        asNavFor: '.home-image-slider',
        autoplay: true,
        arrows: false
    });

    jQuery('.home-announcement-slider').slick({
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        vertical: true,
        dots: false,
        autoplay: true,
        verticalSwiping: true,
        arrows: false
    });

    jQuery('body').on('click', '.home-text-slider .slider-text-walpaper',function(){

        var currentIndex = jQuery(this).index();
        console.log(currentIndex);
        jQuery('.home-image-slider').slick('slickGoTo', currentIndex);

    });
    /*
    * Replace test search in menu for mobile
     */


    jQuery('.responsive-menu-search-box').attr("placeholder", "Поиск");
    /*
    *   modal
    */
    jQuery('body').on('click', '.modal-main i, .overlay-modal-layer',function(){

        jQuery('.modal-main').fadeOut();
        jQuery('.overlay-modal-layer').fadeOut();

    });

    jQuery('body').on('click', '.call-link',function(){

        jQuery('.modal-main').fadeIn();
        jQuery('.overlay-modal-layer').fadeIn();
        return false;

    });
    /*
    * Input telephone mask
    */

    jQuery('.one-but-phone, #billing_phone').inputmask({"mask": "+7 (999) 999-9999"});

    Accordion();



// end redy function

});

function Accordion() {

    jQuery('.block-qa-wrap').find('.title-accordion').click(function () {
        jQuery(this).next().stop().slideToggle();
        jQuery(this).toggleClass("accordion-open");
    }).next().stop().hide();

}