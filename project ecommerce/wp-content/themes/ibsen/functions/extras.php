<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Ibsen
 */

/**
 * Adds custom classes to the array of body classes
 *
 * @param array $classes Classes for the body element
 * @return array
 */
if ( !function_exists( 'ibsen_body_classes' ) ) {
	function ibsen_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		if ( post_password_required() ) {
			$classes[] = 'post-password-required';
		}

		$sidebar_position = get_theme_mod( 'sidebar_position' );
		if ( $sidebar_position == "left" ) {
			$classes[] = 'sidebar-left';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'ibsen_body_classes' );


if ( !function_exists( 'ibsen_primary_menu_sub_trigger' ) ) {
	function ibsen_primary_menu_sub_trigger( $args, $item ) {
		if ( 'primary' === $args->theme_location ) {
			if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
				$args->before = '<button class="sub-trigger"></button>';
			} else {
				$args->before = '';
			}
		}
		return $args;
	}
}
add_filter( 'nav_menu_item_args', 'ibsen_primary_menu_sub_trigger', 10, 2 );


if ( !function_exists( 'ibsen_primary_menu_fallback' ) ) {
	function ibsen_primary_menu_fallback() {
		echo '<ul id="primary-menu" class="demo-menu">';
		if ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) ) {
			echo '<li class="menu-item"><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Create your Primary Menu here', 'ibsen' ) . '</a></li>';
		} else {
			wp_list_pages( array( 'depth' => 1, 'sort_column' => 'post_name', 'title_li' => '' ) );
		}		
		echo '</ul>';
	}
}


if ( !function_exists( 'ibsen_footer_menu_fallback' ) ) {
	function ibsen_footer_menu_fallback() {
		if ( function_exists( 'the_privacy_policy_link' ) ) {
			echo '<div class="site-info-right">';
			the_privacy_policy_link( '', '' );
			echo '</div>';
		}
	}
}


if ( !function_exists( 'ibsen_custom_excerpt_length' ) ) {
	function ibsen_custom_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		} else {
			return 20;
		}
	}
}
add_filter( 'excerpt_length', 'ibsen_custom_excerpt_length', 999 );


if ( !function_exists( 'ibsen_excerpt_more' ) ) {
	function ibsen_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		} else {
			return '&hellip;';
		}
	}
}
add_filter( 'excerpt_more', 'ibsen_excerpt_more' );


if ( !function_exists( 'ibsen_archive_title_prefix' ) ) {
	function ibsen_archive_title_prefix( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="author vcard">' . get_avatar( get_the_author_meta( 'ID' ), '90' ) . esc_html( get_the_author() ) . '</span>';
		}
		return $title;
	}
}
add_filter( 'get_the_archive_title', 'ibsen_archive_title_prefix' );


if ( !function_exists( 'ibsen_header_menu' ) ) {
	function ibsen_header_menu() {
		?>
		<button class="toggle-nav"></button>
		<div id="site-navigation" role="navigation">
			<div class="site-main-menu">
			<?php wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'		=> 'primary-menu',
					'fallback_cb'	=> 'ibsen_primary_menu_fallback',
				)
			); ?>
			</div>

			<?php ibsen_header_content_extra(); ?>

		</div>
		<?php
	}
}


