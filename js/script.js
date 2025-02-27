"use strict";


var $fwindow = $(window);
// portfolio menu controler
$fwindow.on("load", function() {

    // Animate loader off screen
    $(".loader_wrapper").fadeOut("5000");
    if ($('.grid').length > 0) {

        var $grid = $('.grid').isotope({
            // options
            itemSelector: '.grid-item',
            layoutMode: 'masonry',
            percentPosition: true
        });
    }


    // filter items on button click
    $('.filter-button-group').on('click', 'button', function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
            filter: filterValue
        });
    });

    $('.button-group').each(function(i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on('click', 'button', function() {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $(this).addClass('is-checked');
        });
    });
});

$(function() {


    // script for tab steps
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {

        var href = $(e.target).attr('href');
        var $curr = $(".process-model  a[href='" + href + "']").parent();

        $('.process-model li').removeClass();

        $curr.addClass("active");
        $curr.prevAll().addClass("visited");
    });
    // end  script for tab steps


    $('.carousel').carousel({
        interval: 5000
    });

    //script for page scroll to top and bottom
    $(document).on('click', '.page-scroll', function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
    //end script for page scroll to top and bottom

    // Content Slider
    $(".content-slider").owlCarousel({
        slideSpeed: 350,
        singleItem: true,
        autoHeight: true,
        navigation: true,
        navigationText: ["<i class='icon-chevron-left'></i>", "<i class='icon-chevron-right'></i>"]
    });

    //script for parallax
    function parallaxIt() {

        // create variables

        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        // on window scroll event
        $fwindow.on('scroll resize', function() {
            scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        });

        // for each of content parallax element
        $('[data-type="content"]').each(function(index, e) {
            var $contentObj = $(this);
            var fgOffset = parseInt($contentObj.offset().top);
            var yPos;
            var speed = ($contentObj.data('speed') || 1);

            $fwindow.on('scroll resize', function() {
                yPos = fgOffset - scrollTop / speed;

                $contentObj.css('top', yPos);
            });
        });

        // for each of background parallax element
        $('[data-type="background"]').each(function() {
            var $backgroundObj = $(this);
            var bgOffset = parseInt($backgroundObj.offset().top);
            var yPos;
            var coords;
            var speed = ($backgroundObj.data('speed') || 0);

            $fwindow.on('scroll resize', function() {
                yPos = -((scrollTop - bgOffset) / speed);
                coords = '50% ' + yPos + 'px';

                $backgroundObj.css({
                    backgroundPosition: coords
                });
            });
        });

        // triggers winodw scroll for refresh
        $fwindow.trigger('scroll');
    }

    parallaxIt();
    //end script for parallex

    //script for owl carousel 
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 13,
        responsiveClass: true,
        autoplay:true,
        autoplayTimeout:1000,
        autoplayHoverPause:true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3,
                nav: false
            },
            900: {
                items: 5,
                loop: true
            },
            1100: {
                items: 6,
                loop: true
            }
        }
    });
    //end script for owl carousel 

   //script for video modal 
    $('.video-popup').magnificPopup({
        items: {
            src: 'https://www.youtube.com/watch?v=uH0UQl5JC2c'
        },
        type: 'iframe',
        iframe: {
            markup: '<div class="mfp-iframe-scaler">' +
                '<div class="mfp-close"></div>' +
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                '</div>',
            patterns: {
                youtube: {
                    index: 'youtube.com/',
                    id: 'v=',
                    src: '//www.youtube.com/embed/%id%?autoplay=1'
                }
            },
            srcAction: 'iframe_src'
        }
    });
    $('.video-popup2').magnificPopup({
        items: {
            src: 'https://www.youtube.com/watch?v=Fz-6MdlPY1M'
        },
        type: 'iframe',
        iframe: {
            markup: '<div class="mfp-iframe-scaler">' +
                '<div class="mfp-close"></div>' +
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                '</div>',
            patterns: {
                youtube: {
                    index: 'youtube.com/',
                    id: 'v=',
                    src: '//www.youtube.com/embed/%id%?autoplay=1'
                }
            },
            srcAction: 'iframe_src'
        }
    });
    $('.video-popup3').magnificPopup({
        items: {
            src: 'https://www.youtube.com/watch?v=rrT6v5sOwJg'
        },
        type: 'iframe',
        iframe: {
            markup: '<div class="mfp-iframe-scaler">' +
                '<div class="mfp-close"></div>' +
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                '</div>',
            patterns: {
                youtube: {
                    index: 'youtube.com/',
                    id: 'v=',
                    src: '//www.youtube.com/embed/%id%?autoplay=1'
                }   
            },
            srcAction: 'iframe_src'
        }
    });
    //end script for video modal     

    //script for number counter
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
    //end script for number counter

    //script for full view port slider 
    $fwindow.on('resize', fullViewPort);
    fullViewPort();

    function fullViewPort() {
        if ($fwindow.width() < 992) {
            var height = $fwindow.height() - 100;
            $(".top-carousel .item, .top-carousel").height(height);
        } else {
            var height = $fwindow.height() - 154;
            $(".top-carousel .item, .top-carousel").height(height);
        }

    }
    //end script for full view port slider

    // protfolio modal's slider script
    $('#myCarousel').carousel({
        interval: 4000
    });

    var selectorIdx = 1;
    var numItems = 12;
    // handles the carousel thumbnails
    $('.carousel-selector').on('click', function() {
        selectorIdx = $(this).closest('li').index();
        $('#myCarousel').carousel(selectorIdx);
    });

    $('#myCarousel').on('slide.bs.carousel', function(e) {
        selectorIdx = $(e.relatedTarget).index();
        $(this)
            .find('.carousel-selector').removeClass('selected')
            .eq(selectorIdx).addClass('selected')
            .end()
            .find('.item').removeClass('selected')
            .eq(selectorIdx).addClass('active');
    });
    // end protfolio modal's slider script

    //script for box equal height
    var equalheight;
    equalheight = function(t) {
        var i, topPostion,
            currentDiv, n = 0,
            e = 0,
            o = new Array;
        $(t).each(function() {
            if (i = $(this), $(i).outerHeight("auto"), topPostion = i.position().top, e != topPostion) {
                for (currentDiv = 0; currentDiv < o.length; currentDiv++)
                    o[currentDiv].outerHeight(n);
                o.length = 0, e = topPostion, n = i.outerHeight(), o.push(i);
            } else
                o.push(i), n = n < i.outerHeight() ? i.outerHeight() : n;
            for (currentDiv = 0; currentDiv < o.length; currentDiv++)
                o[currentDiv].outerHeight(n);
        });
    }, $fwindow.on('load resize', function() {
        equalheight(".equalheight");
    });
    //end script for box equal height    


    var tpj = jQuery;
    var revapi1078;
    if (tpj("#rev_slider_1078_1").length > 0) {
        revapi1078 = tpj("#rev_slider_1078_1").show().revolution({
            delay: 9000,
            sliderType: "standard",
            sliderLayout: "fullscreen",
            responsiveLevels: [1600, 1240, 1024, 778],
            gridwidth: 1140,
            navigation: {
                arrows: {
                    style: "uranus",
                    enable: true

                }
            }
        });
    }



    /*Js for sending email and validation*/
    $('.email_form').on('submit', function(e) {
        e.preventDefault();
        var _self = $(this);
        var __selector = _self.closest('input,textarea');
        _self.closest('div').find('input,textarea').removeAttr('style');
        _self.find('.msg').remove();
        _self.closest('div').find('button[type="submit"]').attr('disabled', 'disabled');
        var data = $(this).serialize();
        $.ajax({
            url: 'scripts/email.php',
            type: "post",
            dataType: 'json',
            data: data,
            success: function(data) {
                _self.closest('div').find('button[type="submit"]').removeAttr('disabled');
                if (data.code == false) {
                    _self.closest('div').find('[name="' + data.field + '"]').css('border-bottom', 'solid 2px red');
                    _self.find('.customised-formgroup').last().after('<div class="msg"><p style="color:red;padding:0;font-size:13px;font-weight:bold;position:absolute">*' + data.err + '</p></div>');
                } else {
                    $('.msg').html('<p style="color:green;padding:0;font-size:13px;font-weight:bold;position:absolute">' + data.success + '</p>');
                    _self.find('.customised-formgroup').last().after('<div class="msg"><p style="color:green;padding:0;font-size:13px;font-weight:bold;position:absolute">' + data.success + '</p></div>');
                    _self.closest('div').find('input,textarea').val('');
                }
            }
        });
    });

