(function($) {
    'use strict';

    var woocommerce = {};
    qodef.modules.woocommerce = woocommerce;

    woocommerce.qodefInitQuantityButtons = qodefInitQuantityButtons;
    woocommerce.qodefInitSelect2 = qodefInitSelect2;
    woocommerce.qodefInitSingleProductSlider = qodefInitSingleProductSlider;
    woocommerce.qodefInitImageHolderHeight = qodefInitImageHolderHeight;

    woocommerce.qodefOnDocumentReady = qodefOnDocumentReady;
    woocommerce.qodefOnWindowLoad = qodefOnWindowLoad;
    woocommerce.qodefOnWindowResize = qodefOnWindowResize;
    woocommerce.qodefOnWindowScroll = qodefOnWindowScroll;

    $(document).ready(qodefOnDocumentReady);
    $(window).load(qodefOnWindowLoad);
    $(window).resize(qodefOnWindowResize);
    $(window).scroll(qodefOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function qodefOnDocumentReady() {
        qodefInitQuantityButtons();
        qodefInitSelect2();
        qodefInitSingleProductSlider();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function qodefOnWindowLoad() {
        qodefInitImageHolderHeight();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function qodefOnWindowResize() {

    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function qodefOnWindowScroll() {

    }
    

    function qodefInitQuantityButtons() {

        $('.qodef-quantity-minus, .qodef-quantity-plus').click(function(e) {
            e.stopPropagation();

            var button = $(this),
                inputField = button.siblings('.qodef-quantity-input'),
                step = parseFloat(inputField.attr('step')),
                max = parseFloat(inputField.attr('max')),
                minus = false,
                inputValue = parseFloat(inputField.val()),
                newInputValue;

            if (button.hasClass('qodef-quantity-minus')) {
                minus = true;
            }

            if (minus) {
                newInputValue = inputValue - step;
                if (newInputValue >= 1) {
                    inputField.val(newInputValue);
                } else {
                    inputField.val(1);
                }
            } else {
                newInputValue = inputValue + step;
                if ( max === undefined ) {
                    inputField.val(newInputValue);
                } else {
                    if ( newInputValue >= max ) {
                        inputField.val(max);
                    } else {
                        inputField.val(newInputValue);
                    }
                }
            }

        });

    }

    function qodefInitSelect2() {

        if ($('.woocommerce-ordering .orderby').length ||  $('#calc_shipping_country').length ) {

            $('.woocommerce-ordering .orderby').select2({
                minimumResultsForSearch: Infinity
            });

            $('#calc_shipping_country').select2();

        }

    }

    /* Functions for single product gallery with thumbnails - start */
    function qodefInitSingleProductSlider() {

        var sync1 = $(".qodef-single-product-images .qodef-single-product-slider");
        var sync2 = $(".qodef-single-product-images .qodef-single-product-thumbs");
        var productImage, thumbImage;
        var variableProductsHolder = $('.qodef-variation-images');

        sync1.owlCarousel({
            singleItem : true,
            slideSpeed : 1000,
            navigation: true,
            transitionStyle: 'fade',
            pagination:false,
            afterAction : qodefSyncPosition,
            responsiveRefreshRate : 200,
            afterUpdate: function() {
                qodefInitImageHolderHeight();
            },
            afterInit: function(){
                productImage =  sync1.find('.wp-post-image');
                productImage.on( "load", function(){
                    if(variableProductsHolder.length) {
                        if(typeof thumbImage !== 'undefined') {
                            var originalSrc = productImage.parent().attr('href');
                            var variableProductsImages = variableProductsHolder.find('.qodef-variation-image');
                            if(variableProductsImages.length) {
                                variableProductsImages.each(function() {
                                    if($(this).attr('data-original-image') == originalSrc) {
                                        thumbImage.attr('src', $(this).attr('data-thumb-image'));
                                        thumbImage.attr('srcset', $(this).attr('data-image-srcset'));
                                        thumbImage.attr('sizes', $(this).attr('data-image-sizes'));
                                    }
                                });
                            }
                        }
                    }
                    sync1.trigger('owl.jumpTo', 0);
                    sync2.trigger('owl.goTo', 0);
                });
            }
        });

        sync2.owlCarousel({
            items : 3,
            pagination:false,
            itemsDesktop: false,
            itemsDesktopSmall : false,
            itemsTablet: false,
            itemsMobile : false,
            responsiveRefreshRate : 100,
            afterInit : function(el){
                el.find(".owl-item").eq(0).addClass("synced");
                thumbImage = sync2.find('.owl-item:first-child img');
                qodefInitImageHolderHeight();
            },
            afterUpdate: function() {
                qodefInitImageHolderHeight();
            }
        });


        sync2.on("click", ".owl-item", function(e){
            e.preventDefault();
            var number = $(this).data("owlItem");
            sync1.trigger("owl.goTo",number);
        });
    }

    function qodefSyncPosition(el){
        var current = this.currentItem;
        var sync2 = $(".qodef-single-product-images .qodef-single-product-thumbs");
        sync2
            .find(".owl-item")
            .removeClass("synced")
            .eq(current)
            .addClass("synced");
        if(sync2.data("owlCarousel") !== undefined){
            qodefCenter(current);
        }
    }

    function qodefCenter(number){
        var sync2 = $(".qodef-single-product-images .qodef-single-product-thumbs");
        var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
        var num = number;
        var found = false;
        for(var i in sync2visible){
            if(num === sync2visible[i]){
                found = true;
            }
        }

        if(found===false){
            if(num>sync2visible[sync2visible.length-1]){
                sync2.trigger("owl.goTo", num - sync2visible.length+2)
            }else{
                if(num - 1 === -1){
                    num = 0;
                }
                sync2.trigger("owl.goTo", num);
            }
        } else if(num === sync2visible[sync2visible.length-1]){
            sync2.trigger("owl.goTo", sync2visible[1])
        } else if(num === sync2visible[0]){
            sync2.trigger("owl.goTo", num-1)
        }

    }

    /* This is because both galleries are absolute positioned */
    function qodefInitImageHolderHeight() {

        var wooSinglePage = $('.qodef-woocommerce-single-page');

        if(wooSinglePage.length){

            wooSinglePage.waitForImages(function() {
                var heightSlider = $(".qodef-single-product-images .qodef-single-product-slider").outerHeight();
                var heightThumbs = $(".qodef-single-product-thumbs").outerHeight();
                $('.qodef-single-product-images').css({"height":heightSlider+heightThumbs+'px',"opacity":1});
            });
        }
    }

    /* Functions for single product gallery with thumbnails - end */



})(jQuery);