/*jshint forin:true, noarg:true, noempty:true, eqeqeq:true, bitwise:true, strict:true, undef:true, unused:true, curly:true, browser:true, jquery:true, indent:4, maxerr:50 */
/* global _, Tour */

//  ========== 
//  = Custom JS and jQuery = 
//  ========== 
// variables
var WebMarketVars = {
    currencyBefore: true, // true foe the currencies like USD, where the symbol comes before the number ($123.45). False for the symbol after the number (123,45 €) 
    currencySymbol: "$",
    priceRange: [ 0, 1750 ], // minimum and maximum range for the price range selector
    priceStep: 50
};

jQuery(document).ready(function($) {
    "use strict";
    
    /**
     * Set the ie10 class to html tag for IE10
     */
    if (/*@cc_on!@*/false) {  
        document.documentElement.className+=' ie10';  
    }  
    
    /**
     * Below the first responsive break we assume touch behaviour
     */
    var isTouch = function() {
        return $(window).width() < 980 ? true : false;
    };
    var determineScreenClass = function() {
        $("html").toggleClass("large-screen", !isTouch());
    };



    //  ========== 
    //  = Smooth scroll to the top of the page & scroll menu = 
    //  ==========
    $("#toTheTop").click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 2e3, "easeInOutQuart");
        return false;
    });
    $("#spyMenu a").click(function() {
        var $this = $(this);
        $("html, body").animate({
            scrollTop: $($this.attr("href")).offset().top - 70
        }, 700, "easeInOutQuart");
        return false;
    });
    //  ========== 
    //  = Carousel = 
    //  ==========
    $(window).load(function() {
        var configuration = {
            debug: false,
            auto: {
                play: false
            },
            width: "100%",
            height: "variable",
            items: {
                height: "variable"
            },
            prev: {},
            next: {},
            pagination: {},
            scroll: {
                duration: 1e3,
                items: 1
            },
            transition: true
        };
        $(".carouFredSel").each(function() {
            var $this = $(this);
            // prev and next buttons
            configuration.prev.button = $("#" + $this.data("nav") + "Left");
            configuration.next.button = $("#" + $this.data("nav") + "Right");
            // responsive param
            if ($this.data("responsive")) {
                configuration.responsive = true;
            } else {
                configuration.responsive = false;
            }
            // autoplay param
            if (true === $this.data("autoplay")) {
                configuration.auto.play = true;
            }
            // onCreate the slides should not be wider than the container, no matter what
            configuration.onCreate = function() {
                $this.find(".slide").css({
                    width: $this.parent().width()
                });
            };
            // RUN THE CAROUSEL
            $this.carouFredSel(configuration);
        });
    });



    //  ========== 
    //  = Revolution Slider = 
    //  ========== 
    if (jQuery().revolution) {
        var $mainSlider = $(".fullwidthbanner").revolution({
            delay: 1e4,
            startheight: 377,
            startwidth: 1400,
            navigationType: "bullet",
            navigationStyle: "round",
            navigationVAlign: "bottom",
            touchenabled: "on",
            onHoverStop: "on",
            navigationArrows: "none",
            soloArrowLeftHalign: "left",
            soloArrowLeftValign: "center",
            soloArrowRightHalign: "right",
            soloArrowRightValign: "center",
            navigationVOffset: 60,
            navOffsetHorizontal: 0,
            navOffsetVertical: 20,
            // no captions for mobile devices
            hideAllCaptionAtLilmit: 481,
            hideSliderAtLimit: 300,
            stopAtSlide: -1,
            stopAfterLoops: -1,
            shadow: 0,
            fullWidth: "on"
        });
        
        $('#sliderRevLeft').on('click', function() {
            $mainSlider.revprev();
            return false;
        });
        $('#sliderRevRight').on('click', function() {
            $mainSlider.revnext();
            return false;
        });
        
    }

    //  ==========
    //  = Accordion group toggle classes =
    //  ==========
    $(".accordion-group .accordion-toggle").click(function() {
        var $accordionGroup = $(this).parent().parent();
        if ($accordionGroup.hasClass("active")) {
            $accordionGroup.removeClass("active");
        } else {
            $accordionGroup.addClass("active").siblings().removeClass("active");
        }
    });

    //  ========== 
    //  = Nav Search = 
    //  ========== 
    $(document).on("focus", ".large-screen #navSearchInput", function() {
        $(this).parent().parent().addClass("search-mode");
        repositionLine();
    });
    $(document).on("blur", ".large-screen #navSearchInput", function() {
        $(this).parent().parent().removeClass("search-mode");
        repositionLine();
    });
    var repositionLine = function() {
        setTimeout(function() {
            $("#mainNavigation > li.active").trigger("mouseover");
        }, 200);
    };

    $(function(){
    $(".fancybox")
        .attr('rel', 'gallery')
        .fancybox({
            beforeShow: function () {
                /* Disable right click */
                $.fancybox.wrap.bind("contextmenu", function (e) {
                        return false; 
                });
            }
        });
    });//]]>  


    //  ========== 
    //  = Scroll inspector = 
    //  ========== 
    var stickyNavbar = function() {
        if (isTouch()) {
            $(window).off("scroll.onlyDesktop");
        } else {
            var $headerHeight = $("#header").height(), $navbarHeight = $("#stickyNavbar").height();
            $(window).on("scroll.onlyDesktop", function() {
                var scrollX = $(window).scrollTop();
                if (scrollX > $headerHeight) {
                    $("#stickyNavbar").removeClass("navbar-static-top").addClass("navbar-fixed-top");
                    $(".large-screen #header").css({
                        marginBottom: $navbarHeight
                    });
                } else {
                    $("#stickyNavbar").removeClass("navbar-fixed-top").addClass("navbar-static-top");
                    $(".large-screen #header").css({
                        marginBottom: 0
                    });
                }
            });
        }
    };



    //  ========== 
    //  = Thumbnail selector = 
    //  ========== 
    $(".product-preview .thumbs a").click(function(ev) {
        ev.preventDefault();
        $($(this).attr("href")).attr("src", $(this).find("img").attr("src"));
        $(this).parent().addClass("active").siblings(".active").removeClass("active");
    });



    //  ========== 
    //  = Forms = 
    //  ==========
    $(".numbered > .clickable").click(function(ev) {
        ev.preventDefault();
        var number = parseInt($(this).siblings('input[type="text"]').val(), 10);
        if (isNaN(number)) {
            number = 1;
        }
        if ($(this).hasClass("add-one")) {
            $(this).siblings('input[type="text"]').val(number + 1);
        } else {
            number = number < 2 ? 2 : number;
            $(this).siblings('input[type="text"]').val(number - 1);
        }
    });



    //  ========== 
    //  = Isotope = 
    //  ========== 
    (function() {
 
        // jQuery UI slider
        var prepareCurrency = function(value) {
            return WebMarketVars.currencyBefore ? WebMarketVars.currencySymbol + value : value + WebMarketVars.currencySymbol;
        };
        var $slider = $(".jqueryui-slider-container > div");
        $slider.slider({
            range: true,
            min: WebMarketVars.priceRange[0],
            max: WebMarketVars.priceRange[1],
            values: WebMarketVars.priceRange,
            step: WebMarketVars.priceStep,
            slide: function(ev, ui) {
                $(this).parent().siblings(".min-val").val(prepareCurrency(ui.values[0]));
                $(this).parent().siblings(".max-val").val(prepareCurrency(ui.values[1]));
            },
            change: function() {
                updateIsotopeFiltering();
            },
            create: function() {
                var $sliderParent = $(this).parents(".accordion-body");
                $sliderParent.find(".min-val").val(prepareCurrency($(this).slider("values", 0)));
                $sliderParent.find(".max-val").val(prepareCurrency($(this).slider("values", 1)));
            }
        });
        
        //  ========== 
        //  = Sorting = 
        //  ========== 
        $("#isotopeSorting").change(function() {
            var parameters = jQuery.parseJSON($(this).val());
            parameters.sortAscending = "true" === parameters.sortAscending ? true : false;
            $container.isotope(parameters);
        });
        $("#isotopeSorting").trigger("change");
    })();



    //  ========== 
    //  = Tour = 
    //  ========== 
    (function() {
        var tour = new Tour({
            useLocalStorage: true,
            backdrop: false
        });
        tour.addSteps([ {
            element: "#tourStep1",
            title: "Filtering",
            content: "Filtering the products in Webmarket is fun!"
        }, {
            element: "#tourStep2",
            title: "Categories",
            content: "Click to multiple categories and the articles on the right will be shown or hidden automatically."
        }, {
            element: "#filterPrices",
            title: "Price Range Filter",
            content: "Select the price range, the products on the left will be filtered automatically, without page refresh!"
        }, {
            element: "#tourStep3",
            title: "Open Additional Filters",
            content: "Just open the panel with the click on the title and you can start filtering the products even further... <br />The same way you can turn off the filter, just close the pane.",
            placement: "top"
        }, {
            element: "#tourStep4",
            title: "The Best Part: Sorting!",
            content: "Never refresh a page again when you decide to order the items below. Just select ordering from the dropdown, the products below will magically fit into desired order",
            placement: "bottom"
        } ]);
        tour.start();
    })();



    //  ========== 
    //  = Google Maps API with GoMap jQuery plugin = 
    //  ========== 
    $(".add-googlemap").each(function() {
        var $this = $(this);
        $this.css("height", typeof $this.data("height") === "undefined" ? 200 : parseInt($this.data("height"), 10));
        if (jQuery.goMap) {
            $this.goMap({
                markers: [ {
                    address: $this.data("addr"),
                    title: "undefined" === typeof $this.data("title") ? false : $this.data("title")
                } ],
                scrollwheel: false,
                zoom: "undefined" === typeof $this.data("zoom") ? 13 : parseInt($this.data("zoom"), 10),
                maptype: "undefined" === typeof $this.data("type") ? "ROADMAP" : $this.data("type").toUpperCase()
            });
        }
    });



    //  ========== 
    //  = Cart Container Effects = 
    //  ========== 
    $("#cartContainer").hover(function() {
        $(this).children(".cart").addClass("opened");
        $(this).children(".open-panel").stop(true, true).slideDown(150);
    }, function() {
        var $this = $(this);
        setTimeout(function() {
            $this.children(".cart").removeClass("opened");
        }, 120);
        $(this).children(".open-panel").stop(true, true).slideUp(150);
    });
    // delete item from the popover cart
    $(".item-in-cart .icon-remove-sign").click(function() {
        $(this).parents(".item-in-cart").animate({
            opacity: 0
        }, "swing", function() {
            $(this).slideUp();
        });
        return false;
    });



    //  ========== 
    //  = Checkout Process Effects = 
    //  ========== 
    // delete the item from review table
    $(".table-items .icon-remove-sign").click(function() {
        $(this).parents("tr").animate({
            opacity: 0
        }, "swing", function() {
            if($(this).remove());
            {
             $.ajax({
               type: "POST",
               url: "/cart/delete",
               data: ({index:$(this).attr('data-index')}),
               success: function(msg){
                if(msg == '0')
                {   
                    window.location = "/cart/"
                }
               }
             });
            }
        });
        return false;
    });

    $(".btn-cart").click(function(){ 
        var btn = this;
        if ($('#productQuanity').val()){
           var quantity = $('#productQuanity').val();
        } else {
           var quantity = '1';
        }
        var id = $(btn).attr('data-product-id');
        var color_id =  $(btn).attr('data-color-id');
        $("#cartContainer").removeClass('dn');
        $("#cartContainer").fadeOut("slow").fadeIn("slow").fadeOut("slow").fadeIn("slow");
        $.ajax({
            type: "POST",
            url: "/cart/addtocart/",
            data: {id: id, color_id: color_id, quantity:quantity},
            success: function(data){
                data = JSON.parse(data);
                $(btn).replaceWith('<a href="/cart/" class="'+$(btn).attr('class')+'"><i class="icon-shopping-cart"></i> Оформить</a>');
                $("#cart_qty").html(data['count']);
                $(".cart_price").html(data['price']);
            }
        });
        return false;
    });  

    $(".add-tooltip").tooltip({
        title: $(this).attr("data-title"),
        placement: "right",
        trigger: "manual"
    }).tooltip("show");

    //  ========== 
    //  = Functions which has to be reinitiated when the window size is changed = 
    //  ==========
    var triggeredOnResize = function() {
        if ($("html").hasClass("lt-ie9")) {
            // do never this for IE8
            return;
        }
        // rebuild carousels
        $(".carouFredSel").each(function() {
            var $this = $(this);
            $this.trigger("configuration", [ "debug", false, true ]);
        });
        //  = Embedded video iframes = 
        $('iframe[src*="vimeo.com"], iframe[src*="youtube.com"]').each(function() {
            var $this = $(this);
            $this.css("height", parseInt($this.width() * $this.attr("height") / $this.attr("width"), 10));
        });
        // sticky navbar
        stickyNavbar();
        
        
        //  ========== 
        //  = Magic Line = 
        //  ========== 
        /**
         * @see http://css-tricks.com/jquery-magicline-navigation/
         */
        (function() {
            var $el, leftPos, newWidth, $mainNav = $("#mainNavigation");
            $mainNav.prepend('<li id="magic-line"></li>');
            var $magicLine = $("#magic-line");
            if ($(".large-screen #mainNavigation > .active").length > 0) {
                $magicLine.width($(".large-screen #mainNavigation > .active").width()).css("left", $("#mainNavigation > .active").position().left).data("origLeft", $magicLine.position().left).data("origWidth", $magicLine.width());
                $(document).on({
                    mouseenter: function() {
                        $el = $(this);
                        leftPos = $el.position().left;
                        newWidth = $el.width();
                        $magicLine.stop().animate({
                            left: leftPos,
                            width: newWidth
                        });
                    },
                    mouseleave: function() {
                        $magicLine.stop().animate({
                            left: $magicLine.data("origLeft"),
                            width: $magicLine.data("origWidth")
                        });
                    }
                }, ".large-screen #mainNavigation > li");
            }
        })();
        // width of carousel slides
        $(".carouFredSel").each(function() {
            var $this = $(this);
            $this.find(".slide").css({
                width: $this.parent().width()
            });
            $this.trigger("configuration", [ "debug", false, true ]);
        });
        // position of the bullets in the slider revolution
        if ($(window).width() < 768) {
            $(".fullwidthbanner-container .tp-bullets").css({
                bottom: 10
            });
        }
        
        
        var recalculateFromBottom = function() {
            if ( !isTouch() ) {
                $('.large-screen #spyMenu').affix({
                    offset : {
                        top: $('.large-screen #spyMenu').offset().top - 70,
                        bottom: function() {
                            return $('footer').outerHeight(true) + 30;
                        }
                    }
                });
            }
            setTimeout(recalculateFromBottom, 2000); // recalculate every 2 seconds
        };
        if($('#spyMenu').length > 0) {
            recalculateFromBottom();
        }
        
    };
    var fromLastResize;
    // counter in miliseconds
    $(window).resize(function() {
        determineScreenClass();
        clearTimeout(fromLastResize);
        fromLastResize = setTimeout(function() {
            triggeredOnResize();
        }, 250);
    });
    
    $(window).on('scroll', function() {
        if( $('#spyMenu').hasClass('affix-bottom') ) {
            $('#spyMenu').css({
                bottom: $('footer').outerHeight(true) + 30
            });
        } else {
            $('#spyMenu').removeAttr('style');
        }
    });
    
    //  ========== 
    //  = Last but not the least - trigger the page scroll and resize = 
    //  ========== 
    $(window).trigger("scroll").trigger("resize");
});