if ( !function_exists( 'ibsen_header_content' ) ) {
	function ibsen_header_content() {
		?>
			<div id="site-branding">
				<?php if ( get_theme_mod( 'custom_logo' ) ) { ?>
						<div class="site-logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php } else { ?>
					<?php if ( is_front_page() ) { ?>
						<h1 class="site-title"><a class="<?php echo esc_attr( get_theme_mod( 'site_title_style' ) );?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php } else { ?>
						<p class="site-title"><a class="<?php echo esc_attr( get_theme_mod( 'site_title_style' ) );?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php } 
					} ?>				
						<div class="site-description"><?php bloginfo( 'description' ); ?></div>
			</div><!-- #site-branding -->
		<?php
	}
}


if ( !function_exists( 'ibsen_header_content_customizer' ) ) {
	function ibsen_header_content_customizer() {
		?>
			<div id="site-branding">
						<div class="site-logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php if ( is_front_page() ) { ?>
						<h1 class="site-title"><a class="<?php echo esc_attr( get_theme_mod( 'site_title_style' ) );?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php } else { ?>
						<p class="site-title"><a class="<?php echo esc_attr( get_theme_mod( 'site_title_style' ) );?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php } 
					?>				
						<div class="site-description"><?php bloginfo( 'description' ); ?></div>
			</div><!-- #site-branding -->
		<?php
	}
}


if ( !function_exists( 'ibsen_header_content_extra' ) ) {
	function ibsen_header_content_extra() {
		?>
				<?php ibsen_header_search() ?>
				<?php ibsen_header_account(); ?>
				<?php ibsen_header_wishlist(); ?>
				<?php ibsen_header_cart(); ?>
				<button class="icons menu-close"><?php esc_html_e( 'Close Menu', 'ibsen' ); ?></button>
		<?php
	}
}


if ( !function_exists( 'ibsen_header_account' ) ) {
	function ibsen_header_account() {
		if ( class_exists( 'WooCommerce' ) ) { ?>
			<div class="top-account">
			<?php $woo_account_page_id = get_option( 'woocommerce_myaccount_page_id' );
			if ( $woo_account_page_id ) { ?>
				<a class="ibsen-account" href="<?php echo esc_url( get_permalink( $woo_account_page_id ) ); ?>" role="button"><span id="icon-user" class="icons ibsen-icon-user"></span></a>
			<?php } else { ?>
				<span class="ibsen-account" role="button"><span id="icon-user" class="icons ibsen-icon-user"></span></span>
			<?php } ?>
				<div class="mini-account">
				<?php if ( is_user_logged_in() ) {
					woocommerce_account_navigation();
				} else {
					wc_get_template( 'myaccount/form-login.php' );
				} ?>
				</div>
			</div>
		<?php }
	}
}


if ( !function_exists( 'ibsen_header_search' ) ) {
	function ibsen_header_search() {
		?>
		<div class="top-search">
			<button class="icons ibsen-icon-search"></button>
			<div class="mini-search">
			<?php if ( class_exists( 'WooCommerce' ) ) {
				get_product_search_form();
			} else {
				get_search_form();
			} ?>
			<button class="icons search-close"><?php esc_html_e( 'Close Search', 'ibsen' ); ?></button>
			</div>
		</div>
	<?php }
}


if ( !function_exists( 'ibsen_header_wishlist' ) ) {
	function ibsen_header_wishlist() {
		if ( class_exists( 'WooCommerce' ) ) {
			if ( class_exists( 'YITH_WCWL' ) ) { ?>
				<div class="top-wishlist"><a class="ibsen-wishlist" href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() ); ?>" role="button"><span class="icons ibsen-icon-heart"></span><span class="wishlist_products_counter_number"><?php echo yith_wcwl_count_all_products(); ?></span></a></div>
			<?php } elseif ( class_exists( 'TInvWL' ) ) { ?>
				<div class="top-wishlist"> <?php
				echo do_shortcode( '[ti_wishlist_products_counter show_icon="off" show_text="off"]' ); ?>
				</div> <?php
			}
		}
	}
}


if ( !function_exists( 'ibsen_update_wishlist_count' ) ) {
	function ibsen_update_wishlist_count() {
		if( class_exists( 'YITH_WCWL' ) ){
			wp_send_json( array(
				'count' => yith_wcwl_count_all_products()
			) );
		}
	}
}
add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'ibsen_update_wishlist_count' );
add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'ibsen_update_wishlist_count' );


if ( !function_exists( 'ibsen_header_cart' ) ) {
	function ibsen_header_cart() {
		if ( class_exists( 'WooCommerce' ) ) {
			$cart_items = WC()->cart->get_cart_contents_count();
			if ( $cart_items > 0 ) {
				$cart_class = ' items';
			} else {
				$cart_class = '';
			} ?>
					<div class="top-cart<?php echo $cart_class; ?>"><a class="ibsen-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" role="button"><span class="icons ibsen-icon-shopping-cart"></span><?php echo sprintf ( '<span class="item-count">%d</span>', $cart_items ); ?></a><div class="mini-cart"><?php woocommerce_mini_cart();?></div></div>
		<?php }
	}
}


/**
 * Update header mini-cart contents when products are added to the cart via AJAX
 */
