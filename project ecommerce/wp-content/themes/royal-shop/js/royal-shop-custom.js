/**************/
// RoyalShopLib
/**************/
(function ($) {
    var RoyalShopLib = {
        init: function (){
            this.bindEvents();
        },
        bindEvents: function (){
             var $this = this;
             $this.sticky_header();
             $this.sticky_sidebar_secondary_hide_toggle();
             $this.sideabr_toggle();
             $this.sticky_product_search();
             $this.pre_loader();
             $this.CatMenu();
             $this.DefaultMenu();
             $this.MainMenu();
             $this.StickMenu();
             $this.AboveMenu();
             $this.MobileMenuFunction();
            if(royal_shop.royal_shop_move_to_top_optn){
                  $this.MoveToTop();
                }
             if($('.header__cat__item.dropdown').length!==0){
             $this.cat_toggle();
             }
             $this.Searchbox();
             $this.mobile_menu_with_woocat();
        },
        sticky_sidebar_hide_toggle: function () {
               if($('#sidebar-primary.royalshop-sticky-sidebar').length!==0){
                      var lastScrollTop = 0;
                      $(window).on('scroll', function() {
                          st = $(this).scrollTop();
                          if(st < lastScrollTop) {

                             $('.product-cat-list').hide();

                          }
                          lastScrollTop = st;
                      });
            }
      },
      sticky_sidebar_secondary_hide_toggle: function () {
               if($('#sidebar-primary.royalshop-sticky-sidebar').length!==0){
                      var lastScrollTop = 0;
                      $(window).on('scroll', function() {
                          st = $(this).scrollTop();
                          lastScrollTop = st;
                      });
            }
      },
        sideabr_toggle: function () {
                    $(document).ready(function() {
                          if ($(window).width() <= 990) { 
                          $('.sidebar-content-area .widget-title').click(function() {
                          $(this).next().slideToggle();
                          $(this).toggleClass("open");
                          });
                         
                          }     
                });
                         
        },
         sticky_header: function () {
                    if(royal_shop.royal_shop_sticky_header_effect=='scrldwmn'){
                    var position = jQuery(window).scrollTop(); 
                    var $headerBar = jQuery('header').height();
                    // should start at 0
                    jQuery(window).scroll(function() {
                        var scroll = jQuery(window).scrollTop();
                        if(scroll > position || scroll < $headerBar) {
                        jQuery(".sticky-header").removeClass("stick");
                        $(".search-wrapper").removeClass("open");
                        }else{
                        jQuery(".sticky-header").addClass("stick");
                        }
                        position = scroll;
                    });
                  }else{
                      jQuery(document).on("scroll", function(){
                      var $headerBar = jQuery('header').height();
                        if(jQuery(document).scrollTop() > $headerBar){
                            jQuery(".sticky-header").addClass("stick");
                          }else{
                            $(".search-wrapper").removeClass("open");
                            jQuery(".sticky-header").removeClass("stick");
                        } 
                       });
                  }
        },
        sticky_product_search: function () {
 
                  $('.prd-search').on('click', function (e) {
                     e.preventDefault();
                    $(".search-wrapper").addClass("open");
                  });
                  $('.search-close-btn').on('click', function (e) {
                     e.preventDefault();
                    $(".search-wrapper").removeClass("open");
                  });   
            
        },
        product_slide_margin_padding : function () {
            $(document).ready(function(){ 
              $(".wzta-product").hover(function() { 
                $('.wzta-slide .owl-stage-outer').css("margin", "-6px -6px -100px"); 
                $('.wzta-slide .owl-stage-outer').css("padding", "6px 6px 100px");
                $('.wzta-slide .owl-nav').css("top", "-52px");
                $('.product-slide-widget .wzta-slide .owl-nav').css("top", "125px");
              }, function() { 
                $('.wzta-slide .owl-stage-outer').css("margin", "0"); 
                $('.wzta-slide .owl-stage-outer').css("padding", "0"); 
                $('.wzta-slide .owl-nav').css("top", "-58px");
                $('.product-slide-widget .wzta-slide .owl-nav').css("top", "119px");
             }); 
             });

          },

          cat_toggle : function () {
                    $('.header__cat__item.dropdown').on('click', function (e) {
                    e.preventDefault();
                    $(this).toggleClass('open');
                    });

          },
          pre_loader : function () {
                               if(!$('body').hasClass('elementor-editor-active')){
                                $(window).on('load', function(){
                                setTimeout(removeLoader); //wait for page load PLUS two seconds.
                                });
                                function removeLoader(){
                                    $( ".royal_shop_overlayloader" ).fadeOut(700, function(){
                                      // fadeOut complete. Remove the loading div
                                   $(".royal-shop-pre-loader img" ).hide(); //makes page more lightweight
                                   if ($(".royal-shop-lds-ripple" ).length > 0) {
                                    $(".royal-shop-lds-ripple" ).hide();
                                   }
                                    });  
                                  }
                                }

          },
        
        jssor_slider1_init : function () {
           if(royal_shop.royal_shop_sidebar_front_option =='no-sidebar'){
             var widthslide = parseInt('1350');
           }else if(royal_shop.royal_shop_sidebar_front_option =='disable-left-sidebar' || royal_shop.royal_shop_sidebar_front_option =='disable-right-sidebar'){
             var widthslide = parseInt('1000');
           }else{
             var widthslide = parseInt('930');
           }
               
            var options = {
                $AutoPlay: royal_shop.royal_shop_top_slider_optn,                                    //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $Idle: parseInt(royal_shop.royal_shop_top_slider_speed),                         //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: 1,                     //[Optional] Steps to go for each navigation request by pressing arrow key, default value is 1.
                $SlideDuration: 1000,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide, default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0,                           //[Optional] Space between each slide in pixels, default value is 0
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $Rows: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX:5,                                  //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY:5,                                  //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation:1                                //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                },

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                },

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $ActionMode: 0,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $NoDrag: true,                             //[Optional] Disable drag or not, default value is false
                    $Orientation: 2                                 //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                }
            };

            var jssor_slider2 = new $JssorSlider$('wzta-single-slider', options);
            /*#region responsive code begin*/
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var parentWidth = jssor_slider2.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider2.$ScaleWidth(Math.min(parentWidth, widthslide));
                else
                    $Jssor$.$Delay(ScaleSlider, 30);
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        },
        
        CatMenu : function (){
                 // category toggle
                $(".cat-toggle").click(function(){
                              $(".product-cat-list").slideToggle();
                              $(".toggle-icon", this).toggleClass("icon-circle-arrow-down");
                             });
                             $(".product-cat-list").WztaCatMenu({
                                 resizeWidth:'', // Set the same in Media query       
                                 animationSpeed:'fast', //slow, medium, fast
                                 accoridonExpAll:true//Expands all the accordion menu on click
                             });
                             $("#mobile-nav-tab-category .mobile").WztaCatMenu({
                                 resizeWidth:'1024', // Set the same in Media query       
                                 animationSpeed:'fast', //slow, medium, fast
                                 accoridonExpAll:true//Expands all the accordion menu on click
                             });
        },
        DefaultMenu: function(){
                 $("#menu-all-pages.royal-shop-menu").royalShopResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
             });
                  $(".menu ul.royal-shop-menu").royalShopResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
             });
                 $("#mobile-nav-tab-menu #menu-all-pages.royal-shop-menu").royalShopResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
             });
                  $("#mobile-nav-tab-menu .menu ul.royal-shop-menu").royalShopResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
             });
        },
        MainMenu : function(){
                $("#royal-shop-menu").royalShopResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
            });
                $("#mobile-nav-tab-menu #royal-shop-menu").royalShopResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
            });
        },
        StickMenu : function(){
                $("#royal-shop-stick-menu").royalShopResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
            });
        },
        AboveMenu : function(){
                $("header #open-above-menu").royalShopResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
             });   
              $("#mobile-nav-tab-menu #open-above-menu").royalShopResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
             });     
        
        },
       
        MobileMenuFunction : function(){
                 // close-button-active
                    
                        $('body').find('.sider.mobile-nav-bar').prepend('<div class="menu-close"><a href="#" class="menu-close-btn"></a></div>');
                        $('.menu-close-btn').removeAttr("href");
                        //Menu close
                        $('.menu-close-btn,.royal-shop-menu li a span.royal-shop-menu-link').click(function(){
                        $('body').removeClass('mobile-menu-active');
                        $('body').removeClass('sticky-mobile-menu-active');
                        });
                         $('.menu-close-btn,.royal-shop-menu li a span.royal-shop-menu-link').keypress(function(){
                        $('body').removeClass('mobile-menu-active');
                        $('body').removeClass('sticky-mobile-menu-active');
                        });
                          // Esc key close menu
                      document.addEventListener( 'keydown', function( event ) {
                      if ( event.keyCode === 27 ) {
                        event.preventDefault();
                        document.querySelectorAll( '.mobile-menu-active' ).forEach( function( element ) {
                          jQuery('body').removeClass('mobile-menu-active');
                        }.bind( this ) );
                      
                      }
                    }.bind( this ) );
                    //ToggleBtn above Click
                    $('#menu-btn-abv').click(function (e){
                       e.preventDefault();
                       $('body').addClass('mobile-above-menu-active');
                       $('#open-above-menu').removeClass('hide-menu'); 
                       $('.sider.above').removeClass('royal-shop-menu-hide');
                       $('.sider.main').addClass('royal-shop-menu-hide');
                       royalshopmenu.modalMenu.init(); 
                    });
                    //ToggleBtn main menu Click
                    $('#menu-btn,#mob-menu-btn').click(function (e){
                       e.preventDefault();
                       $('body').addClass('mobile-menu-active');
                       $('#royal-shop-menu').removeClass('hide-menu');
                       $('.sider.above').addClass('royal-shop-menu-hide');  
                       $('.sider.main').removeClass('royal-shop-menu-hide');   
                       royalshopmenu.modalMenu.init(); 
                    });
                     $('#menu-btn,#mob-menu-btn').keypress(function (e){
                       e.preventDefault();
                       $('body').addClass('mobile-menu-active');
                       $('#royal-shop-menu').removeClass('hide-menu');
                       $('.sider.above').addClass('royal-shop-menu-hide');  
                       $('.sider.main').removeClass('royal-shop-menu-hide');    
                       royalshopmenu.modalMenu.init();
                    });
                    //sticky
                    $('#menu-btn-stk').click(function (e){
                       e.preventDefault();
                       $('body').addClass('sticky-mobile-menu-active');
                       $('.sider.main').addClass('royal-shop-menu-hide');
                       royalshopmenu.modalMenu.init(); 
                      });
                    // default page
                    $('#menu-btn,#mob-menu-btn').click(function (e){
                       e.preventDefault();
                       $('body').addClass('mobile-menu-active');
                       $('#menu-all-pages').removeClass('hide-menu');  
                       royalshopmenu.modalMenu.init();   
                    });
            },
            
        Top2Slider:function(){
                      var owl = $('.wzta-top2-slide');
                           owl.owlCarousel({
                             items:1,
                             nav: true,
                             navText: ["<i class='brand-nav fa fa-angle-left'></i>",
                             "<i class='brand-nav fa fa-angle-right'></i>"],
                             loop:royal_shop.royal_shop_top_slider_optn,
                             dots: false,
                             smartSpeed:500,
                             autoHeight: false,
                             margin:0,
                             autoplay:royal_shop.royal_shop_top_slider_optn,
                             autoplayTimeout: parseInt(royal_shop.royal_shop_top_slider_speed),
                 });
                         // add animate.css class(es) to the elements to be animated
                        function setAnimation ( _elem, _InOut ) {
                          // Store all animationend event name in a string.
                          // cf animate.css documentation
                          var animationEndEvent = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

                          _elem.each ( function () {
                            var $elem = $(this);
                            var $animationType = 'animated ' + $elem.data( 'animation-' + _InOut );

                            $elem.addClass($animationType).one(animationEndEvent, function () {
                              $elem.removeClass($animationType); // remove animate.css Class at the end of the animations
                            });
                          });
                        }

                      // Fired before current slide change
                        owl.on('change.owl.carousel', function(event) {
                            var $currentItem = $('.owl-item', owl).eq(event.item.index);
                            var $elemsToanim = $currentItem.find("[data-animation-out]");
                            setAnimation ($elemsToanim, 'out');
                        });

                      // Fired after current slide has been changed
                        var round = 0;
                        owl.on('changed.owl.carousel', function(event) {

                            var $currentItem = $('.owl-item', owl).eq(event.item.index);
                            var $elemsToanim = $currentItem.find("[data-animation-in]");
                          
                            setAnimation ($elemsToanim, 'in');
                        })
                        
                        owl.on('translated.owl.carousel', function(event) {
                          //console.log (event.item.index, event.page.count);
                          
                            if (event.item.index == (event.page.count - 1))  {
                              if (round < 1) {
                                round++
                               // console.log (round);
                              } else {
                                owl.trigger('stop.owl.autoplay');
                                var owlData = owl.data('owl.carousel');
                                owlData.settings.autoplay = false; //don't know if both are necessary
                                owlData.options.autoplay = false;
                                owl.trigger('refresh.owl.carousel');
                              }
                            }
                        });
                          
        },

            MoveToTop:function(){
                      /**************************************************/
                      // Show-hide Scroll to top & move-to-top arrow
                      /**************************************************/
                        jQuery("body").prepend("<a id='move-to-top' class='animate' href='#'><i class='fa fa-angle-up'></i></a>"); 
                        var scrollDes = 'html,body';  
                        /*Opera does a strange thing if we use 'html' and 'body' together so my solution is to do the UA sniffing thing*/
                        if(navigator.userAgent.match(/opera/i)){
                          scrollDes = 'html';
                        }
                        //show ,hide
                        jQuery(window).scroll(function (){
                          if(jQuery(this).scrollTop() > 160){
                            jQuery('#move-to-top').addClass('filling').removeClass('hiding');
                          }else{
                            jQuery('#move-to-top').removeClass('filling').addClass('hiding');
                          }
                        });
                        jQuery('#move-to-top').click(function(){
                            jQuery("html, body").animate({ scrollTop: 0 }, 600);
                            return false;
                        });
                     
                },

               MobilenavBar:function(){
                 //show ,hide
                        jQuery(window).scroll(function (){
                          if(jQuery(this).scrollTop() > 160){
                            jQuery('#royal-shop-mobile-bar').addClass('active').removeClass('hiding');
                             if(jQuery(window).scrollTop() + jQuery(window).height() == jQuery(document).height()) {
                                  jQuery('#royal-shop-mobile-bar').removeClass('active');
                                }
                          }else{
                            jQuery('#royal-shop-mobile-bar').removeClass('active').addClass('hiding');
                          }

                        });
                   },
          Searchbox : function(){
       jQuery(".wzta-search").on('click keypress',function(event){
          jQuery(".wzta-search-wrapper").fadeIn();
          jQuery("#search-text").focus();
          event.preventDefault();
        }); 
        
        jQuery(".wzta-search-close").on('click keypress',function(){
          jQuery(".wzta-search-wrapper").fadeOut();
          jQuery(".wzta-search").focus();
        }); 

      jQuery('.wzta-search-close').on('keydown', function(e) {
        // "last" focus guard got focus: set focus to the first field
        if (! e.shiftKey && e.keyCode === 9) {
          e.preventDefault();
        jQuery('#search-text').focus();
      }
      });
      
    jQuery('#search-text').on('keydown', function(e) {
      // "first" focus guard got focus: set focus to the last field
      if ( e.shiftKey && e.keyCode === 9) {
        e.preventDefault();
      jQuery('.wzta-search-close').focus();
    }
    });

        
        },    
        mobile_menu_with_woocat: function () {
                    $(document).ready(function() {
                        $('.mobile-nav-tabs li a').click(function(){
  
                         $('.mobile-tab-wrap .panel').hide();
                         $('.mobile-nav-tabs li a.active').removeClass('active');
                         $(this).addClass('active');
                         
                         var panel = $(this).attr('href');
                         $(panel).fadeIn(1000);
                         
                         return false;  // prevents link action
                        
                          });  // end click 

                         $('.mobile-nav-tabs li:first a').click();
                            
                });
                         
        },    
    }
