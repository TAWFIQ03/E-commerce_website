<?php
/**
 * This file manages the customizer font settings. Sets the font to user selected
 */
//Dynamic Font
function kaira_dynamic_css_cb(){


	$kaira_fonts = get_theme_mod('kaira_header_font_setting', 'source_sans_pro');
	$kaira_body_fonts = get_theme_mod('kaira_body_font_setting', 'source_sans_pro');
	
	if ($kaira_fonts == 'source_sans_pro') {
		$kaira_body_font_head = "Source Sans Pro";
	}
	if ($kaira_fonts == 'ubuntu') {
		$kaira_body_font_head = "Ubuntu";
	}
	if ($kaira_fonts == 'lato'){
		$kaira_body_font_head ="Lato";
	}
	if ($kaira_fonts == 'roboto'){
		$kaira_body_font_head ="Roboto";
	}
	if ($kaira_fonts == 'open-sans'){
		$kaira_body_font_head = 'Open Sans';
	}

	echo "<style type='text/css' media='all'>"; ?>

    .site-header .site-branding .site-title a{
	   font-family: '<?php echo esc_attr( $kaira_body_font_head ); ?>', sans-serif;
	}
	.site-header .main-navigation li{
		font-family: '<?php echo esc_attr($kaira_body_font_head ); ?>', sans-serif;
	}
	h2{
		font-family: '<?php echo esc_attr($kaira_body_font_head ); ?>', sans-serif !important;
	}
	h1{
		font-family: '<?php echo esc_attr($kaira_body_font_head ); ?>', sans-serif !important;
	}
       
    .top-section .column .entry-title  {
    	font-family: '<?php echo esc_attr($kaira_body_font_head ); ?>', sans-serif;
    }
    .slider .banner-text .text h2 a {
    	font-family: '<?php echo esc_attr($kaira_body_font_head ); ?>', sans-serif;
    }

    .widget-area .widget h2.widget-title {
    	font-family: '<?php echo esc_attr($kaira_body_font_head ); ?>', sans-serif !important;
    }

    .site-content .content-area .text-holder .entry-header .entry-title {
    	font-family: '<?php echo esc_attr($kaira_body_font_head ); ?>', sans-serif;
    }
    .site-content .content-area .text-holder .entry-header .entry-title a, visited {
    	font-family: '<?php echo esc_attr($kaira_body_font_head ); ?>', sans-serif;
    }        
    
	.site-content .content-area .page .entry-header .entry-title, 
	.site-content .content-area .post .entry-header .entry-title   {
    	font-family: '<?php echo esc_attr($kaira_body_font_head ); ?>', sans-serif !important;
    }            

    <?php echo "</style>";
    if ($kaira_body_fonts == 'open-sans') {
		$kaira_body_font = "Open Sans";
	}
	if ($kaira_body_fonts == 'ubuntu') {
		$kaira_body_font = "Ubuntu";
	}
	if ($kaira_body_fonts == 'lato'){
		$kaira_body_font ="Lato";
	}
	if ($kaira_body_fonts == 'roboto'){
		$kaira_body_font ="Roboto";
	}
	if ($kaira_body_fonts == 'source_sans_pro'){
		$kaira_body_font ="Source Sans Pro";
	}

	echo "<style type='text/css' media='all'>"; ?>
    body{
    	font-family: '<?php echo esc_attr($kaira_body_font); ?>', sans-serif;
    }
    p{
    	font-family: '<?php echo esc_attr($kaira_body_font); ?>', sans-serif !important;
    }
    
    .widget-area .widget ul li a {
    	font-family: '<?php echo esc_attr($kaira_body_font); ?>', sans-serif;
    }
    
    .slider .banner-text .text .category a {
    	font-family: '<?php echo esc_attr($kaira_body_font); ?>', sans-serif;
    }

    .site-footer .site-info .copyright, .site-footer .site-info .powered, .site-footer .site-info .designed{
  		font-family: '<?php echo esc_attr($kaira_body_font); ?>', sans-serif !important;
  		}
    <?php echo "</style>";
}
add_action( 'wp_head', 'kaira_dynamic_css_cb', 100 );

//Color Customization
function kaira_customized_css(){ ?>

		<style type="text/css">
			
			.site-header { 
				background-color: <?php echo esc_attr(get_theme_mod( 'kaira_header_color', '#FFFFFF')); ?>; 
			}
			.site-branding, .site-branding .site-title a { color: <?php echo esc_attr(get_theme_mod( 'kaira_headertext_color', '#000000' ) ); ?>; }
			.slider .banner-text .text .category a { color: <?php echo esc_attr(get_theme_mod( 'kaira_category_link_color', '#BD15CF' )); ?>; }
			.site-content .content-area .text-holder .entry-header .category a { color: <?php echo esc_attr(get_theme_mod( 'kaira_category_link_color', '#BD15CF' )); ?>; }
			.site-content .content-area .post .entry-header .category a { color: <?php echo esc_attr(get_theme_mod( 'kaira_category_link_color', '#BD15CF' )); ?>; }
			.comment-form input[type="submit"] { background: <?php echo esc_attr(get_theme_mod( 'kaira_button_color', '#0F89DB' )); ?>; }
			.slider .banner-text .text .read-more { background: <?php echo esc_attr(get_theme_mod( 'kaira_button_color', '#0F89DB' )); ?>; }
			.site-content .content-area .text-holder .entry-footer .read-more { background: <?php echo esc_attr(get_theme_mod( 'kaira_button_color', '#0F89DB' )); ?>; }
			.btn-default {  background: <?php echo esc_attr(get_theme_mod( 'kaira_button_color', '##0F89DB' )); ?>; }
			.site-header .main-navigation li a { color: <?php echo esc_attr(get_theme_mod( 'kaira_nav_link_color', '#373737' )); ?>; }
		</style>

		<?php }

		add_action( 'wp_head', 'kaira_customized_css' );

//Custom Background Activation
function kaira_custom_bg() {

	if ( get_background_image() != '' ) {
		?>

		<style type="text/css">
			.site-content, .site-header {
				background-color: transparent !important;
			}

			
		</style>
	<?php
	}
}
add_action( 'wp_head', 'kaira_custom_bg' );