if ( !function_exists( 'ibsen_header_cart_update' ) ) {
	function ibsen_header_cart_update( $fragments ) {
		$cart_items = WC()->cart->get_cart_contents_count();
		if ( $cart_items > 0 ) {
			$cart_class = ' items';
		} else {
			$cart_class = '';
		}
		ob_start();
		?>
					<div class="top-cart<?php echo $cart_class; ?>"><a class="ibsen-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" role="button"><span class="icons ibsen-icon-shopping-cart"></span><?php echo sprintf ( '<span class="item-count">%d</span>', $cart_items ); ?></a><div class="mini-cart"><?php woocommerce_mini_cart();?></div></div>
		<?php	
		$fragments['.top-cart'] = ob_get_clean();	
		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'ibsen_header_cart_update' );


/**
 * Powered by WordPress
 */
if ( !function_exists( 'ibsen_powered_by' ) ) {
	function ibsen_powered_by() {
		?>
		<div class="site-info">
			<div class="copyright">
				<?php echo '&copy; ' . date_i18n( 'Y' ) . ' ' . esc_html( get_bloginfo( 'name' ) );	?>
			</div>
			<div class="theme">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ibsen' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'ibsen' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php /* translators: %2$s link to theme page, %1$s theme author */
				printf( esc_html__( 'Theme: %2$s by %1$s', 'ibsen' ), 'UXL Themes', '<a href="https://uxlthemes.com/theme/ibsen/" rel="designer">Ibsen</a>' ); ?>
			</div>
		</div>
		<?php
	}
}


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

add_action( 'woocommerce_before_main_content', 'ibsen_theme_wrapper_start', 10);
add_action( 'woocommerce_after_main_content', 'ibsen_theme_wrapper_end', 10);
add_action( 'woocommerce_before_shop_loop', 'ibsen_shop_filter_section', 15);

add_action( 'woocommerce_before_shop_loop_item', 'ibsen_before_shop_loop_item', 0);
add_action( 'woocommerce_before_subcategory', 'ibsen_before_shop_loop_item', 0);

add_action( 'woocommerce_shop_loop_item_title', 'ibsen_before_shop_loop_item_title', 0);
add_action( 'woocommerce_after_shop_loop_item_title', 'ibsen_after_shop_loop_item_title', 100);

add_action( 'woocommerce_shop_loop_subcategory_title', 'ibsen_before_shop_loop_cat_title', 0);
add_action( 'woocommerce_shop_loop_subcategory_title', 'ibsen_after_shop_loop_item_title', 100);

add_action( 'woocommerce_after_shop_loop_item', 'ibsen_before_shop_loop_addtocart', 6);
add_action( 'woocommerce_after_shop_loop_item', 'ibsen_after_shop_loop_addtocart', 100);
add_action( 'woocommerce_after_subcategory', 'ibsen_after_subcategory', 100);


if ( !function_exists( 'ibsen_before_shop_loop_item' ) ) {
	function ibsen_before_shop_loop_item() {
		echo '<div class="product-wrap">';
	}
}


if ( !function_exists( 'ibsen_before_shop_loop_item_title' ) ) {
	function ibsen_before_shop_loop_item_title() {
		global $product;
		$attachment_ids = $product->get_gallery_image_ids();
		if ( $attachment_ids && $product->get_image_id() ) {
			echo '<div class="product-extra-img">' . wp_get_attachment_image( $attachment_ids[0], 'woocommerce_thumbnail' ) . '</div>';
		}
		echo '<div class="product-detail-wrap">';
	}
}


if ( !function_exists( 'ibsen_before_shop_loop_cat_title' ) ) {
	function ibsen_before_shop_loop_cat_title() {
		echo '<div class="product-detail-wrap">';
	}
}


if ( !function_exists( 'ibsen_after_shop_loop_item_title' ) ) {
	function ibsen_after_shop_loop_item_title() {
		echo '</div>';
	}
}


if ( !function_exists( 'ibsen_before_shop_loop_addtocart' ) ) {
	function ibsen_before_shop_loop_addtocart() {
		echo '<div class="product-addtocart-wrap">';
	}
}


if ( !function_exists( 'ibsen_after_shop_loop_addtocart' ) ) {
	function ibsen_after_shop_loop_addtocart() {
		echo '</div></div>';
	}
}


if ( !function_exists( 'ibsen_after_subcategory' ) ) {
	function ibsen_after_subcategory() {
		echo '</div>';
	}
}


if ( !function_exists( 'ibsen_shop_filter_section' ) ) {
	function ibsen_shop_filter_section() {
		if ( !is_product() ) {
			get_sidebar( 'shop-filters' );
		}
	}
}


if ( !function_exists( 'ibsen_theme_wrapper_start' ) ) {
	function ibsen_theme_wrapper_start() {
		if ( !is_active_sidebar( 'ibsen-sidebar-shop' ) || is_product() ) {
			$page_full_width = ' full-width';
		} else {
			$page_full_width = '';
		}
		echo '<div id="primary" class="content-area'.$page_full_width.'">
			<main id="main" class="site-main" role="main">';
	}
}


if ( !function_exists( 'ibsen_theme_wrapper_end' ) ) {
	function ibsen_theme_wrapper_end() {
		echo '</main><!-- #main -->
		</div><!-- #primary -->';
		if ( !is_product() ) {
			get_sidebar( 'shop' );
		}
	}
}


if ( !function_exists( 'ibsen_change_prev_next' ) ) {
	function ibsen_change_prev_next( $args ) {
		$args['prev_text'] = '<i class="dashicons dashicons-arrow-left-alt2"></i>';
		$args['next_text'] = '<i class="dashicons dashicons-arrow-right-alt2"></i>';
		return $args;
	}
}
add_filter( 'woocommerce_pagination_args', 'ibsen_change_prev_next' );


if ( !function_exists( 'ibsen_woocommerce_placeholder_img_src' ) ) {
	function ibsen_woocommerce_placeholder_img_src() {
		return esc_url( get_template_directory_uri() ) . '/images/woocommerce-placeholder.png';
	}
}
if ( !get_option( 'woocommerce_placeholder_image', 0 ) ) {
	add_filter('woocommerce_placeholder_img_src', 'ibsen_woocommerce_placeholder_img_src');
}


if ( !function_exists( 'ibsen_upsell_products_args' ) ) {
	function ibsen_upsell_products_args( $args ) {
		$col_per_page = esc_attr( get_option( 'woocommerce_catalog_columns', 4 ) );
		$args['posts_per_page'] = $col_per_page;
		$args['columns'] = $col_per_page;
		return $args;
	}
}
add_filter( 'woocommerce_upsell_display_args', 'ibsen_upsell_products_args' );


if ( !function_exists( 'ibsen_related_products_args' ) ) {
	function ibsen_related_products_args( $args ) {
		$col_per_page = esc_attr( get_option( 'woocommerce_catalog_columns', 4 ) );
		$args['posts_per_page'] = $col_per_page;
		$args['columns'] = $col_per_page;
		return $args;
	}
}
add_filter( 'woocommerce_output_related_products_args', 'ibsen_related_products_args' );


if ( !function_exists( 'ibsen_woocommerce_gallery_thumbnail_size' ) ) {
	function ibsen_woocommerce_gallery_thumbnail_size( $size ) {
		return 'woocommerce_thumbnail';
	}
}
add_filter( 'woocommerce_gallery_thumbnail_size', 'ibsen_woocommerce_gallery_thumbnail_size' );


remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

add_action( 'woocommerce_before_shop_loop_item_title', 'ibsen_before_loop_sale_flash', 7);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 8 );
add_action( 'woocommerce_before_shop_loop_item_title', 'ibsen_after_loop_sale_flash', 9);

