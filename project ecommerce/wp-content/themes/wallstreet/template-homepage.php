<?php

// Template Name: Home Page

get_header();
$wallstreet_current_options = wp_parse_args(  get_option( 'wallstreet_pro_options', array() ), wallstreet_theme_data_setup() );?>
<div tabindex = "0" id="content"></div>
	<?php
		do_action('wallstreet_sections', false);

		//****** get index blog  ********
		if ($wallstreet_current_options['blog_section_enabled'] ==true) {
		    get_template_part('index', 'blog');
		} 
get_footer();