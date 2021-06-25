<?php
/**
 * Perform all main WooCommerce configurations for this theme
 *
 * @package Royal Shop WordPress theme
 */
// If plugin - 'WooCommerce' not exist then return.
if ( ! class_exists( 'WooCommerce' ) ){
	return;
}
if ( ! function_exists( 'is_plugin_active' ) ) {
         require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
/**
 * Royal Shop WooCommerce Compatibility
 */
if ( ! class_exists( 'royal_shop_Woocommerce_Ext' ) ) :
	/**
	 * royal_shop_Woocommerce_Ext Compatibility
	 *
	 * @since 1.0.0
	 */
	class royal_shop_Woocommerce_Ext{

        /**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
        /**
		 * Constructor
		 */
		public function __construct(){
		    add_action( 'wp_enqueue_scripts',array( $this, 'royal_shop_add_scripts' ));	
		    add_action( 'wp_enqueue_scripts',array( $this, 'royal_shop_add_style' ));	

		    add_filter( 'post_class', array( $this, 'royal_shop_post_class' ) );
		   
		    add_action( 'after_setup_theme', array( $this, 'royal_shop_common_actions' ), 999 );
		    add_filter( 'royal_shop_theme_js_localize', array( $this, 'royal_shop_js_localize' ) );
		    add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'royal_shop_product_flip_image' ), 10 );
		    // Register Store Sidebars.
			add_action( 'widgets_init', array( $this, 'royal_shop_store_widgets_init' ), 15 );
			add_action( 'after_setup_theme', array( $this, 'royal_shop_setup_theme' ) );
			// Replace Store Sidebars.
			add_filter( 'royal_shop_get_sidebar', array( $this, 'royal_shop_replace_store_sidebar' ) );
		    // quick view ajax.
			add_action( 'wp_ajax_alm_load_product_quick_view', array( $this, 'royal_shop_load_product_quick_view_ajax' ) );
			add_action( 'wp_ajax_nopriv_alm_load_product_quick_view', array( $this, 'royal_shop_load_product_quick_view_ajax' ) );
			add_action('royal_shop_woo_quick_view_product_summary', array( $this, 'royal_shop_woo_single_product_content_structure' ), 10, 1 );
			//shop
			 add_action('woocommerce_before_shop_loop', array($this, 'royal_shop_before_shop_loop'), 35);
			 add_action('woocommerce_after_shop_loop_item', array($this, 'royal_shop_list_after_shop_loop_item'),5);
			 // pagination
            add_action( 'royal_shop_pagination_infinite', array( $this, 'shop_page_styles' ) );
            add_action( 'royal_shop_pagination_infinite', array( $this, 'royal_shop_common_actions' ), 999 );

            add_action( 'wp_ajax_royal_shop_pagination_infinite', array( $this, 'royal_shop_pagination_infinite' ) );
            add_action( 'wp_ajax_nopriv_royal_shop_pagination_infinite', array( $this, 'royal_shop_pagination_infinite' ) );
			// Custom Template Quick View.
			$this->royal_shop_quick_view_content_actions();
			
		    add_action( 'wp', array( $this, 'royal_shop_single_product_customization' ) );
           
            // Alter cross-sells display
			remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
			if ( '0' != get_theme_mod( 'royal_shop_cross_num_col_shw', '2' ) ) {
				add_action( 'woocommerce_cart_collaterals', array( $this, 'royal_shop_cross_sell_display' ) );
			}


		 }
		 // woocommerce sidebar
		/**
		 * Store widgets init.
		 */
		function royal_shop_store_widgets_init(){
			register_sidebar(array(
		              'name'          => esc_html__( 'WooCommerce Sidebar', 'royal-shop' ),
		              'id'            => 'royal-shop-woo-shop-sidebar',
		              'description'   => esc_html__( 'Add widgets here to appear in your WooCommerce Sidebar.', 'royal-shop' ),
		              'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="royal-shop-widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	        ) );
	           
		}
		/**
		 * Assign shop sidebar for store page.
		 *
		 * @param String $sidebar Sidebar.
		 *
		 * @return String $sidebar Sidebar.
		 */
		function royal_shop_replace_store_sidebar( $sidebar ){

			if ( is_shop() || is_product_taxonomy() || is_checkout() || is_cart() || is_account_page() ){
				$sidebar = 'royal-shop-woo-shop-sidebar';
			}elseif ( is_product() ){
				$sidebar = 'royal-shop-woo-product-sidebar';
			}
			return $sidebar;
		}
       /**
		 * Setup theme
		 *
		 * @since 1.0.3
		 */
		function royal_shop_setup_theme(){
			// WooCommerce.
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}
	

		/**
		 * Product Flip Image
		 */
		function royal_shop_product_flip_image(){

			global $product;

			$hover_style = get_theme_mod( 'royal_shop_woo_product_animation' );

			if ( 'swap' === $hover_style ) {

				$attachment_ids = $product->get_gallery_image_ids();

				if ( $attachment_ids ) {

					$image_size = apply_filters( 'single_product_archive_thumbnail_size', 'shop_catalog' );

					echo apply_filters( 'royal_shop_woocommerce_product_flip_image', wp_get_attachment_image( reset( $attachment_ids ), $image_size, false, array( 'class' => 'show-on-hover' ) ) );
				}
			}
			if ('slide' === $hover_style ) {

				$attachment_ids = $product->get_gallery_image_ids();

				if ( $attachment_ids ) {

					$image_size = apply_filters( 'single_product_archive_thumbnail_size', 'shop_catalog' );

					echo apply_filters( 'royal_shop_woocommerce_product_flip_image', wp_get_attachment_image( reset( $attachment_ids ), $image_size, false, array( 'class' => 'show-on-slide' ) ) );
				}
			}
		}
		
		/**
		 * Post Class
		 *
		 * @param array $classes Default argument array.
		 *
		 * @return array;
		 */
		function royal_shop_post_class( $classes ){

			if (!royal_shop_is_blog()|| is_shop() || is_product_taxonomy() || post_type_exists( 'product' )){
                $classes[] = 'wzta-woo-product-list';
				$qv_enable = get_theme_mod( 'royal_shop_woo_quickview_enable',true);
				if ( true == $qv_enable ){
					$classes[] = 'opn-qv-enable';

				}
			}
			if (is_shop() || is_product_taxonomy() ||  post_type_exists( 'product' )){
				$hover_style = get_theme_mod( 'royal_shop_woo_product_animation' );
				if ( '' !== $hover_style ) {
					$classes[] = 'royal-shop-woo-hover-' . esc_attr($hover_style);
				}
				
			}
			if (is_shop() || is_product_taxonomy() || post_type_exists( 'product' )){
			$single_product_tab_style = get_theme_mod( 'royal_shop_single_product_tab_layout','horizontal' );
				if ( '' !== $single_product_tab_style ){
					$classes[] = 'royal-shop-single-product-tab-'.esc_attr($single_product_tab_style);
				}
			}
			if (is_shop() || is_product_taxonomy() || post_type_exists( 'product' )){
			$shadow_style = get_theme_mod( 'royal_shop_product_box_shadow' );
				if ( '' !== $shadow_style ){
					$classes[] = 'royal-shop-shadow-' . esc_attr($shadow_style);
				}	
			}
			if (is_shop() || is_product_taxonomy() || post_type_exists( 'product' )){
			$shadow_hvr_style = get_theme_mod( 'royal_shop_product_box_shadow_on_hover' );
				if ( '' !== $shadow_hvr_style ){
					$classes[] = 'royal-shop-shadow-hover-' . esc_attr($shadow_hvr_style);
				}	
			}

             $hover_style = get_theme_mod( 'royal_shop_woo_product_animation' );
		    if('swap' === $hover_style && (!is_admin()) && !royal_shop_is_blog()){
            global $product;
			$attachment_ids = $product->get_gallery_image_ids();
			if(count($attachment_ids) > '0'){
                $classes[] ='royal-shop-swap-item-hover';
			  }
		

		   }
		   
		   if('slide' === $hover_style && (!is_admin()) && !royal_shop_is_blog()){
            global $product;
			$attachment_ids = $product->get_gallery_image_ids();
			if(count($attachment_ids) > '0'){
                $classes[] ='royal-shop-slide-item-hover';
			  }
		
		   }
			return $classes;
		}
		/**
		 * Infinite Products Show on scroll
		 *
		 * @since 1.1.0
		 * @param array $localize   JS localize variables.
		 * @return array
		 */
		function royal_shop_js_localize( $localize ){
			global $wp_query;
			$localize['ajax_url']                   = esc_url(admin_url( 'admin-ajax.php' ));
			$localize['is_cart']                    = is_cart();
			$localize['is_single_product']          = is_product();
			$localize['query_vars']                 = json_encode( $wp_query->query );
			$localize['shop_quick_view_enable']     = (bool)get_theme_mod('royal_shop_woo_quickview_enable','true' );
			
			$localize['query_vars']                 = json_encode( $wp_query->query );
			$localize['shop_no_more_post_message']  = apply_filters( 'royal_shop_no_more_product_text', __( 'No more products to show.', 'royal-shop' ) );
			return $localize;
			
		}
       /**
		 * Common Actions.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		function royal_shop_common_actions(){
			// Shop Pagination.
			$this->shop_pagination();
			// Quick View.
			$this->royal_shop_shop_init_quick_view();

		}
		/**
		 * Init Quick View
		 */
		function royal_shop_shop_init_quick_view(){
			$qv_enable = get_theme_mod( 'royal_shop_woo_quickview_enable','true' );
			if ( true == $qv_enable ){
				add_filter( 'royal_shop_theme_js_localize', array( $this, 'royal_shop_royal_shop_qv_js_localize' ) );
				add_action( 'quickview', array( $this,'royal_shop_add_quick_view_on_img' ),15);
				// load modal template.
				add_action( 'wp_footer', array( $this, 'royal_shop_quick_view_html' ) );
			}
		}
		/**
		 * Add Scripts
		 */
		function royal_shop_add_scripts(){
		   wp_enqueue_script( 'royal-shop-woocommerce-js', ROYAL_SHOP_THEME_URI .'inc/woocommerce/js/woocommerce.js', array( 'jquery' ), '1.0.0', true );
		   $localize = array(
				'ajaxUrl'  => esc_url(admin_url( 'admin-ajax.php' )),
			);
           wp_localize_script( 'royal-shop-woocommerce-js', 'royalshop_woojs',  $localize );	
           wp_enqueue_script('royal-shop-quick-view', ROYAL_SHOP_THEME_URI.'inc/woocommerce/quick-view/js/quick-view.js', array( 'jquery' ), '', true );
           wp_localize_script('royal-shop-quick-view', 'royalshopqv', array('ajaxurl' => esc_url(admin_url( 'admin-ajax.php' ))));
		   }
		/**
		 * Add Style
		 */
		function royal_shop_add_style(){
        wp_enqueue_style( 'royal-shop-quick-view', ROYAL_SHOP_THEME_URI. 'inc/woocommerce/quick-view/css/quick-view.css', null, '');
		}
        /**
		 * Quick view localize.
		 *
		 * @since 1.0
		 * @param array $localize   JS localize variables.
		 * @return array
		 */
		function royal_shop_royal_shop_qv_js_localize( $localize ){
			global $wp_query;
			$loader = '';
			if ( ! isset( $localize['ajax_url'] ) ){
				$localize['ajax_url'] = esc_url(admin_url( 'admin-ajax.php', 'relative' ));
			}
			$localize['qv_loader'] = $loader;
			return $localize;
		}
		/****************/
        // add to compare
        /****************/
        function royal_shop_add_to_compare($pid=''){
        if( is_plugin_active('yith-woocommerce-compare/init.php') ){
          return '<div class="wzta-compare"><span class="compare-list"><div class="woocommerce product compare-button"><a href="'.home_url().'?action=yith-woocompare-add-product&id='.$pid.'" class="compare button" data-product_id="'.$pid.'" rel="nofollow">Compare</a></div></span></div>';

           }
        }
		/**
		 * Quick view on image
		 */
		function royal_shop_add_quick_view_on_img(){
			global $product;
            $button='';
			$product_id = $product->get_id();

			// Get label.
			$label = __( 'Quick view', 'royal-shop' );

			$button.='<div class="wzta-quik">
			             <div class="wzta-quickview">
                               <span class="quik-view">
                                   <a href="#" class="opn-quick-view-text" data-product_id="' . $product_id . '">
                                      <span>'.$label.'</span>
                                    
                                   </a>
                            </span>
                          </div>';
            $button.= '</div>';
			$button = apply_filters( 'royal_shop_woo_add_quick_view_text_html', $button, $label, $product );
			echo $button;
		}
		/**
		 * Quick view html
		 */
		function royal_shop_quick_view_html(){
			$this->royal_shop_quick_view_dependent_data();
			require_once ROYAL_SHOP_THEME_DIR . 'inc/woocommerce/quick-view/quick-view-modal.php';
		}
		/**
		 * Quick view dependent data
		 */
		function royal_shop_quick_view_dependent_data(){
			wp_enqueue_script( 'wc-add-to-cart-variation' );
			wp_enqueue_script( 'flexslider' );
		}
        /**
		 * Quick view ajax
		 */
		function royal_shop_load_product_quick_view_ajax(){
			if ( ! isset( $_REQUEST['product_id'] ) ){
				die();
			}
			$product_id = intval( $_REQUEST['product_id'] );
			// set the main wp query for the product.
			wp( 'p=' . $product_id . '&post_type=product' );
			// remove product thumbnails gallery.
			remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
			ob_start();
			// load content template.
			require_once ROYAL_SHOP_THEME_DIR . 'inc/woocommerce/quick-view/quick-view-product.php';
			echo ob_get_clean();
			die();
		}
		/**
		 * Quick view actions
		 */
		public function royal_shop_quick_view_content_actions(){
			// Image.
			add_action('royal_shop_woo_qv_product_image', 'woocommerce_show_product_sale_flash', 10 );
			add_action('royal_shop_woo_qv_product_image', array( $this, 'royal_shop_qv_product_images_markup' ), 20 );
		} 
			
		/**
		 * Footer markup.
		 */
		function royal_shop_qv_product_images_markup(){
           require_once ROYAL_SHOP_THEME_DIR . 'inc/woocommerce/quick-view/quick-view-product-image.php';
		}
        function royal_shop_woo_single_product_content_structure(){
							/**
							 * Add Product Title on single product page for all products.
							 */
							do_action( 'royal_shop_woo_single_title_before' );
							woocommerce_template_single_title();
							do_action( 'royal_shop_woo_single_title_after' );
							/**
							 * Add Product Price on single product page for all products.
							 */
							do_action( 'royal_shop_woo_single_price_before' );
							woocommerce_template_single_price();
							do_action( 'royal_shop_woo_single_price_after' );
							/**
							 * Add rating on single product page for all products.
							 */
							do_action( 'royal_shop_woo_single_rating_before' );
							woocommerce_template_single_rating();
							do_action( 'royal_shop_woo_single_rating_after' );
							
							do_action( 'royal_shop_woo_single_short_description_before' );
							woocommerce_template_single_excerpt();
							do_action( 'royal_shop_woo_single_short_description_after' );
							
							do_action( 'royal_shop_woo_single_add_to_cart_before' );
							woocommerce_template_single_add_to_cart();
							do_action( 'royal_shop_woo_single_add_to_cart_after' );
							
							do_action( 'royal_shop_woo_single_category_before' );
							woocommerce_template_single_meta();
							do_action( 'royal_shop_woo_single_category_after' );
			
		}
        /**
		 * Single Product customization.
		 *
		 * @return void
		 */
		function royal_shop_single_product_customization(){
			if ( ! is_product() ){
				return;
			}
            remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
            add_filter('woocommerce_product_description_heading', '__return_empty_string');
            add_filter('woocommerce_product_reviews_heading', '__return_empty_string');
            add_filter('woocommerce_product_additional_information_heading', '__return_empty_string');
			
			/* Display Related Products */
			if ( ! get_theme_mod( 'royal_shop_related_product_display',true ) ) {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
			}
			/* Display upsell Products */
			if ( ! get_theme_mod( 'royal_shop_upsell_product_display',true ) ) {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 20 );
			}

			if(get_theme_mod( 'royal_shop_upsell_product_display',true )==true){
			  add_action( 'woocommerce_after_single_product_summary',array( $this, 'royal_shop_woocommerce_output_upsells' ),15);
             }else{
             remove_action( 'woocommerce_after_single_product_summary',array( $this, 'royal_shop_woocommerce_output_upsells' ));	
             }
             add_filter( 'woocommerce_output_related_products_args', array( $this, 'royal_shop_related_no_col_product_show' ) );

		}
	    /*****************/
		// upsale product
       /*****************/
		function royal_shop_woocommerce_output_upsells(){
		$upsell_columns = get_theme_mod('royal_shop_upsale_num_col_shw','4');
		$upsell_no_product = get_theme_mod( 'royal_shop_upsale_num_product_shw','4');	
        woocommerce_upsell_display($upsell_no_product,$upsell_columns); // Display max 3 products, 3 per row
         }
        /*****************************/ 
        // realted product argument pass
        /*****************************/ 
        function royal_shop_related_no_col_product_show( $args){
		$rel_columns = get_theme_mod('royal_shop_related_num_col_shw','4');
		$rel_no_product = get_theme_mod( 'royal_shop_related_num_product_shw','4');
		$args['posts_per_page'] = $rel_no_product; // related products
	    $args['columns'] = $rel_columns; // arranged in columns
	    return $args;
		}   
		
        /**
		 * Shop page view list and grid view.
		 */
        function royal_shop_before_shop_loop(){
        echo '<div class="wzta-list-grid-switcher">';
        echo '<a title="' . esc_attr__('Grid View', 'royal-shop') . '" href="#" data-type="grid" class="wzta-grid-view selected"><i class="fa fa-th"></i></a>';

        echo '<a title="' . esc_attr__('List View', 'royal-shop') . '" href="#" data-type="list" class="wzta-list-view"><i class="fa fa-bars"></i></a>';

        echo '</div>';
        }
        // shop page content
        function royal_shop_list_after_shop_loop_item(){
        ?>
           <div class="os-product-excerpt"><?php the_excerpt(); ?></div>
        <?php   
        }

		/**
		 * Change products per row for crossells.
		 */
		 function royal_shop_cross_sell_display(){
			// Get count
			$count = get_theme_mod( 'royal_shop_cross_num_product_shw', '4' );
			$count = $count ? $count : '4';
			// Get columns
			$columns = get_theme_mod( 'royal_shop_cross_num_col_shw', '2' );
			$columns = $columns ? $columns : '2';
			// Alter cross-sell display
			woocommerce_cross_sell_display( $count, $columns );
		} 

        /**************************
		 * Shop Pagination.
		 **************************/
		function royal_shop_pagination_infinite(){
         	check_ajax_referer( 'royal-shop-load-more-nonce', 'nonce' );
			do_action( 'royal_shop_pagination_infinite' );
			$query_vars                   = json_decode( stripslashes( $_POST['query_vars'] ), true );
			$query_vars['paged']          = isset( $_POST['page_no'] ) ? absint( $_POST['page_no'] ) : 1;
			$query_vars['post_status']    = 'publish';
			$query_vars['posts_per_page'] = wc_get_default_products_per_row() * wc_get_default_product_rows_per_page();
			$query_vars                   = array_merge( $query_vars, wc()->query->get_catalog_ordering_args() );
			$posts = new WP_Query( $query_vars );

			if ( $posts->have_posts() ) {
				while ( $posts->have_posts() ) {
					$posts->the_post();

					/**
					 * Woocommerce: woocommerce_shop_loop hook.
					 *
					 * @hooked WC_Structured_Data::generate_product_data() - 10
					 */
					do_action( 'woocommerce_shop_loop' );

					
					wc_get_template_part( 'content', 'product' );
				}
			}
			wp_reset_query();

			wp_die();
        }

        function shop_pagination(){
			$pagination = get_theme_mod( 'royal_shop_pagination' );
			if ( 'click' == $pagination || 'scroll' == $pagination){
				remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
				add_action( 'woocommerce_after_shop_loop', array( $this, 'royal_shop_pagination' ), 10 );
			}
		}
       function royal_shop_pagination( $output ){
			global $wp_query;
			$infinite_event = get_theme_mod( 'royal_shop_pagination' );
			$load_more_text = get_theme_mod( 'royal_shop_pagination_loadmore_btn_text',__( 'Load More','royal-shop'));
			if ( '' === $load_more_text ){
				$load_more_text = __( 'Load More', 'royal-shop' );
			}
			if ( $wp_query->max_num_pages > 1 ){
				?>
				<nav class="opn-shop-pagination-infinite">
					<span class="inifiniteLoader"><div class="loader"></div></span>
					<?php if ( 'click' == $infinite_event ){ ?>
						
							<div class="royal-shop-load-more">
								<button id="load-more-product" class="load-more-product-button wzta-button opn-shop-load-more active" >
									<?php echo apply_filters( 'royal_shop_load_more_text', esc_html( $load_more_text ) ); ?>
								</button>
							</div>
							
					<?php } ?>
				</nav>
				<?php
			}
		}
        /**
		 * Shop page template.
		 *
		 * @since 1.0.0
		 * @return void if not a shop page.
		 */
		function shop_page_styles(){
			$is_ajax_pagination = $this->is_ajax_pagination();
			if ( ! ( is_shop() || is_product_taxonomy() ) && ! $is_ajax_pagination ) {
				return;
			}
		}

		/**
		 * Check if ajax pagination is calling.
		 *
		 * @return boolean classes
		 */
		function is_ajax_pagination(){
			$pagination = false;
			if ( isset( $_POST['royal_shop_infinite'] ) && wp_doing_ajax() && check_ajax_referer( 'royal-shop-load-more-nonce', 'nonce', false ) ){
				$pagination = true;
			}
			return $pagination;
		}


	}
endif;
royal_shop_Woocommerce_Ext::get_instance();
