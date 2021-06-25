<?php
/**
 *Blog Option
 /*******************/
//blog post content
/*******************/
    $wp_customize->add_setting('royal_shop_blog_post_content', array(
        'default'        => 'excerpt',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_select',
    ));
    $wp_customize->add_control('royal_shop_blog_post_content', array(
        'settings' => 'royal_shop_blog_post_content',
        'label'   => __('Blog Post Content','royal-shop'),
        'section' => 'royal-shop-section-blog-group',
        'type'    => 'select',
        'choices'    => array(
        'full'   => __('Full Content','royal-shop'),
        'excerpt' => __('Excerpt Content','royal-shop'), 
        'nocontent' => __('No Content','royal-shop'), 
        ),
         'priority'   =>9,
    ));
    // excerpt length
    $wp_customize->add_setting('royal_shop_blog_expt_length', array(
			'default'           =>'30',
            'capability'        => 'edit_theme_options',
			'sanitize_callback' =>'royal_shop_sanitize_number',
		)
	);
	$wp_customize->add_control('royal_shop_blog_expt_length', array(
			'type'        => 'number',
			'section'     => 'royal-shop-section-blog-group',
			'label'       => __( 'Excerpt Length', 'royal-shop' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 3000,
			),
             'priority'   =>10,
		)
	);
	// read more text
    $wp_customize->add_setting('royal_shop_blog_read_more_txt', array(
			'default'           =>'Read More',
            'capability'        => 'edit_theme_options',
			'sanitize_callback' =>'royal_shop_sanitize_text',
            'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control('royal_shop_blog_read_more_txt', array(
			'type'        => 'text',
			'section'     => 'royal-shop-section-blog-group',
			'label'       => __( 'Read More Text', 'royal-shop' ),
			'settings' => 'royal_shop_blog_read_more_txt',
             'priority'   =>11,
			
		)
	);
    /*********************/
    //blog post pagination
    /*********************/
   $wp_customize->add_setting('royal_shop_blog_post_pagination', array(
        'default'        => 'num',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_select',
    ));
    $wp_customize->add_control('royal_shop_blog_post_pagination', array(
        'settings' => 'royal_shop_blog_post_pagination',
        'label'   => __('Post Pagination','royal-shop'),
        'section' => 'royal-shop-section-blog-group',
        'type'    => 'select',
        'choices' => array(
        'num'     => __('Numbered','royal-shop'),
        'click'   => __('Load More (PRO)','royal-shop'), 
        'scroll'  => __('Infinite Scroll (PRO)','royal-shop'), 
        ),
        'priority'   =>13,
    ));
/****************/
//blog doc link
/****************/
$wp_customize->add_setting('royal_shop_blog_arch_learn_more', array(
    'sanitize_callback' => 'royal_shop_sanitize_text',
    ));
$wp_customize->add_control(new royal_shop_Misc_Control( $wp_customize, 'royal_shop_blog_arch_learn_more',
            array(
        'section'    => 'royal-shop-section-blog-group',
        'type'      => 'doc-link',
        'url'       => 'https://wpzita.com/docs/post-page-setting/',
        'description' => esc_html__( 'Feel difficulty, Explore our', 'royal-shop' ),
        'priority'   =>100,
    )));