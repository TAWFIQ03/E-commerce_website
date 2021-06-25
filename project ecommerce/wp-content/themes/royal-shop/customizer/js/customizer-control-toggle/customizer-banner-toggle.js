/*************************************/
// Banner Hide N Show control
/*************************************/
( function( $ ){
OPNControlTrigger.addHook( 'royal-shop-toggle-control', function( argument, api ){
OPNCustomizerToggles ['royal_shop_banner_layout'] = [
		     

		     {
				controls: [    
				'royal_shop_bnr_1_img',
				'royal_shop_bnr_1_url',
				'royal_shop_bnr_2_img',
				'royal_shop_bnr_2_url',
				'royal_shop_bnr_3_img',
				'royal_shop_bnr_3_url',
				'royal_shop_bnr_4_img',
				'royal_shop_bnr_4_url',
				'royal_shop_bnr_5_img',
				'royal_shop_bnr_5_url',
				
				],
				callback: function(layout){
					if(layout=='bnr-four'){
					return true;
					}else{
					return false;	
					}
				}
			},	
			{
				controls: [    
				'royal_shop_bnr_1_img',
				'royal_shop_bnr_1_url',
				'royal_shop_bnr_2_img',
				'royal_shop_bnr_2_url',
				'royal_shop_bnr_3_img',
				'royal_shop_bnr_3_url',
				'royal_shop_bnr_4_img',
				'royal_shop_bnr_4_url',
				
				],
				callback: function(layout){
					if(layout=='bnr-five' ||  layout=='bnr-four'){
					return true;
					}else{
					return false;	
					}
				}
			},	
		    {
				controls: [    
				'royal_shop_bnr_1_img',
				'royal_shop_bnr_1_url',
				'royal_shop_bnr_2_img',
				'royal_shop_bnr_2_url',
				'royal_shop_bnr_3_img',
				'royal_shop_bnr_3_url',
				
				],
				callback: function(layout){
					if(layout=='bnr-three' || layout=='bnr-four' || layout=='bnr-five' || layout=='bnr-six'){
					return true;
					}else{
					return false;	
					}
				}
			},	
			{
				controls: [    
				'royal_shop_bnr_1_img',
				'royal_shop_bnr_1_url',
				'royal_shop_bnr_2_img',
				'royal_shop_bnr_2_url',
				
				],
				callback: function(layout){
					if(layout=='bnr-two'|| layout=='bnr-three' || layout=='bnr-four' || layout=='bnr-five'|| layout=='bnr-six'){
					return true;
					}else{
					return false;	
					}
				}
			},	
			{
				controls: [    
				'royal_shop_bnr_1_img',
				'royal_shop_bnr_1_url',	
				],
				callback: function(layout){
					if(layout=='bnr-one' || layout=='bnr-two'|| layout=='bnr-three' || layout=='bnr-four' || layout=='bnr-five' || layout=='bnr-six'){
					return true;
					}else{
					return false;	
					}
				}
			},	
				
		];	
	});
})( jQuery );