/*Js for sending career email and validation*/
    $('.career_email_form').on('submit', function(e) {
        e.preventDefault();
        var _self = $(this);
        var __selector = _self.closest('input,textarea');
        _self.closest('div').find('input,textarea').removeAttr('style');
        _self.find('.msg').remove();
        _self.closest('div').find('button[type="submit"]').attr('disabled', 'disabled');
        var data = $(this).serialize();
        $.ajax({
            url: 'scripts/career-email.php',
            type: "post",
            dataType: 'json',
            data: data,
            success: function(data) {
                _self.closest('div').find('button[type="submit"]').removeAttr('disabled');
                if (data.code == false) {
                    _self.closest('div').find('[name="' + data.field + '"]').css('border-bottom', 'solid 2px red');
                    _self.find('.customised-formgroup').last().after('<div class="msg"><p style="color:red;padding:0;font-size:13px;font-weight:bold;position:absolute">*' + data.err + '</p></div>');
                } else {
                    $('.msg').html('<p style="color:green;padding:0;font-size:13px;font-weight:bold;position:absolute">' + data.success + '</p>');
                    _self.find('.customised-formgroup').last().after('<div class="msg"><p style="color:green;padding:0;font-size:13px;font-weight:bold;position:absolute">' + data.success + '</p></div>');
                    _self.closest('div').find('input,textarea').val('');
                }
            }
        });
    });

    
    

    //script for portfolio details modal tigger
    //portfolio modal
    $(".proDetModal1").on('click', function() {
        $("#portfolioDetModal1").modal('show');
    });
    $(".proDetModal2").on('click', function() {
        $("#portfolioDetModal2").modal('show');
    });
    $(".proDetModal3").on('click', function() {
        $("#portfolioDetModal3").modal('show');
    });
    $(".proDetModal4").on('click', function() {
        $("#portfolioDetModal4").modal('show');
    });
    $(".proDetModal5").on('click', function() {
        $("#portfolioDetModal5").modal('show');
    });
    $(".proDetModal6").on('click', function() {
        $("#portfolioDetModal6").modal('show');
    });
    $(".proDetModal7").on('click', function() {
        $("#portfolioDetModal7").modal('show');
    });
    $(".proDetModal8").on('click', function() {
        $("#portfolioDetModal8").modal('show');
    });
    $(".proDetModal9").on('click', function() {
        $("#portfolioDetModal9").modal('show');
    });
    $(".proDetModal10").on('click', function() {
        $("#portfolioDetModal10").modal('show');
    });
    $(".proDetModal11").on('click', function() {
        $("#portfolioDetModal11").modal('show');
    });
    $(".proDetModal112").on('click', function() {
        $("#portfolioDetModal12").modal('show');
    });
    $(".proDetModal113").on('click', function() {
        $("#portfolioDetModal13").modal('show');
    });
    $(".proDetModal14").on('click', function() {
        $("#portfolioDetModal14").modal('show');
    });
    $(".proDetModal15").on('click', function() {
        $("#portfolioDetModal15").modal('show');
    });



    //Featured Applicatiions Modal
    
    $(".FeaturedPayroll").on('click', function() {
        $("#FeaturedAppPayroll").modal('show');
    });
    $(".FeaturedInventory").on('click', function() {
        $("#FeaturedAppInventory").modal('show');
    });
    $(".FeaturedMobileApp").on('click', function() {
        $("#FeaturedAppMobile").modal('show');
    });
    $(".FeaturedLending").on('click', function() {
        $("#FeaturedAppLending").modal('show');
    });
    $(".FeaturedHRIS").on('click', function() {
        $("#FeaturedAppHRIS").modal('show');
    });
    $(".FeaturedGLS").on('click', function() {
        $("#FeaturedAppGLS").modal('show');
    });
    
    // Product and Services Modal
    $(".LapAndSerModal").on('click', function() {
        $("#PASLaptopDetModal").modal('show');
    });
    $(".StruCablingModal").on('click', function() {
        $("#PASCablingDetModal").modal('show');
    });
    $(".UPSModal").on('click', function() {
        $("#PASupsDetModal").modal('show');
    });
    $(".AccessControlsModal").on('click', function() {
        $("#PASaccesscontrolsDetModal").modal('show');
    });
    $(".NASModal").on('click', function() {
        $("#PASnasDetModal").modal('show');
    });
    $(".CCTVGPSModal").on('click', function() {
        $("#PAScctvgpsDetModal").modal('show');
    });
    $(".NetSecurityModal").on('click', function() {
        $("#PASnetsecurityDetModal").modal('show');
    });
    $(".NetSwitchesModal").on('click', function() {
        $("#PASnetswitchesDetModal").modal('show');
    });
    $(".WirelessConModal").on('click', function() {
        $("#PASwirelessConDetModal").modal('show');
    });
    $(".VoIPPhoneModal").on('click', function() {
        $("#PASvoipphoneDetModal").modal('show');
    });
    $(".AnalogPabxModal").on('click', function() {
        $("#PASanalogpabxDetModal").modal('show');
    });
    $(".VoIPServerModal").on('click', function() {
        $("#PASvoipserverDetModal").modal('show');
    });
    $(".MicrosoftModal").on('click', function() {
        $("#PASmicrosoftDetModal").modal('show');
    });
    

    

    // protfolio modal's slider script
    $('.myCarousel').carousel({
        interval: 4000
    });

    var selectorIdx = 1;
    var numItems = 12;
    // handles the carousel thumbnails
    $('.carousel-selector').on('click', function() {
        selectorIdx = $(this).closest('li').index();
        $('.myCarousel').carousel(selectorIdx);
    });

    $('.myCarousel').on('slide.bs.carousel', function(e) {
        selectorIdx = $(e.relatedTarget).index();
        $(this)
            .find('.carousel-selector').removeClass('selected')
            .eq(selectorIdx).addClass('selected')
            .end()
            .find('.item').removeClass('selected')
            .eq(selectorIdx).addClass('active');
    });
    // end protfolio modal's slider script   




});

$(function(){
    // vars for clients list carousel
    // http://stackoverflow.com/questions/6759494/jquery-function-definition-in-a-carousel-script
    var $clientcarousel = $('#clients-list');
    var clients = $clientcarousel.children().length;
    var clientwidth = (clients * 220); // 140px width for each client item 
    $clientcarousel.css('width',clientwidth);
    
    var rotating = true;
    var clientspeed = 0;
    var seeclients = setInterval(rotateClients, clientspeed);
    
    $(document).on({
    mouseenter: function(){
    rotating = false; // turn off rotation when hovering
    },
    mouseleave: function(){
    rotating = true;
    }
    }, '#clients');
    
    function rotateClients() {
    if(rotating != false) {
    var $first = $('#clients-list li:first');
    $first.animate({ 'margin-left': '-220px' }, 3000, "linear", function() {
    $first.remove().css({ 'margin-left': '0px' });
    $('#clients-list li:last').after($first);
    });
    }
    }
    });




// Script for Logo Carousel

    $(document).ready(function() {
 
        $("#owl-demo").owlCarousel({
       
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            items : 4,
            loop: true,    
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3]

        });
       
      });





      