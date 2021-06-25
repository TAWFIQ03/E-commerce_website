/**
 * Script fort the customizer sections scroll function.
 *
 * @since    1.0.0
 * @package  Royal Shop
 *
 * @author  ThemeHunk
 */
/* global wp */
jQuery(document).ready(function() {
var wzta_customizer_section_scroll = function ( $ ) {
	'use strict';
	$( function () {
				var customize = wp.customize;
				customize.preview.bind('clicked-customizer', function( data ) {

						var sectionClass = '';
						    switch (data) {
							case'sub-accordion-section-royal_shop_top_slider_section':
							sectionClass = 'section.wzta-slider-section';
							break;
							case'sub-accordion-section-royal_shop_category_tab_section':
							sectionClass = 'section.wzta-product-tab-section';
							break;
							case'sub-accordion-section-royal_shop_product_slide_section':
							sectionClass = 'section.wzta-product-slide-section';
							break;
							case'sub-accordion-section-royal_shop_cat_slide_section':
							sectionClass = 'section.wzta-category-slide-section';
							break;
							case'sub-accordion-section-royal_shop_product_slide_list':
							sectionClass = 'section.wzta-product-list-section';
							break;
							case'sub-accordion-section-royal_shop_product_cat_list':
							sectionClass = 'section.wzta-product-tab-list-section';
							break;
							case'sub-accordion-section-royal_shop_banner':
							sectionClass = 'section.wzta-banner-section';
							break;
							case'sub-accordion-section-royal_shop_ribbon':
							sectionClass = 'section.wzta-ribbon-section';
							break;
							case'sub-accordion-section-royal_shop_brand':
							sectionClass = 'section.wzta-brand-section';
							break;
							case'sub-accordion-section-royal_shop_highlight':
							sectionClass = 'section.wzta-product-highlight-section';
							break;
							
							default:
							sectionClass = 'section.' + data;
							break;
						}
						if ( $( sectionClass ).length > 0) {
							$( 'html, body' ).animate(
								{
									scrollTop: $(sectionClass).offset().top - 0
								}, 1000
							);
						}
					}
				);
		}
	);
};
wzta_customizer_section_scroll( jQuery );
});
