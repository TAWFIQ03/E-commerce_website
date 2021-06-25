( function( $ ) {
//**********************************/
// Slider settings
//**********************************/
OPNControlTrigger.addHook( 'royal-shop-toggle-control', function( argument, api ){
		OPNCustomizerToggles ['royal_shop_top_slide_layout'] = [
		    {
				controls: [    
				'royal_shop_lay2_adimg', 
				'royal_shop_lay2_url',
				'royal_shop_lay3_adimg',
				'royal_shop_lay3_url',
				'royal_shop_lay3_adimg2',
				'royal_shop_lay3_2url',
				'royal_shop_lay3_adimg3',
				'royal_shop_lay3_3url',
				'royal_shop_lay4_adimg1',
				'royal_shop_lay4_url1',
				'royal_shop_lay4_adimg2',
				'royal_shop_lay4_url2',
				'royal_shop_lay6_adimg',
				'royal_shop_lay6_url',
				'royal_shop_lay6_adimg2',
				'royal_shop_lay6_2url',
				'royal_shop_lay6_adimg3',
				'royal_shop_lay6_3url',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-1'){
					return false;
					}
					return true;
				}
			},	
			{
				controls: [    
				'royal_shop_lay2_adimg', 
				'royal_shop_lay2_url',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-2'){
					return true;
					}
					return false;
				}
			},	
			{
				controls: [    
				'royal_shop_lay3_adimg',
				'royal_shop_lay3_url',
				'royal_shop_lay3_adimg2',
				'royal_shop_lay3_2url',
				'royal_shop_lay3_adimg3',
				'royal_shop_lay3_3url',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-3'){
					return true;
					}
					return false;
				}
			},	
			{
				controls: [    
				'royal_shop_lay4_adimg1',
				'royal_shop_lay4_url1',
				'royal_shop_lay4_adimg2',
				'royal_shop_lay4_url2',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-4'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_lay6_adimg',
				'royal_shop_lay6_url',
				'royal_shop_lay6_adimg2',
				'royal_shop_lay6_2url',
				'royal_shop_lay6_adimg3',
				'royal_shop_lay6_3url',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-6'){
					return true;
					}
					return false;
				}
			},	
			{
				controls: [    
				'royal_shop_top_slide_lay5_content',
				],
				callback: function(slideroptn){
			    if(slideroptn =='slide-layout-5'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_top_slide_content',
				],
				callback: function(slideroptn){
			    if(slideroptn =='slide-layout-5'){
					return false;
					}
					return true;
				}
			},
			 
		];	
		
		OPNCustomizerToggles ['royal_shop_top_slider_optn'] = [
		    {
				controls: [    
				'royal_shop_top_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			},
			
			];

			OPNCustomizerToggles ['royal_shop_cat_slider_optn'] = [
		    {
				controls: [    
				'royal_shop_cat_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			},
			
			];
			OPNCustomizerToggles ['royal_shop_product_slider_optn'] = [
		    {
				controls: [    
				'royal_shop_product_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			},
			
			];
			OPNCustomizerToggles ['royal_shop_category_slider_optn'] = [
		    {
				controls: [    
				'royal_shop_category_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			},
			
			];
			OPNCustomizerToggles ['royal_shop_product_list_slide_optn'] = [
		    {
				controls: [    
				'royal_shop_product_list_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			},
			
			];
			OPNCustomizerToggles ['royal_shop_feature_product_slider_optn'] = [
		    {
				controls: [    
				'royal_shop_feature_product_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			},
			
			];
			OPNCustomizerToggles ['royal_shop_cat_tb_lst_slider_optn'] = [
		    {
				controls: [    
				'royal_shop_cat_tb_lst_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			},
			
			];
			OPNCustomizerToggles ['royal_shop_brand_slider_optn'] = [
		    {
				controls: [    
				'royal_shop_brand_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			},
			
			];
    });
})( jQuery );