( function( $ ) {
    
    // A $( document ).ready() block.
    $(window).load(function() {
        
        /*menu button*/
        $('.mobile-menu-button').click(function() {
          $('.main-navigation.mobile').slideToggle( "slow", function() {
            // Animation complete.
          });
        });

        /* my account login / register */
        $(".tabs-menu a").click(function(event) {
            event.preventDefault();
            $(this).parent().addClass("current");
            $(this).parent().siblings().removeClass("current");
            var tab = $(this).attr("href");
            $(".tab-content").not(tab).css("display", "none");
            $(tab).fadeIn();
        });

        /* label to placeholder */
         $('.single-product-main-content .single_variation').appendTo('.single-product-main-content .mspomelo-share-size-guide');

        /* search field slide */
        $('.search-form-slider-activator').click(function() {
          $( '.search-form-slider' ).fadeToggle();
        });

        /* amend product titles */
        var productMainTtitle = $('.single-product .product_title').text();
        if (productMainTtitle.indexOf('|') > -1) {
            productMainTtitle = productMainTtitle.substring(0, productMainTtitle.indexOf("|") - 1);
            $('.single-product .product_title').text(productMainTtitle);
        }

        $('.upsells h3, .shop-grid-title, .cross-sells h3').each(function() {
            var productUpsellTtitle = $(this).text();
            if (productUpsellTtitle.indexOf('|') > -1) {
                productUpsellTtitle = productUpsellTtitle.substring(0, productUpsellTtitle.indexOf("|") - 1);
                $(this).text(productUpsellTtitle);
            }
        });

        /* product description slide down */
        $( '.product-details-title' ).click(function() {
          $( '.product-details-text' ).slideToggle( 'fast');
          $( this ).toggleClass( 'opened' );
        });

        /* amend color dropdownlinks for product */
        $( 'select#pa_bra-sizes option:first-child' ).text('SIZE');
        $( 'select#pa_brief-sizes option:first-child' ).text('SIZE');
        $( 'select#pa_styles option:first-child' ).text('STYLE');
        $( 'select#pa_colors option:first-child' ).text('COLOR');

        $( '.product-color-select select option' ).each(function() {
            var str = $(this).text();
            str = str.substring(str.indexOf("|") + 2);
            $(this).text(str);
        });

        /*product reviews*/
        $( '.read-reviews-button, .woocommerce-review-link' ).click(function() {
          $( '.woocommerce-reviews' ).slideToggle(500);
        });

        /*scroll to anchor link*/
        $('a[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                $('html, body').animate({
                  scrollTop: target.offset().top
                }, 300);
                return false;
              }
            }
          });
        

         /*product featured section carousel*/
        if( $('.product-features').length )
        {
            $('.product-features').carouFredSel({
                circular: true,
                infinite: true,
                auto: false,
                responsive: true,
                width: 'variable',
                height: 'variable',
                prev: '.prev',
                next: '.next',
                items: {
                    height: 'variable'
                },
                scroll: {
                    items: 1,
                    duration: 500,
                    timeoutDuration: 3000,
                    fx: 'crossfade',
                    onBefore: function( data ) {
                        setCurrentSlideNumber( $(this), data.items.visible );
                    }
                },
                onCreate: function( data ) {
                    setCurrentSlideNumber( $(this), data.items );
                    var n = $( '.product-features-item' ).length;
                    $('.slider-counter .all-slides').text(n);
                }
            });
        }

        /*workshops pass parameter to the form*/
        $('.workshop-popup-activator').click(function() {
            $('#wpcf7-f598-o2 .text-615 input').val($(this).attr('data'));
        });
    });

    /*item counter on product featured carousel*/
    function setCurrentSlideNumber( $c ) {  
        var current = $c.triggerHandler( 'currentPosition' );
        $('.slider-counter .current-slide').text( current+1 );
    }

} )( jQuery );
