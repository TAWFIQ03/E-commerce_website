<?php
// Footer copyright section
	function wallstreet_copyright_customizer( $wp_customize ) {

	$wp_customize->add_section(
        'copyright_section_one',
        array(
            'title' => esc_html__('Footer copyright settings','wallstreet'),
            'priority' => 800,
        )
    );
	$wp_customize->add_setting(
    'wallstreet_pro_options[footer_copyright]',
    array(
        'default' => '<p>'.__( 'Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: <a href="https://webriti.com" rel="nofollow"> Wallstreet</a> by Webriti', 'wallstreet' ).'</p>',
		'type' =>'option',
		'sanitize_callback' => 'wallstreet_copyright_sanitize_text'

    )
);
$wp_customize->add_control(
    'wallstreet_pro_options[footer_copyright]',
    array(
        'label' => esc_html__('Copyright text','wallstreet'),
        'section' => 'copyright_section_one',
        'type' => 'textarea',
    ));

	function wallstreet_copyright_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

}

}
add_action( 'customize_register', 'wallstreet_copyright_customizer' );
