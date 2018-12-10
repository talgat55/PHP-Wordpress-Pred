// ---------------------------------------------------------
// !!!!!!!!!!!!!!!!!document ready!!!!!!!!!!!!!!!!!!!!!!!!!!
// ---------------------------------------------------------

jQuery(document).ready(function() {
    "use strict";


    /*
    * Slider Home
    */

    jQuery('.home-image-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        arrows: false,
        asNavFor: '.home-text-slider'
    });
    jQuery('.home-text-slider').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        vertical: true,
        centerMode: true,
        dots: false,
        asNavFor: '.home-image-slider',
        autoplay: true,
        arrows: false,

    });
    jQuery('.home-announcement-slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        vertical: true,
        dots: false,
        autoplay: true,
        verticalSwiping: true,
        arrows: false,

    });



    /*
    * Input telephone mask
     */
    jQuery('.one-but-phone, #billing_phone').inputmask({"mask": "+7 (999) 999-9999"});








    Accordion();



// end redy funvtion
});

function Accordion() {
    jQuery('.block-qa-wrap').find('.title-accordion').click(function () {
        jQuery(this).next().stop().slideToggle();
        jQuery(this).toggleClass("accordion-open");
    }).next().stop().hide();
}