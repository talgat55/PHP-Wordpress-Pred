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

        jQuery('.home-image-slider').slick('slickGoTo', currentIndex);

    });

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

//----------------------------------
// Map
//------------------------------------
    if (jQuery('.map-holder').length) {

        ymaps.ready(function () {
            var myMap = new ymaps.Map('map', {
                    center: [54.997053, 73.350672],
                    zoom: 12,
                    controls: ['zoomControl']
                }, {
                    // searchControlProvider: 'yandex#search'
                }),

                // Создаём макет содержимого.
                /*  MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                      '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
                  ),*/

                myPlacemark = new ymaps.Placemark([54.997053, 73.350672], {
                    id: '1'
                }, {

                    // Опции.
                    // Необходимо указать данный тип макета.
                    iconLayout: 'default#image',
                    // Своё изображение иконки метки.
                    //
                    // iconImageHref: 'http://lightxdesign.fvds.ru/images/geo1.png',
                    // // Размеры метки.
                    // iconImageSize: [123, 132],
                    // // Смещение левого верхнего угла иконки относительно
                    // // её "ножки" (точки привязки).
                    // iconImageOffset: [-62, -132]
                });


            myMap.geoObjects

                .add(myPlacemark);

            myMap.behaviors.disable('scrollZoom');
            myMap.behaviors.disable('multiTouch');


            myMap.behaviors.disable('drag');


        });
    }

// end redy function

});

function Accordion() {

    jQuery('.block-qa-wrap').find('.title-accordion').click(function () {
        jQuery(this).next().stop().slideToggle();
        jQuery(this).toggleClass("accordion-open");
    }).next().stop().hide();

}