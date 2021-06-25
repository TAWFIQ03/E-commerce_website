<?php 
/**
 * Common Function for Royal Shop Theme.
 *
 * @package     Royal Shop
 * @author      ThemeHunk
 * @copyright   Copyright (c) 2021, Royal Shop
 * @since       Royal Shop 1.0.0
 */
 if ( ! function_exists( 'royal_shop_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 * Does nothing if the custom logo is not available.
 */
function royal_shop_custom_logo(){
    if ( function_exists( 'the_custom_logo' ) ){?>
    	<div class="wzta-logo">
        <?php the_custom_logo();?>
        </div>
   <?php  }
}
endif;
/*********************/
// Menu 
/*********************/
function royal_shop_header_menu_style(){
 $royal_shop_main_header_layout = get_theme_mod('royal_shop_main_header_layout');
        	$menustyle='horizontal';	
        	return $menustyle;
		}
function royal_shop_add_classes_to_page_menu( $ulclass ){
  return preg_replace( '/<ul>/', '<ul class="royal-shop-menu" data-menu-style='.esc_attr(royal_shop_header_menu_style()).'>', $ulclass, 1 );
}
add_filter( 'wp_page_menu', 'royal_shop_add_classes_to_page_menu' );		
     // This theme uses wp_nav_menu() in two locations.
	  function royal_shop_custom_menu(){
		     register_nav_menus(array(
		    'royal-shop-above-menu'       => esc_html__( 'Header Above Menu', 'royal-shop' ),
			'royal-shop-main-menu'        => esc_html__( 'Main', 'royal-shop' ),
			'royal-shop-sticky-menu'        => esc_html__( 'Sticky', 'royal-shop' ),
			'royal-shop-footer-menu'  => esc_html__( 'Footer Menu', 'royal-shop' ),
		) );
	  }
	  add_action( 'after_setup_theme', 'royal_shop_custom_menu' );
	  // MAIN MENU
           function royal_shop_main_nav_menu(){
              wp_nav_menu( array(
              'theme_location' => 'royal-shop-main-menu', 
              'container'      => false, 
              'link_before'    =>'<span class="royal-shop-menu-link">',
              'link_after'     => '</span>',
              'items_wrap'     => '<ul id="royal-shop-menu" class="royal-shop-menu" data-menu-style='.esc_attr(royal_shop_header_menu_style()).'>%3$s</ul>',
             ));
         }
          //STICKY MENU
           function royal_shop_stick_nav_menu(){
              wp_nav_menu( array(
              'theme_location' => 'royal-shop-sticky-menu', 
              'container'      => false, 
              'link_before'    =>'<span class="royal-shop-menu-link">',
              'link_after'     => '</span>',
              'items_wrap'     => '<ul id="royal-shop-stick-menu" class="royal-shop-menu" data-menu-style='.esc_attr(royal_shop_header_menu_style()).'>%3$s</ul>',
             ));
         }
         // HEADER ABOVE MENU
         function royal_shop_abv_nav_menu(){
              wp_nav_menu( array('theme_location' => 'royal-shop-above-menu', 
              'container'   => false, 
              'link_before' => '<span class="royal-shop-menu-link">',
              'link_after'  => '</span>',
              'items_wrap'  => '<ul id="royal-shop-above-menu" class="royal-shop-menu" data-menu-style='.esc_attr(royal_shop_header_menu_style()).'>%3$s</ul>',
             ));
         }
         // FOOTER TOP MENU
         function royal_shop_footer_nav_menu(){
              wp_nav_menu( array('theme_location' => 'royal-shop-footer-menu', 
              'container'   => false, 
              'link_before' => '<span class="royal-shop-menu-link">',
              'link_after'  => '</span>',
              'items_wrap'  => '<ul id="royal-shop-footer-menu" class="royal-shop-bottom-menu">%3$s</ul>',
             ));
         }
function royal_shop_add_classes_to_page_menu_default( $ulclass ){
return preg_replace( '/<ul>/', '<ul class="royal-shop-menu" data-menu-style="horizontal">', $ulclass, 1 );
}
add_filter( 'wp_page_menu', 'royal_shop_add_classes_to_page_menu_default' );
/************************/
// description Menu
/************************/
function royal_shop_nav_description( $item_output, $item, $depth, $args ){
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>', '<p class="menu-item-description">' . esc_html($item->description) . '</p>' . $args->link_after . '</a>', $item_output );
    }
 
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'royal_shop_nav_description', 10, 4 );

/*********************/
/**
 * Function to check if it is Internet Explorer
 */
if ( ! function_exists( 'royal_shop_check_is_ie' ) ) :
	/**
	 * Function to check if it is Internet Explorer.
	 *
	 * @return true | false boolean
	 */
	function royal_shop_check_is_ie() {

		$is_ie = false;

		$ua = htmlentities( $_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8' );
		if ( strpos( $ua, 'Trident/7.0' ) !== false ) {
			$is_ie = true;
		}

		return apply_filters( 'royal_shop_check_is_ie', $is_ie );
	}

endif;
/**
 * ratia image
 */
if ( ! function_exists( 'royal_shop_replace_header_attr' ) ) :
	/**
	 * Replace header logo.
	 *
	 * @param array  $attr Image.
	 * @param object $attachment Image obj.
	 * @param sting  $size Size name.
	 *
	 * @return array Image attr.
	 */
	function royal_shop_replace_header_attr( $attr, $attachment, $size ){
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		if ( $custom_logo_id == $attachment->ID ){
			$attach_data = array();
			if ( ! is_customize_preview() ){
				$attach_data = wp_get_attachment_image_src( $attachment->ID, 'royal-shop-logo-size' );


				if ( isset( $attach_data[0] ) ) {
					$attr['src'] = $attach_data[0];
				}
			}

			$file_type      = wp_check_filetype( $attr['src'] );
			$file_extension = $file_type['ext'];
			if ( 'svg' == $file_extension ) {
				$attr['class'] = 'royal-shop-logo-svg';
			}
			$retina_logo = get_theme_mod( 'royal_shop_header_retina_logo' );
			$attr['srcset'] = '';
			if ( apply_filters( 'royal_shop_main_header_retina', true ) && '' !== $retina_logo ) {
				$cutom_logo     = wp_get_attachment_image_src( $custom_logo_id, 'full' );
				$cutom_logo_url = $cutom_logo[0];

				if (royal_shop_check_is_ie() ){
					// Replace header logo url to retina logo url.
					$attr['src'] = $retina_logo;
				}

				$attr['srcset'] = $cutom_logo_url . ' 1x, ' . $retina_logo . ' 2x';

			}
		}

		return apply_filters( 'royal_shop_replace_header_attr', $attr );
	}

endif;

add_filter( 'wp_get_attachment_image_attributes', 'royal_shop_replace_header_attr', 10, 3 );

/********************************/
// responsive slider function
/*********************************/
if ( ! function_exists( 'royal_shop_responsive_slider_funct' ) ) :
function royal_shop_responsive_slider_funct($control_name,$function_name){
  $custom_css='';
           $control_value = get_theme_mod( $control_name );
           if ( empty( $control_value ) ){
                return '';
             }  
        if ( royal_shop_is_json( $control_value ) ){
    $control_value = json_decode( $control_value, true );
    if ( ! empty( $control_value ) ) {

      foreach ( $control_value as $key => $value ){
        $custom_css .= call_user_func( $function_name, $value, $key );
      }
    }
    return $custom_css;
  }  
}
endif;
/********************************/
// responsive slider function add media query
/********************************/
if ( ! function_exists( 'royal_shop_add_media_query' ) ) :
function royal_shop_add_media_query( $dimension, $custom_css ){
  switch ($dimension){
      case 'desktop':
      $custom_css = '@media (min-width: 769px){' . $custom_css . '}';
      break;
      break;
      case 'tablet':
      $custom_css = '@media (max-width: 768px){' . $custom_css . '}';
      break;
      case 'mobile':
      $custom_css = '@media (max-width: 550px){' . $custom_css . '}';
      break;
  }

      return $custom_css;
}
endif;
/**
 * Display Sidebars
 */
if ( ! function_exists( 'royal_shop_get_sidebar' ) ){
	/**
	 * Get Sidebar
	 *
	 * @since 1.0.1.1
	 * @param  string $sidebar_id   Sidebar Id.
	 * @return void
	 */
	function royal_shop_get_sidebar( $sidebar_id ){
		 return $sidebar_id;
	}
}

/**********************/
// Top Slider Function
/**********************/
//Slider ontent output function layout 1
function royal_shop_top_slider_content( $royal_shop_slide_content_id, $default ){
//passing the seeting ID and Default Values
	$royal_shop_slide_content = get_theme_mod( $royal_shop_slide_content_id, $default );
		if ( ! empty( $royal_shop_slide_content ) ) :
			$royal_shop_slide_content = json_decode( $royal_shop_slide_content );
			if ( ! empty( $royal_shop_slide_content) ) {
				foreach ( $royal_shop_slide_content as $slide_item ) :
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
					$logo_image = ! empty( $slide_item->logo_image_url ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->logo_image_url, 'Top Slider section' ) : '';
					$title  = ! empty( $slide_item->title ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->title, 'Top Slider section' ) : '';
					$subtitle  = ! empty( $slide_item->subtitle ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->subtitle, 'Top Slider section' ) : '';
					$text   = ! empty( $slide_item->text ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->text, 'Top Slider section' ) : '';
					$link   = ! empty( $slide_item->link ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
			?>	
			<?php if($image!==''):?>
		                    <div>
                              <img data-u="image" src="<?php echo esc_url($image); ?>" />
                               <div class="slide-content-wrap">
                                <div class="slide-content">
                                  <div class="logo">
                                  	<img src="<?php echo esc_url($logo_image); ?>">
                                  </div>
                                  <h2><?php echo esc_html($title); ?></h2>
                                  <p><?php echo esc_html($subtitle); ?></p>
                                  <?php if($text!==''): ?>
                                  <a class="slide-btn" href="<?php echo esc_url($link); ?>"><?php echo esc_html($text); ?></a>
                                  <?php endif; ?>
                                </div>
                              </div>
                            </div>
	
			<?php	
				endif;
				endforeach;			
			} // End if().
		
	endif;	
}
//Single Slider ontent output function layout 5
function royal_shop_top_single_slider_content( $royal_shop_slide_content_id, $default ){
//passing the seeting ID and Default Values
	$royal_shop_slide_content = get_theme_mod( $royal_shop_slide_content_id, $default );
		if ( ! empty( $royal_shop_slide_content ) ) :
			$royal_shop_slide_content = json_decode( $royal_shop_slide_content );
			if ( ! empty( $royal_shop_slide_content) ) {
				foreach ( $royal_shop_slide_content as $slide_item ) :
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
					$link   = ! empty( $slide_item->link ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
					$title  = ! empty( $slide_item->title ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->title, 'Top Slider section' ) : '';
					$subtitle  = ! empty( $slide_item->subtitle ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->subtitle, 'Top Slider section' ) : '';
					$text   = ! empty( $slide_item->text ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->text, 'Top Slider section' ) : '';
			?>	
			<?php if($image!==''):?>
		                    <div class="wzta-slide-wrap">
                              <img data-u="image" src="<?php echo esc_url($image); ?>" />
                               <a  href="<?php echo esc_url($link); ?>" class="wzta-slider-link">
                               	<?php if ($subtitle!='' || $title!='' || $text != '') { ?>   
                               	<span class="wzta-slide-content-wrap" >
                               	<h5 class="wzta-slide-subtitle"><?php echo esc_html($subtitle); ?></h5>
                               	<h2 class="wzta-slide-title"><?php echo esc_html($title); ?></h2>
                               	<h4 class="wzta-slide-button"><?php echo esc_html($text); ?></h4>
                               </span>
                                <?php } ?>
                               </a>
                            </div>
	
			<?php	
				endif;
				endforeach;			
			} // End if().
		
	endif;	
}
// slider layout 2
function royal_shop_top_slider_2_content( $royal_shop_slide_content_id, $default ){
//passing the seeting ID and Default Values
	$royal_shop_slide_content = get_theme_mod( $royal_shop_slide_content_id, $default );
		if ( ! empty( $royal_shop_slide_content ) ) :
			$royal_shop_slide_content = json_decode( $royal_shop_slide_content );
			if ( ! empty( $royal_shop_slide_content) ) {
				foreach ( $royal_shop_slide_content as $slide_item ) :
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->image_url, 'Top Slider section' ) : '';
					$logo_image = ! empty( $slide_item->logo_image_url ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->logo_image_url, 'Top Slider section' ) : '';
					$title  = ! empty( $slide_item->title ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->title, 'Top Slider section' ) : '';
					$subtitle  = ! empty( $slide_item->subtitle ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->subtitle, 'Top Slider section' ) : '';
					$text   = ! empty( $slide_item->text ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->text, 'Top Slider section' ) : '';
					$link   = ! empty( $slide_item->link ) ? apply_filters( 'royal_shop_translate_single_string', $slide_item->link, 'Top Slider section' ) : '';
			?>	
			<?php if($image!==''):?>
                   <div class="wzta-to2-slide-list">
                    <img src="<?php echo esc_url($image); ?>">
                    <div class="slider-content-caption">
                        <h2 data-animation-in="fadeInLeft" data-animation-out="animate-out fadeInRight"><?php echo esc_html($title); ?></h2>
                        <p class="animated delay-1s" data-animation-in="fadeInLeft" data-animation-out="animate-out fadeInRight"><?php echo esc_html($subtitle); ?></p>
                         <?php if($text!==''): ?>
                       <a class="slide-btn" href="<?php echo esc_url($link); ?>"><?php echo esc_html($text); ?></a>
                        <?php endif;?>
                    </div>
                  </div>
			<?php	
				endif;
			endforeach;			
			} // End if().
		
	endif;	
}
 /***************************/
 // Custom section one
 /****************************/
 /**
 * Function to get custom section widget
 */
if ( ! function_exists( 'royal_shop_custom_one_markup' ) ){	
function royal_shop_custom_one_markup(){ ?>
<?php 
$royal_shop_custom_section1_widget_layout  = get_theme_mod( 'royal_shop_custom_section1_widget_layout','cs-1-1');
?>	
<div class="widget-cs">
		 	<div class="widget-cs-bar <?php echo esc_attr($royal_shop_custom_section1_widget_layout);?>">
		       
			      <div class="widget-cs-container">
			      	<?php if($royal_shop_custom_section1_widget_layout=='cs-1-1'):?>
		             <div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('first-customsec-1' ) ){
                                       dynamic_sidebar('first-customsec-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($royal_shop_custom_section1_widget_layout=='cs-1-2'): ?>
                      	<div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('first-customsec-1' ) ){
                                       dynamic_sidebar('first-customsec-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col2"><?php if( is_active_sidebar('first-customsec-2' ) ){
                                       dynamic_sidebar('first-customsec-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($royal_shop_custom_section1_widget_layout=='cs-1-3'): ?>
                      	<div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('first-customsec-1' ) ){
                                       dynamic_sidebar('first-customsec-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col2"><?php if( is_active_sidebar('first-customsec-2' ) ){
                                       dynamic_sidebar('first-customsec-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col3"><?php if( is_active_sidebar('first-customsec-3' ) ){
                                       dynamic_sidebar('first-customsec-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>

                  <?php elseif($royal_shop_custom_section1_widget_layout=='cs-1-4'): ?>
                      	<div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('first-customsec-1' ) ){
                                       dynamic_sidebar('first-customsec-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col2"><?php if( is_active_sidebar('first-customsec-2' ) ){
                                       dynamic_sidebar('first-customsec-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col3"><?php if( is_active_sidebar('first-customsec-3' ) ){
                                       dynamic_sidebar('first-customsec-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                      <div class="widget-cs-col4"><?php if( is_active_sidebar('first-customsec-4' ) ){
                                       dynamic_sidebar('first-customsec-4' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>

                  <?php endif;?>
		        </div> <!-- widget-cs-container End -->
		 
	</div>
</div> 
<?php }
}


/***************************/
 // Custom section Two
 /****************************/
 /**
 * Function to get custom section widget
 */
if ( ! function_exists( 'royal_shop_custom_two_markup' ) ){	
function royal_shop_custom_two_markup(){ ?>
<?php 
$royal_shop_custom_section2_widget_layout  = get_theme_mod( 'royal_shop_custom_section2_widget_layout','cs-2-1');
?>	
<div class="widget-cs">
		 	<div class="widget-cs-bar <?php echo esc_attr($royal_shop_custom_section2_widget_layout);?>">
		       
			      <div class="widget-cs-container">
			      	<?php if($royal_shop_custom_section2_widget_layout=='cs-2-1'):?>
		             <div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('second-customsec-1' ) ){
                                       dynamic_sidebar('second-customsec-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($royal_shop_custom_section2_widget_layout=='cs-2-2'): ?>
                      	<div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('second-customsec-1' ) ){
                                       dynamic_sidebar('second-customsec-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col2"><?php if( is_active_sidebar('second-customsec-2' ) ){
                                       dynamic_sidebar('second-customsec-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($royal_shop_custom_section2_widget_layout=='cs-2-3'): ?>
                      	<div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('second-customsec-1' ) ){
                                       dynamic_sidebar('second-customsec-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col2"><?php if( is_active_sidebar('second-customsec-2' ) ){
                                       dynamic_sidebar('second-customsec-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col3"><?php if( is_active_sidebar('second-customsec-3' ) ){
                                       dynamic_sidebar('second-customsec-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($royal_shop_custom_section2_widget_layout=='cs-2-4'): ?>
                      	<div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('second-customsec-1' ) ){
                                       dynamic_sidebar('second-customsec-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col2"><?php if( is_active_sidebar('second-customsec-2' ) ){
                                       dynamic_sidebar('second-customsec-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col3"><?php if( is_active_sidebar('second-customsec-3' ) ){
                                       dynamic_sidebar('second-customsec-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                      <div class="widget-cs-col4"><?php if( is_active_sidebar('second-customsec-4' ) ){
                                       dynamic_sidebar('second-customsec-4' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                    
                      
		            
		           
                  
                  <?php endif;?>
		        </div> <!-- widget-cs-container End -->
		 
	</div>
</div> 
<?php }
}

/***************************/
 // Custom section Three
 /****************************/
 /**
 * Function to get custom section widget
 */
if ( ! function_exists( 'royal_shop_custom_three_markup' ) ){	
function royal_shop_custom_three_markup(){ ?>
<?php 
$royal_shop_custom_section3_widget_layout  = get_theme_mod( 'royal_shop_custom_section3_widget_layout','cs-3-1');
?>	
<div class="widget-cs">
		 	<div class="widget-cs-bar <?php echo esc_attr($royal_shop_custom_section3_widget_layout);?>">
		       
			      <div class="widget-cs-container">
			      	<?php if($royal_shop_custom_section3_widget_layout=='cs-3-1'):?>
		             <div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('third-customsec-1' ) ){
                                       dynamic_sidebar('third-customsec-1' );
                             }else{ ?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($royal_shop_custom_section3_widget_layout=='cs-3-2'): ?>
                      	<div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('third-customsec-1' ) ){
                                       dynamic_sidebar('third-customsec-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col2"><?php if( is_active_sidebar('third-customsec-2' ) ){
                                       dynamic_sidebar('third-customsec-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($royal_shop_custom_section3_widget_layout=='cs-3-3'): ?>
                      	<div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('third-customsec-1' ) ){
                                       dynamic_sidebar('third-customsec-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col2"><?php if( is_active_sidebar('third-customsec-2' ) ){
                                       dynamic_sidebar('third-customsec-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col3"><?php if( is_active_sidebar('third-customsec-3' ) ){
                                       dynamic_sidebar('third-customsec-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($royal_shop_custom_section3_widget_layout=='cs-3-4'): ?>
                      	<div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('third-customsec-1' ) ){
                                       dynamic_sidebar('third-customsec-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col2"><?php if( is_active_sidebar('third-customsec-2' ) ){
                                       dynamic_sidebar('third-customsec-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col3"><?php if( is_active_sidebar('third-customsec-3' ) ){
                                       dynamic_sidebar('third-customsec-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                       <div class="widget-cs-col4"><?php if( is_active_sidebar('third-customsec-4' ) ){
                                       dynamic_sidebar('third-customsec-4' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>

                  <?php endif;?>
		        </div> <!-- widget-cs-container End -->
		 
	</div>
</div> 
<?php }
}

/***************************/
 // Custom section Four
 /****************************/
 /**
 * Function to get custom section widget
 */
if ( ! function_exists( 'royal_shop_custom_four_markup' ) ){	
function royal_shop_custom_four_markup(){ ?>
<?php 
$royal_shop_custom_section4_widget_layout  = get_theme_mod( 'royal_shop_custom_section4_widget_layout','cs-4-1');
?>	
<div class="widget-cs">
		 	<div class="widget-cs-bar <?php echo esc_attr($royal_shop_custom_section4_widget_layout);?>">
		       
			      <div class="widget-cs-container">
			      	<?php if($royal_shop_custom_section4_widget_layout=='cs-4-1'):?>
		             <div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('four-customsec-1' ) ){
                                       dynamic_sidebar('four-customsec-1' );
                             }else{ ?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($royal_shop_custom_section4_widget_layout=='cs-4-2'): ?>
                      	<div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('four-customsec-1' ) ){
                                       dynamic_sidebar('four-customsec-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col2"><?php if( is_active_sidebar('four-customsec-2' ) ){
                                       dynamic_sidebar('four-customsec-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($royal_shop_custom_section4_widget_layout=='cs-4-3'): ?>
                      	<div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('four-customsec-1' ) ){
                                       dynamic_sidebar('four-customsec-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col2"><?php if( is_active_sidebar('four-customsec-2' ) ){
                                       dynamic_sidebar('four-customsec-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col3"><?php if( is_active_sidebar('four-customsec-3' ) ){
                                       dynamic_sidebar('four-customsec-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($royal_shop_custom_section4_widget_layout=='cs-4-4'): ?>
                      	<div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('four-customsec-1' ) ){
                                       dynamic_sidebar('four-customsec-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col2"><?php if( is_active_sidebar('four-customsec-2' ) ){
                                       dynamic_sidebar('four-customsec-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col3"><?php if( is_active_sidebar('four-customsec-3' ) ){
                                       dynamic_sidebar('four-customsec-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                      <div class="widget-cs-col4"><?php if( is_active_sidebar('four-customsec-4' ) ){
                                       dynamic_sidebar('four-customsec-4' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>

                  <?php endif;?>
		        </div> <!-- widget-cs-container End -->
		 
	</div>
</div> 
<?php }
}
/***************************/
 // Custom section Five
 /****************************/
 /**
 * Function to get custom section widget
 */
if ( ! function_exists( 'royal_shop_custom_five_markup' ) ){	
function royal_shop_custom_five_markup(){ ?>
<?php 
$royal_shop_custom_section5_widget_layout  = get_theme_mod( 'royal_shop_custom_section5_widget_layout','cs-5-1');
?>	
<div class="widget-cs">
		 	<div class="widget-cs-bar <?php echo esc_attr($royal_shop_custom_section5_widget_layout);?>">
		       
			      <div class="widget-cs-container">
			      	<?php if($royal_shop_custom_section5_widget_layout=='cs-5-1'):?>
		             <div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('five-customsec-1' ) ){
                                       dynamic_sidebar('five-customsec-1' );
                             }else{ ?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($royal_shop_custom_section5_widget_layout=='cs-5-2'): ?>
                      	<div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('five-customsec-1' ) ){
                                       dynamic_sidebar('five-customsec-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col2"><?php if( is_active_sidebar('five-customsec-2' ) ){
                                       dynamic_sidebar('five-customsec-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($royal_shop_custom_section5_widget_layout=='cs-5-3'): ?>
                      	<div class="widget-cs-col1">
		             	<?php if( is_active_sidebar('five-customsec-1' ) ){
                                       dynamic_sidebar('five-customsec-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col2"><?php if( is_active_sidebar('five-customsec-2' ) ){
                                       dynamic_sidebar('five-customsec-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-cs-col3"><?php if( is_active_sidebar('five-customsec-3' ) ){
                                       dynamic_sidebar('five-customsec-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>

                  <?php endif;?>
		        </div> <!-- widget-cs-container End -->
		 
	</div>
</div> 
<?php }
}

// Mobile Menu Wrapper Add.
function royal_shop_mobile_menu_wrap(){
echo '<div class="royal-shop-mobile-menu-wrapper"></div>';
}
add_action( 'wp_footer', 'royal_shop_mobile_menu_wrap' );

function royal_shop_wp_is_mobile() {
    static $is_mobile;
if (
        strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false ) {
            $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
            $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
        $is_mobile = false;
    } else {
        $is_mobile = false;
    }
    return $is_mobile;
}
/*************************/
//Get Page Title
/*************************/
function royal_shop_get_page_title(){ ?>
			<?php if(is_search()){ ?> 
            <h2 class="wzta-page-top-title entry-title">
              	<?php printf( __( 'Search Results for: %s', 'royal-shop' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>

			<?php }elseif (royal_shop_is_blog() && !is_single() && !is_archive()){
				if( !(is_front_page()) ){
                    $our_title = get_the_title( get_option('page_for_posts', true) );
			echo '<h1 class="wzta-page-top-title entry-title">'.esc_html($our_title).'</h1>'; ?>
			<?php }else{
			echo'<h1 class="wzta-page-top-title entry-title">'.esc_html__('Blog','royal-shop').'</h1>'; ?>
			<?php }	 
			 }elseif(is_archive() && (class_exists( 'WooCommerce' ) && !is_shop())){
                   echo the_archive_title('<h1 class="wzta-page-top-title entry-title">','</h1>'); ?>
			<?php }elseif(class_exists( 'WooCommerce' ) && is_shop()) { ?>
				<h1 class="wzta-page-top-title entry-title"><?php woocommerce_page_title(); ?></h1> 
			<?php }elseif(is_page()) { 
				echo the_title('<h1 class="wzta-page-top-title entry-title">','</h1>'); ?>
			<?php } ?>
   <?php 
}

/**************************/
// Dynamic Social Link
/**************************/
function royal_shop_social_links(){
$social='';
$original_color = get_theme_mod('royal_shop_social_original_color',false);
if($original_color==true){
$class_original='original-social-icon';
}else{
$class_original='';	
}
$social.='<ul class="social-icon ' .esc_attr($class_original). ' ">';
if($f_link = get_theme_mod('royal_shop_social_link_facebook','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($f_link).'"><i class="fa fa-facebook"></i></a></li>';
endif;
if($l_link = get_theme_mod('royal_shop_social_link_linkedin','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($l_link).'"><i class="fa fa-linkedin"></i></a></li>';
endif;
if($p_link = get_theme_mod('royal_shop_social_link_pintrest','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($p_link).'"><i class="fa fa-pinterest"></i></a></li>';
endif;
if($t_link = get_theme_mod('royal_shop_social_link_twitter','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($t_link).'"><i class="fa fa-twitter"></i></a></li>';
endif;
if($insta_link = get_theme_mod('royal_shop_social_link_insta','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($insta_link).'"><i class="fa fa-instagram"></i></a></li>';
endif;
if($tum_link = get_theme_mod('royal_shop_social_link_tumblr','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($tum_link).'"><i class="fa fa-tumblr"></i></a></li>';
endif;
if($y_link = get_theme_mod('royal_shop_social_link_youtube','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($y_link).'"><i class="fa fa-youtube-play"></i></a></li>';
endif;
if($stumb_link = get_theme_mod('royal_shop_social_link_stumbleupon','#')):
	$social.='<li><a target="_blank" href="'.esc_url($stumb_link).'">
	 <i class="fa fa-stumbleupon"></i></a></li>';
endif;
if($dribble_link = get_theme_mod('royal_shop_social_link_dribble','#')):
	$social.='<li><a target="_blank" href="'.esc_url($dribble_link).'">
	 <i class="fa fa-dribbble"></i></a></li>';
endif;
$social.='</ul>';
return $social;
}


/******************************/
//Sticky sidebar function
/******************************/
function royal_shop_stick_sidebar($class){
            $royal_shop_sticky_sidebar = get_theme_mod( 'royal_shop_sticky_sidebar');
            if ($royal_shop_sticky_sidebar){
                $class = 'royalshop-sticky-sidebar';
            }
            return $class;
}
add_filter( 'royal_shop_stick_sidebar_class','royal_shop_stick_sidebar', 999 );

//custom function conditional check for blog page
function is_blog (){
    return ( is_archive() || is_author() || is_category() || is_home() || is_tag()) && 'post' == get_post_type();
}
///////////////////////
//service content output function
///////////////////////
function royal_shop_service_content( $royal_shop_service_content_id, $default ) {
	$service_count = 0;
//passing the setting ID and Default Values

$royal_shop_service_content= get_theme_mod( $royal_shop_service_content_id, $default );
		if ( ! empty( $royal_shop_service_content ) ) :
			$royal_shop_service_content = json_decode( $royal_shop_service_content );
			if ( ! empty( $royal_shop_service_content ) ) {
				foreach ( $royal_shop_service_content as $service_item ) :
					$icon   = ! empty( $service_item->icon_value ) ? apply_filters( 'royal_shop_translate_single_string', $service_item->icon_value, 'Service section' ) : '';

					$title  = ! empty( $service_item->title ) ? apply_filters( 'royal_shop_translate_single_string', $service_item->title, 'Service section' ) : '';
					$text   = ! empty( $service_item->text ) ? apply_filters( 'royal_shop_translate_single_string', $service_item->text, 'Service section' ) : '';
					$link   = ! empty( $service_item->link ) ? apply_filters( 'royal_shop_translate_single_string', $service_item->link, 'Service section' ) : '';
					$color  = ! empty( $service_item->color ) ? $service_item->color : '';
					$service_count = ++$service_count;
					?>
				
		<div class="wzta-service-post">
			<div class="wzta-service-icon">
				<i class="<?php echo "fa ".esc_attr($icon); ?>" style="color: <?php echo esc_attr($color); ?>">
					
				</i>
			</div>
			<?php 
			$anchor_onclick = true;
			if ($link == '') {
					$anchor_onclick = false;
				} 
				else{
					$anchor_onclick = true;
				}
				?>
				<a href="<?php echo esc_url($link); ?>" onclick="return <?php echo esc_js(json_encode($anchor_onclick)); ?>">
					<h2 class="wzta-service-title">
						<?php echo esc_html($title); ?>
					</h2> 
				</a>
					<p class="wzta-service-description">
						<?php echo esc_html($text); ?>
					</p>
		</div> <!-- wzta-service-post End -->
	
			<?php		
				endforeach;			
			} // End if().
		
	endif;	
	return $service_count;
}

//testimonials content output function
function royal_shop_testimonials_content( $royal_shop_testimonials_content_id, $default ) {
//passing the setting ID and Default Values

	$royal_shop_testimonials_content= get_theme_mod( $royal_shop_testimonials_content_id, $default );
		
		if ( ! empty( $royal_shop_testimonials_content ) ) :
			$royal_shop_testimonials_content = json_decode( $royal_shop_testimonials_content );
			
			if ( ! empty( $royal_shop_testimonials_content ) ) {
				foreach ( $royal_shop_testimonials_content as $testimonials_item ) :

					$image = ! empty( $testimonials_item->image_url ) ? apply_filters( 'royal_shop_translate_single_string', $testimonials_item->image_url, 'Testimonials section' ) : '';

					$title  = ! empty( $testimonials_item->title ) ? apply_filters( 'royal_shop_translate_single_string', $testimonials_item->title, 'Testimonials section' ) : '';
					
					$subtitle = ! empty( $testimonials_item->subtitle ) ? apply_filters( 'royal_shop_translate_single_string', $testimonials_item->subtitle, 'Testimonials section' ) : '';

					$text   = ! empty( $testimonials_item->text ) ? apply_filters( 'royal_shop_translate_single_string', $testimonials_item->text, 'Testimonials section' ) : '';
					$link   = ! empty( $testimonials_item->link ) ? apply_filters( 'royal_shop_translate_single_string', $testimonials_item->link, 'Testimonials section' ) : '';
					?>
				
		<div class="testimonial-post">
         	<div class="testimonial-author">
        		<div class="testimonial-author-image">
             		<img src="<?php echo esc_url($image); ?>"/>
             	</div>
             	
             	<div class="testimonial-author-vcard">
             		<h3 class="testimonial-name"><?php echo esc_html($title); ?>
             		</h3>
             		<h5 class="testimonial-position"><?php echo esc_html($subtitle); ?></h5>
             	</div><!--.........testimonial-author-vcard end......-->
            </div><!--........testimonial-author.........-->
             
             <div class="tetsimonial-content">
             	<p class="wzta-tetsimonial-description"><?php echo esc_html($text); ?></p>
             </div>
         </div><!--..........testimonial-post END............-->
	
			<?php		
				endforeach;			
			} // End if().
		
	endif;	
}


//team content output function
function royal_shop_team_content( $royal_shop_team_content_id, $default ) {
//passing the setting ID and Default Values
$team_count = 0;
	$royal_shop_team_content= get_theme_mod( $royal_shop_team_content_id, $default );
		
		if ( ! empty( $royal_shop_team_content ) ) :
			$royal_shop_team_content = json_decode( $royal_shop_team_content );
			
			if ( ! empty( $royal_shop_team_content ) ) {
				foreach ( $royal_shop_team_content as $team_item ) :

					$image = ! empty( $team_item->image_url ) ? apply_filters( 'royal_shop_translate_single_string', $team_item->image_url, 'Team section' ) : '';

					$title  = ! empty( $team_item->title ) ? apply_filters( 'royal_shop_translate_single_string', $team_item->title, 'Team section' ) : '';
					
					$subtitle = ! empty( $team_item->subtitle ) ? apply_filters( 'royal_shop_translate_single_string', $team_item->subtitle, 'Team  section' ) : '';

					$link   = ! empty( $team_item->link ) ? apply_filters( 'royal_shop_translate_single_string', $team_item->link, 'Team section' ) : '';
					$team_count = ++$team_count;
					?>
				
		<div class="wzta-team-post">
			<div class="wzta-team-img">
					<img src="<?php echo esc_url($image); ?>"/>
				<div class="wzta-team-img-overlay">	
					<div class="wzta-team-description">
						<ul class="wzta-team-social">		
							<?php 
if ( ! empty( $team_item->social_repeater ) ) :
$icons = html_entity_decode( $team_item->social_repeater );
$icons_decoded = json_decode( $icons, true );
if ( ! empty( $icons_decoded ) ) :
				foreach ($icons_decoded as $key => $value) {
				$social_icon = ! empty( $value['icon'] ) ? apply_filters( '
					royal_shop_translate_single_string', $value['icon'], 'Team section' ) : '';
					$social_link = ! empty( $value['link'] ) ? apply_filters( 'royal_shop_translate_single_string', $value['link'], 'Team section' ) : '';	
					if ( ! empty( $social_icon ) ) {
					?>
					<li><a href="#" target="_blank">
					<i class="fa <?php echo esc_attr($social_icon); ?>"></i></a></li>
					<?php
					}
					}
					endif;
					endif;
						?>
					</ul>
				<div class="wzta-team-info">
					<a href="<?php echo esc_html($link); ?>" class="wzta-team-link">
					<div class="wzta-team-heading">
					<span class="wzta-team-name">
						<?php echo esc_html( $title); ?>
					</span>
					<span class="wzta-team-position">
						<?php echo esc_html($subtitle); ?>
					</span>
					</div><!--......wzta-team-heading END.......-->
					</a>
				</div>
				</div> <!--......wzta-team-description END.....-->
				</div> <!--.......wzta-team-img-overlay END......-->
			</div> <!--.......wzta-team-img END........-->	
		</div> <!--.......wzta-team-post END........-->
	
			<?php	
				
				endforeach;			
			} // End if().
		
	endif;	
	return $team_count;
}


//counter content output function
function royal_shop_counter_content( $royal_shop_counter_content_id, $default ) {
//passing the setting ID and Default Values

$royal_shop_counter_content= get_theme_mod( $royal_shop_counter_content_id, $default );
		if ( ! empty( $royal_shop_counter_content ) ) :
			$royal_shop_counter_content = json_decode( $royal_shop_counter_content );
			if ( ! empty( $royal_shop_counter_content ) ) {
				foreach ( $royal_shop_counter_content as $counter_item ) :

					$title  = ! empty( $counter_item->title ) ? apply_filters( 'royal_shop_translate_single_string', $counter_item->title, 'Counter section' ) : '';
					
					$number  = ! empty( $counter_item->number ) ? apply_filters( 'royal_shop_translate_single_string', $counter_item->number, 'Counter section' ) : '';
					?>
				
	<div class="counter-content">
       	<div class='numscroller numscroller-big-bottom wzta-scroller' data-slno='1' data-min='0' data-max='<?php echo esc_attr($number); ?>' data-delay='10' data-increment="9">0
       	</div>
       		<span class="counter-category wzta-counter-title" >
       			<?php echo esc_html($title); ?>	
       		</span>
    </div>
	
			<?php		
				endforeach;			
			} // End if().
		
	endif;	
}

/*****************************/
//add class active
function royal_shop_body_classes( $classes ){
if(class_exists( 'WooCommerce' )):
$classes[] = 'woocommerce';
endif;
$royal_shop_color_scheme = get_theme_mod( 'royal_shop_color_scheme','opn-light' );
        if ( $royal_shop_color_scheme == 'opn-dark' ){

            	 $classes[] = 'royal-shop-dark';
         }
         if ( $royal_shop_color_scheme == 'opn-light' ){

            	 $classes[] = 'royal-shop-light';
         }
return $classes;
}
add_filter( 'body_class', 'royal_shop_body_classes' );

// sideabr function for internal pages
function royal_shop_pages_sidebar(){
$royal_shop_sidebar_ineternal_option = get_theme_mod('royal_shop_sidebar_ineternal_option','active-sidebar');
return $royal_shop_sidebar_ineternal_option;
}

// default size in upload image
function royal_shop_attachment_display_settings() {
    update_option( 'image_default_size', 'large' );
}
add_action( 'after_setup_theme', 'royal_shop_attachment_display_settings' );
function zita_get_pro_url( $url, $source = '', $medium = '', $campaign = '' ) {

		$url = trailingslashit( $url );

		// Set up our URL if we have a source.
		if ( isset( $source ) ) {
			$url = add_query_arg( 'utm_source', sanitize_text_field( $source ), $url );
		}
		// Set up our URL if we have a medium.
		if ( isset( $medium ) ) {
			$url = add_query_arg( 'utm_medium', sanitize_text_field( $medium ), $url );
		}
		// Set up our URL if we have a campaign.
		if ( isset( $campaign ) ) {
			$url = add_query_arg( 'utm_campaign', sanitize_text_field( $campaign ), $url );
		}

		return esc_url( $url );
	}