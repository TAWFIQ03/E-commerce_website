/*********************************/
// Sidebar hide and show control
/*********************************/
( function( $ ){
OPNControlTrigger.addHook( 'royal-shop-toggle-control', function( argument, api ){
OPNCustomizerToggles ['royal_shop_default_container'] = [
		    {
				controls: [    
				'royal_shop_conatiner_maxwidth',
				'royal_shop_conatiner_top_btm',
				],
				callback: function(layout){
					if(layout=='fullwidth'){
					return false;
					}
					return true;
				}
			},
			{
				controls: [    
				'royal_shop_conatiner_width',  
				],
				callback: function(layout){
					if(layout =='boxed'){
					return false;
					}
					return true;
				}
			},		
		];
	});
})( jQuery );