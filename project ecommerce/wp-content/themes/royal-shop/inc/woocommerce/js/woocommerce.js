/********************************/
// RoyalShopWooLib Custom Function
/********************************/
(function ($) {
    var RoyalShopWooLib = {
        init: function (){
            this.bindEvents();
        },
        bindEvents: function (){
            var $this = this;
            $this.listGridView();
            $this.cartDropdown();
            $this.AddtoCartQuanty();
            $this.AutoCompleteSearch();
            $this.cartopen();

          },
           cartopen: function(){
            $(document).on('click','a.cart-contents',function(e){
            e.preventDefault();
            $('body').toggleClass('cart-pan-active');
            $('.cart-overlay').toggleClass('open');
            });

            $('.cart-close-btn').click(function (e){
                $('body').removeClass('cart-pan-active');
                $('.cart-overlay').removeClass('open');
            });

             $('body').click(function(evt){    
                if(evt.target.class == ".open-cart")
                  return;
                if($(evt.target).closest('.open-cart').length)
                  return;             
                  $('body').removeClass('cart-pan-active'); 
                  $('.cart-overlay').removeClass('open');
        
            });


        },
        listGridView: function (){
            var wrapper = $('.wzta-list-grid-switcher');
            var class_name = '';
            wrapper.find('a').on('click', function (e){
              e.preventDefault();
                var type = $(this).attr('data-type');
                switch (type){
                    case "list":
                        class_name = "wzta-list-view";
                        break;
                    case "grid":
                        class_name = "wzta-grid-view";
                        break;
                    default:
                        class_name = "wzta-grid-view";
                        break;
                }
                if (class_name != ''){
                    $(this).closest('#shop-product-wrap').attr('class', '').addClass(class_name);
                    $(this).closest('.wzta-list-grid-switcher').find('a').removeClass('selected');
                    $(this).addClass('selected');
                }
              
            });
        },
        AddtoCartQuanty: function (){
                $('form.cart').on( 'click', 'button.plus, button.minus', function(){
                // Get current quantity values
                var qty = $( this ).siblings('.quantity').find( '.qty' );
                var val = parseFloat(qty.val()) ? parseFloat(qty.val()) : '0';
                var max = parseFloat(qty.attr( 'max' ));
                var min = parseFloat(qty.attr( 'min' ));
                var step = parseFloat(qty.attr( 'step' ));
 
                // Change the value if plus or minus
                if ( $( this ).is( '.plus' ) ) {
                    if ( max && ( max <= val ) ) {
                        qty.val( max );
                    } else {
                        qty.val( val + step );
                    }
                } else {
                    if ( min && ( min >= val ) ) {
                        qty.val( min );
                    } else if ( val > 1 ) {
                        qty.val( val - step );
                    }
                }
                 
            });

        },
        
        AutoCompleteSearch:function(){
               var searchRequest;
                   $('.search-autocomplete').autocomplete({
                   classes: {
                       "ui-autocomplete" : "ui-my-class"
                   },
                   minChars:3,
                   source: function( request, response, term){
                   var matcher = $.ui.autocomplete.escapeRegex( request.term );
                  $.ajax({
                      type: 'POST',
                      dataType: 'json',
                      url: royalshop_woojs.ajaxUrl,
                      data: {
                       action :'royal_shop_search_site',
                       'match':matcher,                
                       },
        success: function(res){
              response(res.data);
         },
        
      });
    }
  });
},
       cartDropdown: function (){
           /* woo, wc_add_to_cart_params */
              if ( typeof wc_add_to_cart_params === 'undefined' ){
               return false;
              }
              $( document ).on( 'click', '.ajax_add_to_cart', function(e){ // Remove button selector
                 e.preventDefault();
                var data1 = {
                 'action': 'royal_shop_product_count_update'
                };
                 $.post(
                 woocommerce_params.ajax_url, // The AJAX URL
                 data1, // Send our PHP function
                 function(response_data){
                 $('a.cart-content').html(response_data);
                 $( ".return.wc-backward" ).remove();
                 $('body').toggleClass('cart-pan-active');
                 $('.cart-overlay').toggleClass('open');
                 }
               );
             });
          // Ajax remove cart item
               $( document ).on( 'click', 'a.remove', function(e){ // Remove button selector
               e.preventDefault();
          // AJAX add to cart request
              var $thisbutton = $( this );
              if ( $thisbutton.is( '.remove' ) ){
                //Check if the button has a product ID
               if ( ! $thisbutton.attr( 'data-product_id' ) ){ 
              return true;
               }
            }
              $product_id = $thisbutton.attr( 'data-product_id' );
              var data = {'product_id':$product_id,
             'action': 'royal_shop_product_remove'
            };
            $.post(
            woocommerce_params.ajax_url, // The AJAX URL
            data, // Send our PHP function
            function(response){
            $('.royal-shop-quickcart-dropdown').html(response);
            var data = {
           'action': 'royal_shop_product_count_update'
            };
           $.post(
           woocommerce_params.ajax_url, // The AJAX URL
           data, // Send our PHP function
           function(response_data){
           $('.cart-content').html(response_data);
           }
         );
       }
   );
      return false;
  });
}, 
      }
    RoyalShopWooLib.init();
})(jQuery);