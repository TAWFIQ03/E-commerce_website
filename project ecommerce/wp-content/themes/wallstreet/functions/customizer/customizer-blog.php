<?php
function wallstreet_blog_customizer( $wp_customize ) {
	
	//Blog Heading section 
	$wp_customize->add_section(
        'blog_setting',
        array(
            'title' => esc_html__('Homepage blog settings','wallstreet'),
			'priority'   => 700,
			
			)
    );

	//Show and hide Blog section
	$wp_customize->add_setting(
	'wallstreet_pro_options[blog_section_enabled]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'wallstreet_sanitize_checkbox',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[blog_section_enabled]',
    array(
        'label' => esc_html__('Enable Homepage Blog Section','wallstreet'),
        'section' => 'blog_setting',
        'type' => 'checkbox',
    )
	);

	// Blog Heading
	$wp_customize->add_setting(
		'wallstreet_pro_options[home_blog_heading]',
		array('capability'  => 'edit_theme_options',
		'default' => esc_html__('Curabitur lacinia','wallstreet'), 
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'wallstreet_pro_options[home_blog_heading]',
		array(
			'type' => 'text',
			'label' => esc_html__('Homepage blog section heading','wallstreet'),
			'section' => 'blog_setting',
		)
	);
	
	
	
	$wp_customize->add_setting(
		'wallstreet_pro_options[home_blog_description]',
		array('capability'  => 'edit_theme_options',
		'default' => esc_html__('Curabitur quis nibh vulputate nisi tincidunt eleifend.','wallstreet'), 
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control(
		'wallstreet_pro_options[home_blog_description]',
		array(
			'type' => 'text',
			'label' => esc_html__('Homepage blog section description','wallstreet'),
			'section' => 'blog_setting',
		)
	);

}
add_action( 'customize_register', 'wallstreet_blog_customizer' );