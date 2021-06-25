/*************************************/
// Ribbon Hide N Show control
/*************************************/
( function( $ ){
OPNControlTrigger.addHook( 'royal-shop-toggle-control', function( argument, api ){
OPNCustomizerToggles ['royal_shop_bg_select'] = [
		     {
				controls:[    
				'royal_shop_ribbon_bg_background_image',
				
				],
				callback: function(layout){
					if(layout=='image'){
					return true;
					}else{
					return false;	
					}
				}
			},	
			{
				controls: [  
				'royal_shop_ribbon_video_poster_image',
				'royal_shop_ribbon_bg_video', 
				'royal_shop_ribbon_video_mute',
			    
				],
				callback: function(layout1){
					if(layout1 =='video'){
					return true;
					}else{
					return false;	
					}
				}
			},	
		];	
	});
})( jQuery );