add_action( 'woocommerce_before_single_product_summary', 'ibsen_before_loop_sale_flash', 9);
add_action( 'woocommerce_before_single_product_summary', 'ibsen_after_loop_sale_flash', 11);


if ( !function_exists('ibsen_before_loop_sale_flash') ) {
	function ibsen_before_loop_sale_flash() {
		global $product;
		if ( $product->is_on_sale() ) {
			echo '<div class="sale-flash">';
		}
	}
}


if ( !function_exists('ibsen_after_loop_sale_flash') ) {
	function ibsen_after_loop_sale_flash() {
		global $product;
		if ( $product->is_on_sale() ) {			
			if ( ! $product->is_type( 'variable' ) && $product->get_regular_price() && $product->get_sale_price() ) {
				$discount_price = $product->get_regular_price() - $product->get_sale_price();
				if ( $discount_price > 0 ) {
					$max_percentage = ( $discount_price  / $product->get_regular_price() ) * 100;
				} else {
					$max_percentage = 0;
				}
			} else {
				$max_percentage = 0;				
				foreach ( $product->get_children() as $child_id ) {
					$variation = wc_get_product( $child_id );
					$price = $variation->get_regular_price();
					$sale = $variation->get_sale_price();
					$percentage = '';
					if ( $price != 0 && ! empty( $sale ) ) {
						$percentage = ( $price - $sale ) / $price * 100;
					}
					if ( $percentage > $max_percentage ) {
						$max_percentage = $percentage;
					}
				}
			}
			echo '<br /><span class="sale-percentage">-' . esc_html( round($max_percentage) ) . '%</span>';
			echo '</div>';
		}
	}
}


function ibsen_hex2RGB( $hex ) {
	$hex = str_replace("#", "", $hex);

	preg_match("/^#{0,1}([0-9a-f]{1,6})$/i",$hex,$match);
	if ( !isset( $match[1] ) ) {
		return false;
	}

	if ( strlen( $match[1] ) == 6 ) {
		list($r, $g, $b) = array($hex[0].$hex[1],$hex[2].$hex[3],$hex[4].$hex[5]);
	}
	elseif ( strlen($match[1]) == 3 ) {
		list($r, $g, $b) = array($hex[0].$hex[0],$hex[1].$hex[1],$hex[2].$hex[2]);
	}
	elseif ( strlen($match[1]) == 2 ) {
		list($r, $g, $b) = array($hex[0].$hex[1],$hex[0].$hex[1],$hex[0].$hex[1]);
	}
	elseif ( strlen($match[1]) == 1 ) {
		list($r, $g, $b) = array($hex.$hex,$hex.$hex,$hex.$hex);
	}
	else {
		return false;
	}

	$color = array();
	$color['r'] = hexdec($r);
	$color['g'] = hexdec($g);
	$color['b'] = hexdec($b);

	return $color;
}
