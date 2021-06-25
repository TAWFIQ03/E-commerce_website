      jQuery(document).ready(function () {
        jQuery('.main-navigation').meanmenu({
          meanScreenWidth: 815,
          meanRevealPosition: "center",
          removeElements: ".header-bottom"

        });
      });

      jQuery(window).load(function() {
        jQuery('.flexslider').flexslider({
          animation: "fade",
          controlNav: false
        });
      });