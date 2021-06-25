( function( $ ) {
//**********************************/
// Slider settings
//**********************************/
OPNControlTrigger.addHook( 'royal-shop-toggle-control', function( argument, api ){
		OPNCustomizerToggles ['royal_shop_cat_slide_layout'] = [
		    {
				controls: [    
				'royal_shop_category_slider_optn', 
				],
				callback: function(layout){
					if(layout =='cat-layout-1'){
					return true;
					}
					return false;
				}
			},	
				
			
			 
		];	
    });
})( jQuery );