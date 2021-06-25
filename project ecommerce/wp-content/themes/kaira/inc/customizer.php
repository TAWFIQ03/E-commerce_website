<?php
/**
 * kaira Theme Customizer
 *
 * @package kaira
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kaira_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';	
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-header .site-branding .site-title a',
			'render_callback' => 'kaira_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'kaira_customize_partial_blogdescription',
		) );
	}


	/**
	 * Main Panel for Customization
	 */
	$wp_customize->add_panel(
	'kaira_main_panel',
	array(
		'title'            => esc_html__('Theme Options', 'kaira'),
		'priority'         => 70
		)
	);

	/*
	 * Slider Controls
	 */
	$wp_customize->add_section( 'kaira_slider', array(
		'title'		  => esc_html__( 'Slider', 'kaira' ),
		'priority'	  => 201,
		'panel' 	  => 'kaira_main_panel'
	) );

	//Checkbox
	$wp_customize->add_setting( 'kaira_slider_settings', array(
		'default'           => 0,
		'sanitize_callback' => 'kaira_sanitize_checkbox',
		) );

	$wp_customize->add_control( 'kaira_slider_settings_control', array(
		'label'             => esc_html__( 'Display Slider at the Front Page.', 'kaira' ),
		'section'           => 'kaira_slider',
		'settings'			=> 'kaira_slider_settings',
		'type'              => 'checkbox',
		) );

	//Tag selection
	$wp_customize->add_setting( 'kaira_slider_tag', array(
			'default'           => ' ',
			'sanitize_callback' => 'kaira_sanitize_terms',
		) );

	$wp_customize->add_control( 'kaira_slider_tag', array(
		'label'             => esc_html__( 'Select Tag For Slider Posts', 'kaira' ),
		'description'		=> esc_html__( 'Latest 6 posts from the selected tag will be shown in slider.', 'kaira' ),
		'section'           => 'kaira_slider',
		'type'              => 'select',
		'choices' 			=> kaira_get_terms(),
		) );

	/**
	 * Pagination Controls
	 */
	$wp_customize->add_section( 'kaira_pagination_custom', array(
		'title'	=> esc_html__( 'Pagination Type', 'kaira' ),
		'priority' => 199,
		'panel'	=> 'kaira_main_panel'
	) );

	$wp_customize->add_setting( 'kaira_pagination_type', array(
		'capability'	=> 'edit_theme_options', 
		'default'	=> 'numbered',
		'sanitize_callback'	=> 'kaira_sanitize_select'
		) );

	$wp_customize->add_control( 'kaira_pagination_type',  array(
		'label'		=> esc_html__( 'Custom Pagination Selection', 'kaira' ),
		'section'	=> 'kaira_pagination_custom',
		'description' => esc_html__( 'Select the type of pagination', 'kaira' ),
		'type'	=> 'radio',
		'choices'	=> array(
			'numbered'	=>	esc_html__( 'Numbered (1,2,3...)', 'kaira'),
			'defaulted'	=>	esc_html__( 'Default (Previous/Next)', 'kaira'),
			
		),
		) );

	/**
	 * Featured Post
	 */
	$wp_customize->add_section( 'kaira_front_page', array(
		'title'		  => esc_html__( 'Featured Content Blocks', 'kaira' ),
		'panel'		  => 'kaira_main_panel',
		'priority'	  => 200,
	) );

	//Checkbox
	$wp_customize->add_setting( 'kaira_front_featured_posts', array(
		'default'           => 0,
		'sanitize_callback' => 'kaira_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'kaira_front_control', array(
		'label'             => esc_html__( 'Display Featured Posts at the top of the Front Page.', 'kaira' ),
		'section'           => 'kaira_front_page',
		'settings'			=> 'kaira_front_featured_posts',
		'type'              => 'checkbox',
	) );

	//Label
	$wp_customize->add_setting( 'kaira_front_featured_posts_label', array(
		'transport'			=> 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'kaira_front_featured_posts_label', array(
		'label'             => esc_html__( 'Section Title', 'kaira' ),
		'section'           => 'kaira_front_page',
		'type'              => 'text',
	) );

	//Tag Selection
	$wp_customize->add_setting( 'kaira_featured_term_1', array(
		'default'           => ' ',
		'sanitize_callback' => 'kaira_sanitize_terms',
	) );

	$wp_customize->add_control( 'kaira_featured_term_1', array(
		'label'             => esc_html__( 'Select the tag for feature post', 'kaira' ),
		'description'		=> esc_html__( 'Latest 6 posts from the selected tag will be shown in featured section.', 'kaira' ),
		'section'           => 'kaira_front_page',
		'default'           => ' ',
		'type'              => 'select',
		'choices' 			=> kaira_get_terms(),
	) );


	/**
	 * Related Post customizer
	 */
	$wp_customize->add_section( 'kaira_relation_post', array(
		'title'		  => esc_html__( 'Related Content Blocks', 'kaira' ),
		'panel'		  => 'kaira_main_panel',
		'priority'	  => 200,
	) );

	//Checkbox
	$wp_customize->add_setting( 'kaira_related_posts', array(
		'default'           => 0,
		'sanitize_callback' => 'kaira_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'kaira_related_posts_control', array(
		'label'             => esc_html__( 'Display Related Posts in single post page.', 'kaira' ),
		'section'           => 'kaira_relation_post',
		'settings'			=> 'kaira_related_posts',
		'type'              => 'checkbox',
	) );

	//Label
	$wp_customize->add_setting( 'kaira_related_posts_label', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'kaira_related_posts_label', array(
		'label'             => esc_html__( 'Section Title', 'kaira' ),
		'section'           => 'kaira_relation_post',
		'description'		=> esc_html__( 'Latest 6 posts belonging to the category of current post  will be shown in related section.', 'kaira' ),
		'type'              => 'text',
	) );


	/** 
	 * Custom Colors
	 */
	//Navigarion Color
	$wp_customize->add_setting( 'kaira_nav_link_color', array(
		'default'			=> '#373737',
		'transport'			=> 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'kaira_nav_link_control',
		array(
		'label'		=> esc_html__( 'Navigation Link Color', 'kaira' ),
		'section'	=> 'colors',
		'default'			=> '#373737',
		'settings'	=> 'kaira_nav_link_color',
		'priority'	=>	30,
	) ) );

	//Link Colors
	$wp_customize->add_setting( 'kaira_category_link_color', array(
		'default'			=> '#BD15CF',
		'transport'			=> 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'kaira_category_link_control',
		array(
		'label'		=> esc_html__( 'Category Link Color', 'kaira' ),
		'section'	=> 'colors',
		'settings'	=> 'kaira_category_link_color',
		'priority'	=>	40,
	) ) );

	//Button Colors
	$wp_customize->add_setting( 'kaira_button_color', array(
		'default'			=> '#0F89DB',
		'transport'			=> 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'kaira_button_color_control',
		array(
		'label'		=> esc_html__( 'Button Color', 'kaira' ),
		'section'	=> 'colors',
		'settings'	=> 'kaira_button_color',
		'priority'	=>	30,
	) ) );

	//Header Color
	$wp_customize->add_setting( 'kaira_header_color', array(
		'default'			=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'kaira_header_color_control',
		array(
		'label'		=> esc_html__( 'Header Color', 'kaira' ),
		'section'	=> 'colors',
		'settings'	=> 'kaira_header_color',
		'priority'	=>	10,
	) ) );

	function kaira_sanitize_select( $input, $setting ) {
		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}

	/**
	 * Custom Font Selection
	 */
	//Header Typography
	$wp_customize->add_section(
		'kaira_custom_typography',
		array(
			'title'            =>   esc_html__('Custom Fonts', 'kaira'),
			'panel'            =>   'kaira_main_panel'
			)
		);

	$wp_customize->add_setting(
		'kaira_header_font_setting',
		array(
			'capability'       => 'edit_theme_options',
			'default'          =>  'source_sans_pro',
			'transport'        =>  'refresh',
	        'sanitize_callback' => 'kaira_sanitize_font',
			)
		);

	$wp_customize->add_control(
		'kaira_header_font_control',
		array(
			'type'             => 'select',
			'choices'          => array(
				'lato'            => 'Lato',
				'ubuntu'          => 'Ubuntu',
				'source_sans_pro' => 'Source Sans Pro',
				'roboto'          => 'Roboto',
				'open-sans'       => 'Open Sans'
				),
				'default'          =>  'source_sans_pro',
	            'section'          => 'kaira_custom_typography', // Add a default or your own section
	            'settings'         => 'kaira_header_font_setting',
	            'label'            => esc_html__( 'Headings', 'kaira' ),
	            'description'      => esc_html__( 'This dropdown enables to change the font of all the headings in the site.', 'kaira'),
	            )
		);
		
	$wp_customize->add_setting(
		'kaira_body_font_setting',
		array(
			'capability'       => 'edit_theme_options',
			'default'          =>  'open-sans',
			'transport'        =>  'refresh',
	        'sanitize_callback' => 'kaira_sanitize_font',
			)
		);

	$wp_customize->add_control(
		'kaira_body_font_control',
		array(
			'type'             => 'select',
			'choices'          => array(
				'lato'            => 'Lato',
				'ubuntu'          => 'Ubuntu',
				'source_sans_pro' => 'Source Sans Pro',
				'roboto'          => 'Roboto',
				'open-sans'       => 'Open Sans'
				),
				'default'          =>  'open-sans',
	            'section'          => 'kaira_custom_typography', // Add a default or your own section
	            'settings'         => 'kaira_body_font_setting',
	            'label'            => esc_html__( 'Body Text', 'kaira' ),
	            'description'      => esc_html__( 'This dropdown enables to change the font of the body texts.', 'kaira'),
	            )
		);
	
}
add_action( 'customize_register', 'kaira_customize_register' );

