<?php
/**
 *
 * Adds custom Block Patterns to the post/page editor.
 *
 * see: https://developer.wordpress.org/block-editor/developers/block-api/block-patterns/
 *
 * @package Ibsen
 */


register_block_pattern_category(
	'ibsen-theme',
	array( 'label' => __( 'Ibsen', 'ibsen' ) )
);



if ( class_exists( 'WooCommerce' ) ) {

	register_block_pattern(
		'ibsen/two-columns-cover-products',
		array(
			'title'			=> __( 'Cover and Products', 'ibsen' ),
			'description'	=> _x( 'Two columns with a cover image to the left, and latest products on the right.', 'Block pattern description', 'ibsen' ),
			'content'		=> '<!-- wp:columns -->
	<div class="wp-block-columns"><!-- wp:column {"width":33.33} -->
	<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:cover {"url":"http://127.0.0.1/wordpress/wp-content/uploads/2020/04/StockSnap_KVJUCEE9JY-scaled.jpg","id":2152,"className":"equal-height"} -->
	<div class="wp-block-cover has-background-dim equal-height" style="background-image:url(http://127.0.0.1/wordpress/wp-content/uploads/2020/04/StockSnap_KVJUCEE9JY-scaled.jpg)"><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"' . __( 'Title here...', 'ibsen' ) . '","fontSize":"large"} -->
	<p class="has-text-align-center has-large-font-size"></p>
	<!-- /wp:paragraph --></div></div>
	<!-- /wp:cover --></div>
	<!-- /wp:column -->

	<!-- wp:column {"width":66.66} -->
	<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:woocommerce/product-new {"rows":2} /--></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns -->',
			'viewportWidth'	=> 1000,
			'categories'	=> array( 'ibsen-theme' ),
		)
	);

}
