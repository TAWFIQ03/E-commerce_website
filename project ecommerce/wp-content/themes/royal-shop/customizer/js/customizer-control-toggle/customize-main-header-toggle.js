/****************/
// Main header	
/****************/
( function( $ ) {
//**********************************/
// Main Header settings
//**********************************/
OPNControlTrigger.addHook( 'royal-shop-toggle-control', function( argument, api ){
		OPNCustomizerToggles ['royal_shop_main_header_option'] = [
		    {
				controls: [    
				'royal_shop_main_hdr_btn_txt', 
				'royal_shop_main_hdr_btn_lnk',
				'royal_shop_main_hdr_calto_txt',
				'royal_shop_main_hdr_calto_nub',
				'royal_shop_main_header_widget_redirect'
				],
				callback: function(headeroptn){
					if (headeroptn =='none'){
					return false;
					}
					return true;
				}
			},	
			 {
				controls: [    
				'royal_shop_main_hdr_btn_txt', 
				'royal_shop_main_hdr_btn_lnk',
				],
				callback: function(layout){
					if(layout=='button'){
					return true;
					}
					return false;
				}
			},
			 {
				controls: [    
				'royal_shop_main_hdr_calto_txt',
				'royal_shop_main_hdr_calto_nub',
				],
				callback: function(layout){
					if(layout=='callto'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_main_header_widget_redirect'
				],
				callback: function(layout){
					if(layout=='widget'){
					return true;
					}
					return false;
				}
			},
			 
		];	
		OPNCustomizerToggles ['royal_shop_sticky_header'] = [
		    {
				controls: [    
				'royal_shop_sticky_header_effect', 
				],
				callback: function(headeroptn){
					if (headeroptn == true){
					return true;
					}
					return false;
				}
			},	
		];	
    });
})( jQuery );