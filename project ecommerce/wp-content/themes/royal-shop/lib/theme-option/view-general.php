<?php
/**
 * View General
 *
 * @package Themehunk
 * @subpackage  Royal Shop
 * @since 1.0.0
 */
?>
<div class="royal-shop-container royal-shop-welcome">
		<div id="poststuff">
			<div id="post-body" class="columns-1">
				<div id="post-body-content">
					<!-- All WordPress Notices below header -->
					<h1 class="screen-reader-text"><?php esc_html_e( 'Royal Shop', 'royal-shop' ); ?> </h1>
					<div class="tabs-list">
					<a href="#royal-shop-recommend-plugins" class="tab active" data-id="recommend"><?php esc_html_e( 'Recommend Plugins', 'royal-shop' ); ?></a> 
					<a href="#royal-shop-useful-plugins" class="tab" data-id="useful"><?php esc_html_e( 'Useful Plugins', 'royal-shop' ); ?></a>
					</div>
						<?php do_action( 'royal_shop_welcome_page_content_before' ); ?>
                        <div class="royal-shop-content">
						<?php do_action( 'royal_shop_welcome_page_main_content' ); ?>
                         </div>
						<?php do_action( 'royal_shop_welcome_page_content_after' ); ?>
				</div>
			</div>
			<!-- /post-body -->
			<br class="clear">
		</div>


</div>