/* -----------------------------------------------------------------------------------------------
  Modal Menu
--------------------------------------------------------------------------------------------------- */
var royalshopmenu = royalshopmenu || {};
royalshopmenu.modalMenu = {
  init: function() {
   
    this.keepFocusInModal();
  },
    keepFocusInModal: function(){
    var _doc = document;
    _doc.addEventListener( 'keydown', function( event ){
      var toggleTarget, modal, selectors, elements, menuType, bottomMenu, activeEl, lastEl, firstEl, tabKey, shiftKey,
        toggleTarget = '.mobile-nav-bar.sider';
        if(jQuery('.mobile-menu-active').length!=''){   
        selectors = 'a,.arrow';
        modal = _doc.querySelector( toggleTarget );
        elements = modal.querySelectorAll( selectors );
        elements = Array.prototype.slice.call( elements );
        if ( '.mobile-nav-bar.sider' === toggleTarget ){
          menuType = window.matchMedia( '(min-width: 1024px)' ).matches;
          menuType = menuType ? '.expanded-menu' : '.mobile-nav-tab-menu .royal-shop-menu';
          elements = elements.filter( function( element ) {
            return null !== element.closest( menuType ) && null !== element.offsetParent;
          } );
          elements.unshift( _doc.querySelector( '.mobile-nav-bar .menu-close-btn' ) );
           $('.mobile-nav-tab-menu .royal-shop-menu a,.mobile-nav-bar .menu-close-btn,.mobile-nav-bar .arrow').attr('tabindex',0); 
        }
        lastEl = elements[ elements.length - 1 ];
        firstEl = elements[0];
        activeEl = _doc.activeElement;
        tabKey = event.keyCode === 9;
        shiftKey = event.shiftKey;

        if ( ! shiftKey && tabKey && lastEl === activeEl ) {
          event.preventDefault();
          firstEl.focus();
        }

        if ( shiftKey && tabKey && firstEl === activeEl ) {
          event.preventDefault();
          lastEl.focus();
        }
      }

    } );
  }
}; // royalshopmenu.modalMenu 

  RoyalShopLib.init();

/////////////////////////////////////////////////////
  $(".menu-close-btn").click(function(){
    // focus and select
   $('.menu-toggle .menu-btn').focus().select();
   $('.royal-shop-menu a,.menu-close,.arrow').attr('tabindex',-1);
});
$(".menu-close-btn").keypress(function(){
   
    // focus and select
   $('.menu-toggle .menu-btn').focus().select();
   $('.royal-shop-menu a,.menu-close,.arrow').attr('tabindex',-1);
});
//////////////////////////////////////////////////

})(jQuery);


