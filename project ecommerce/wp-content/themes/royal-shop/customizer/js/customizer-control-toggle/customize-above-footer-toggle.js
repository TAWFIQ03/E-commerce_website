/*************************************/
// Above Footer Hide and Show control
/*************************************/
( function( $ ){
OPNControlTrigger.addHook( 'royal-shop-toggle-control', function( argument, api ){
OPNCustomizerToggles ['royal_shop_above_footer_layout'] = [
		    {
				controls: [    
				'royal_shop_above_footer_col1_set',
				'royal_shop_above_footer_col2_set',
				'royal_shop_above_footer_col3_set',
				'royal_shop_footer_col1_texthtml',
				'royal_shop_footer_col1_widget_redirect',
	            'royal_shop_footer_col1_menu_redirect',
				'royal_shop_footer_col1_social_media_redirect',
				'royal_shop_above_footer_col2_texthtml',
				'royal_shop_above_footer_col2_widget_redirect',
				'royal_shop_above_footer_col2_menu_redirect',
				'royal_shop_above_footer_col2_social_media_redirect',
				'royal_shop_above_footer_col3_texthtml',
				'royal_shop_above_footer_col3_widget_redirect',
				'royal_shop_above_footer_col3_menu_redirect',
				'royal_shop_above_footer_col3_social_media_redirect',
				'royal_shop_above_ftr_hgt',
				'royal_shop_abv_ftr_botm_brd',
				'royal_shop_above_frt_brdr_clr',
				'royal_shop_abv_ftr_top_brd',
				'royal_shop_above_frt_top_brdr_clr',
				],
				callback: function(layout){
					if(layout == 'ft-abv-none'){
					return false;
					}
					return true;
				}
			},
           {
				controls: [    
				'royal_shop_above_footer_col2_set',  
				'royal_shop_above_footer_col3_set',
				
				],
				callback: function(layout){
					if(layout!=='ft-abv-two'|| layout!=='ft-abv-three' || layout!=='ft-abv-none'){
					return false;
					}
					return true;
				}
			},
            
              {
				controls: [ 
				'royal_shop_above_footer_col1_set',   
				'royal_shop_above_footer_col2_set', 
				
				],
				callback: function(layout){
					if(layout=='ft-abv-two' || layout=='ft-abv-three'){
					return true;
					}
					return false;
				}
			},
           {
				controls: [ 
				'royal_shop_above_footer_col1_set', 
				],
				callback: function(layout){
					if(layout=='ft-abv-one'|| layout=='ft-abv-two' ||  layout=='ft-abv-three'){
					return true;
					}
					return false;
				}
			},
           {
				controls: [ 
				'royal_shop_above_footer_col3_set',  
				],
				callback: function(layout){
					if(layout=='ft-abv-three'){
					return true;
					}
					return false;
				}
			},
			

			{
				controls: [    
				'royal_shop_footer_col1_texthtml',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_col1_set' ).get();
					if((layout!== 'ft-abv-none') && val=='text'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_footer_col1_widget_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_col1_set' ).get();
					if((layout!== 'ft-abv-none') && val=='widget'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_footer_col1_menu_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_col1_set' ).get();
					if((layout!== 'ft-abv-none') && val=='menu'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_footer_col1_social_media_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_col1_set' ).get();
					if((layout!== 'ft-abv-none') && val=='social'){
					return true;
					}
					return false;
				}
			},
			
			// col2
			{
				controls: [    
				'royal_shop_above_footer_col2_texthtml',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_col2_set' ).get();
					if((layout=='ft-abv-two'||layout=='ft-abv-three') && (val=='text')){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_above_footer_col2_widget_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_col2_set' ).get();
					if((layout=='ft-abv-two'||layout=='ft-abv-three')  && (val=='widget')){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_above_footer_col2_menu_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_col2_set' ).get();
					if((layout=='ft-abv-two'||layout=='ft-abv-three')  && (val=='menu')){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_above_footer_col2_social_media_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_col2_set' ).get();
					if((layout=='ft-abv-two'||layout=='ft-abv-three')  && (val=='social')){
					return true;
					}
					return false;
				}
			},
			
			// col3
			{
				controls: [    
				'royal_shop_above_footer_col3_texthtml',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_col3_set' ).get();
					if((layout== 'ft-abv-three') && val=='text'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_above_footer_col3_widget_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_col3_set' ).get();
					if((layout== 'ft-abv-three') && val=='widget'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_above_footer_col3_menu_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_col3_set' ).get();
					if((layout== 'ft-abv-three') && val=='menu'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_above_footer_col3_social_media_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_col3_set' ).get();
					if((layout== 'ft-abv-three') && val=='social'){
					return true;
					}
					return false;
				}
			},		
];
OPNCustomizerToggles ['royal_shop_above_footer_col1_set'] = [
		    {
				controls: [    
				'royal_shop_footer_col1_texthtml',
				'royal_shop_footer_col1_widget_redirect',
				'royal_shop_footer_col1_menu_redirect',
				'royal_shop_footer_col1_social_media_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_layout' ).get();
					if(layout == 'none' && val!=='ft-abv-none'){
					return false;
					}
					return true;
				}
			},
			{
				controls: [    
				'royal_shop_footer_col1_texthtml',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_layout' ).get();
					if(layout == 'text' && val!=='ft-abv-none'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_footer_col1_widget_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_layout' ).get();
					if(layout == 'widget' && val!=='ft-abv-none'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_footer_col1_menu_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_layout' ).get();
					if(layout == 'menu' && val!=='ft-abv-none'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_footer_col1_social_media_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_layout' ).get();
					if(layout == 'social' && val!=='ft-abv-none'){
					return true;
					}
					return false;
				}
			},
			
		];
OPNCustomizerToggles ['royal_shop_above_footer_col2_set'] = [
		    {
				controls: [    
				'royal_shop_above_footer_col2_texthtml',
				'royal_shop_above_footer_col2_widget_redirect',
				'royal_shop_above_footer_col2_menu_redirect',
				'royal_shop_above_footer_col2_social_media_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_layout' ).get();
					if(layout == 'none' || val=='ft-abv-none'){
					return false;
					}
					return true;
				}
			},
			{
				controls: [    
				'royal_shop_above_footer_col2_texthtml',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_layout' ).get();
					if((layout == 'text') && (val=='ft-abv-two'|| val=='ft-abv-three')){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_above_footer_col2_widget_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_layout' ).get();
					if((layout == 'widget')&& (val=='ft-abv-two'|| val=='ft-abv-three')){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_above_footer_col2_menu_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_layout' ).get();
					if((layout == 'menu')&& (val=='ft-abv-two'|| val=='ft-abv-three')){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_above_footer_col2_social_media_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_layout' ).get();
					if((layout == 'social') && (val=='ft-abv-two'|| val=='ft-abv-three')){
					return true;
					}
					return false;
				}
			},
			
		];
OPNCustomizerToggles ['royal_shop_above_footer_col3_set'] = [
		    {
				controls: [    
				'royal_shop_above_footer_col3_texthtml',
				'royal_shop_above_footer_col3_widget_redirect',
				'royal_shop_above_footer_col3_menu_redirect',
				'royal_shop_above_footer_col3_social_media_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_layout' ).get();
					if(layout == 'none' && val!=='ft-abv-three'){
					return false;
					}
					return true;
				}
			},
			{
				controls: [    
				'royal_shop_above_footer_col3_texthtml',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_layout' ).get();
					if(layout == 'text' && val=='ft-abv-three'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_above_footer_col3_widget_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_layout' ).get();
					if(layout == 'widget' && val=='ft-abv-three'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_above_footer_col3_menu_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_layout' ).get();
					if(layout == 'menu' && val=='ft-abv-three'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'royal_shop_above_footer_col3_social_media_redirect',
				],
				callback: function(layout){
					var val = api( 'royal_shop_above_footer_layout' ).get();
					if(layout == 'social' && val=='ft-abv-three'){
					return true;
					}
					return false;
				}
			},
			
		];
	});
})( jQuery );