//Info Section
function kaira_customizer_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'theme_info' , array(
		'title'       => esc_html__( 'Information Links' , 'kaira' ),
		'priority'    => 6,
		));

	$wp_customize->add_setting('kaira_info_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));
    
    $theme_info = '';
    $theme_info .= '<span class="sticky_info_row"><a href="' . esc_url( 'http://demo.themethread.com/kaira/' ) . '" target="_blank">' . esc_html__( 'View demo', 'kaira' ) . '</a></span>';
	$theme_info .= '<span class="sticky_info_row"><a href="' . esc_url( 'http://themethread.com/article/kaira-documentation/' ) . '" target="_blank">' . esc_html__( 'View documentation', 'kaira' ) . '</a></span>';
    $theme_info .= '<span class="sticky_info_row"><a href="' . esc_url( 'http://themethread.com/support/' ) . '" target="_blank">' . esc_html__( 'Support Ticket', 'kaira' ) . '</a></span>';
	$theme_info .= '<span class="sticky_info_row"><a href="' . esc_url( 'http://themethread.com/theme/kaira/' ) . '" target="_blank">' . esc_html__( 'More Details', 'kaira' ) . '</a></span>';
	

	$wp_customize->add_control( new kaira_Theme_Info( $wp_customize ,'kaira_info_theme',array(
		'label' => esc_html__( 'About Kaira' , 'kaira' ),
		'section' => 'theme_info',
		'description' => $theme_info
		)));

	$wp_customize->add_setting('kaira_info_more_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));

}
add_action( 'customize_register', 'kaira_customizer_theme_info' );

if( class_exists( 'WP_Customize_control' ) ){

	class kaira_Theme_Info extends WP_Customize_Control
	{
    	/**
       	* Render the content on the theme customizer page
       	*/
       	public function render_content()
       	{
       		?>
       		<label>
       			<strong class="customize-text_editor"><?php echo esc_html( $this->label ); ?></strong>
       			<br />
       			<span class="customize-text_editor_desc">
       				<?php echo wp_kses_post( $this->description ); ?>
       			</span>
       		</label>
       		<?php
       	}
    }//editor close
    
}//class close

/**
 * Sanitization for tags and slugs
 */
if ( ! function_exists( 'kaira_get_terms' ) ) :
/**
 * Return an array of tag names and slugs
 */
function kaira_get_terms() {

	$choices = array( 0 );

	// Default	
	$choices = array( ' ' => esc_html__( 'Select a tag', 'kaira' ) );

	// Post Tags
	$type_terms = get_terms( 'post_tag' );
	if ( ! empty( $type_terms ) ) {
		$type_slugs = wp_list_pluck( $type_terms, 'slug' );
		$type_names = wp_list_pluck( $type_terms, 'name' );
		$type_list = array_combine( $type_slugs, $type_names );
		$choices = $choices + $type_list;
	}

	return apply_filters( 'kaira_get_terms', $choices );
}
endif;

/**
 * Return an array of category names and slugs
 */
if ( ! function_exists( 'kaira_get_category_terms' ) ) :
function kaira_get_category_terms() {

	$choices = array( 0 );

	// Default
	$choices = array( ' ' => esc_html__( 'Select a Category', 'kaira' ) );

	// Category
	$type_terms = get_terms( 'category' );
	if ( ! empty( $type_terms ) ) {
		$type_slugs = wp_list_pluck( $type_terms, 'slug' );
		$type_names = wp_list_pluck( $type_terms, 'name' );
		$type_list = array_combine( $type_slugs, $type_names );
		$choices = $choices + $type_list;
	}

	return apply_filters( 'kaira_get_category_terms', $choices );
}
endif;

/**
 * Sanitization for tags
 */
if ( ! function_exists( 'kaira_sanitize_terms' ) ) :
/**
 * Sanitize a value from a list of allowed values.
 *
 * @since 1.0.0.
 *
 * @param  mixed    $value      The value to sanitize.
 * @return mixed                The sanitized value.
 */
function kaira_sanitize_terms( $value ) {

	$choices = kaira_get_terms();
	$valid	 = array_keys( $choices );

	if ( ! in_array( $value, $valid ) ) {
		$value = 'none';
	}

	return $value;
}
endif;

/**
 * Sanitization for categories
 */
if ( ! function_exists( 'kaira_sanitize_category_terms' ) ) :
/**
 * Sanitize a value from a list of allowed values.
 *
 * @since 1.0.0.
 *
 * @param  mixed    $value      The value to sanitize.
 * @return mixed                The sanitized value.
 */
function kaira_sanitize_category_terms( $value ) {

	$choices = kaira_get_category_terms();
	$valid	 = array_keys( $choices );

	if ( ! in_array( $value, $valid ) ) {
		$value = 'none';
	}

	return $value;
}
endif;

/**
 * Sanitization for fonts
 */
function kaira_sanitize_font( $value ) {

	$choices = array(
			'lato'            => 'Lato',
			'ubuntu'          => 'Ubuntu',
			'source_sans_pro' => 'Source Sans Pro',
			'roboto'          => 'Roboto',
			'open-sans'       => 'Open Sans'
			);
	$valid = array_keys( $choices );

	if( ! in_array( $value, $valid) ) {
		$value = 'open-sans';
	}

	return $value;
}

/* Sanitization Functions
 * 
 * @link https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php 
 */
     function kaira_sanitize_checkbox( $checked ){
        // Boolean check.
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
     }

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function kaira_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function kaira_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kaira_customize_preview_js() {
	wp_enqueue_script( 'kaira_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'kaira_customize_preview_js' );