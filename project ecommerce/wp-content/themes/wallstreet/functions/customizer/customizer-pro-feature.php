<?php //Pro Details
function wallstreet_pro_feature_customizer( $wp_customize ) {
class Wallstreet_Pro__Feature_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <div class="wallstreet-pro-features-customizer">
    <ul class="wallstreet-pro-features">
        <li>
            <span class="wallstreet-pro-label"><?php esc_html_e( 'PRO','wallstreet' ); ?></span>
            <?php esc_html_e( 'Advance Theme Style Settings','wallstreet' ); ?>
        </li>
        <li>
            <span class="wallstreet-pro-label"><?php esc_html_e( 'PRO','wallstreet' ); ?></span>
            <?php esc_html_e( 'Slider Settings','wallstreet' ); ?>
        </li>
        <li>
            <span class="wallstreet-pro-label"><?php esc_html_e( 'PRO','wallstreet' ); ?></span>
            <?php esc_html_e( 'Create Unlimited Services','wallstreet' ); ?>
        </li>
        <li>
            <span class="wallstreet-pro-label"><?php esc_html_e( 'PRO','wallstreet' ); ?></span>
            <?php esc_html_e( 'Portfolio Management','wallstreet' ); ?>
        </li>
        <li>
            <span class="wallstreet-pro-label"><?php esc_html_e( 'PRO','wallstreet' ); ?></span>
            <?php esc_html_e( 'Homepage Blog Settings','wallstreet' ); ?>
        </li>
        <li>
            <span class="wallstreet-pro-label"><?php esc_html_e( 'PRO','wallstreet' ); ?></span>
            <?php esc_html_e( 'Theme Feature Section','wallstreet' ); ?>
        </li>
        <li>
            <span class="wallstreet-pro-label"><?php esc_html_e( 'PRO','wallstreet' ); ?></span>
            <?php esc_html_e( 'Testimonial Section','wallstreet' ); ?>
        </li>
        <li>
            <span class="wallstreet-pro-label"><?php esc_html_e( 'PRO','wallstreet' ); ?></span>
            <?php esc_html_e( 'SEO Friendly URL','wallstreet' ); ?>
        </li>
        <li>
            <span class="wallstreet-pro-label"><?php esc_html_e( 'PRO','wallstreet' ); ?></span>
            <?php esc_html_e( 'Client Section','wallstreet' ); ?>
        </li>
        <li>
            <span class="wallstreet-pro-label"><?php esc_html_e( 'PRO','wallstreet' ); ?></span>
            <?php esc_html_e( 'Multiple Page Templates','wallstreet' ); ?>
        </li>
        <li>
            <span class="wallstreet-pro-label"><?php esc_html_e( 'PRO','wallstreet' ); ?></span>
            <?php esc_html_e( 'Section Reordering','wallstreet' ); ?>
        </li>
        <li>
            <span class="wallstreet-pro-label"><?php esc_html_e( 'PRO','wallstreet' ); ?></span>
            <?php esc_html_e( 'Typography Settings','wallstreet' ); ?>
        </li>
        <li>
            <span class="wallstreet-pro-label"><?php esc_html_e( 'PRO','wallstreet' ); ?></span>
            <?php esc_html_e( 'Support for WPML / Polylang','wallstreet' ); ?>
        </li>
        <li>
            <span class="wallstreet-pro-label"><?php esc_html_e( 'PRO','wallstreet' ); ?></span>
            <?php esc_html_e( 'Google Map','wallstreet' ); ?>
        </li>
        <li>
            <span class="wallstreet-pro-label"><?php esc_html_e( 'PRO','wallstreet' ); ?></span>
            <?php esc_html_e( 'Quality Support','wallstreet' ); ?>
        </li>
    </ul>
    <a target="_blank" href="<?php echo esc_url('https://webriti.com/wallstreet/');?>" class="wallstreet-pro-button button-primary"><?php esc_html_e( 'UPGRADE TO PRO','wallstreet' ); ?></a>
    <hr>
</div>
    <?php
    }
}
$wp_customize->add_section( 'wallstreet_pro_feature_section' , array(
		'title'      => esc_html__('View PRO Details', 'wallstreet'),
		'priority'   => 1,
   	) );

$wp_customize->add_setting(
    'upgrade_pro_feature',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Wallstreet_Pro__Feature_Customize_Control( $wp_customize, 'upgrade_pro_feature', array(
		'section' => 'wallstreet_pro_feature_section',
		'setting' => 'upgrade_pro_feature',
    ))
);
class Wallstreet_Feature_document_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
   
     <div class="wallstreet-pro-content">
        <ul class="wallstreet-pro-des">
            <li> 
                <?php esc_html_e('Select among predefined color skins, you can even create yours without writing any CSS code.','wallstreet');?>
            </li>
            <li> 
                <?php esc_html_e('Pro version theme comes with add multiple slides in slider and you can select the slide animation, slide direction, slide animation speed, slide show speed etc.','wallstreet');?>
            </li>
            <li> 
                <?php esc_html_e('Add as many services you like. You can even display all the services on a separate page and manage the service callout settings.','wallstreet');?>
            </li>
            <li> 
                <?php esc_html_e('Portfolio section, templates , archives with 3 possible layouts.','wallstreet');?>
            </li>
            <li> 
                <?php esc_html_e('In blog setting comes with add title, description, enable/disable view all posts button, button text and button link etc.','wallstreet');?>
            </li>
            <li> 
                <?php esc_html_e('Show Theme feature section on front page.','wallstreet');?>
            </li>
            <li> 
                <?php esc_html_e('Show all your testimonials on front page.','wallstreet');?>
            </li>
            <li> 
                <?php esc_html_e('In Pro version you can change URL slug for SEO purpose.','wallstreet');?>
            </li>
            <li> 
                <?php esc_html_e('Show all your clients on front page and change client section title, description.','wallstreet');?>
            </li>
            <li> 
                <?php esc_html_e('Theme comes with multiple page settings like about us, portfolio etc.','wallstreet');?>
            </li>
            <li> 
                <?php esc_html_e('Theme Layout manager will helps you to rearange the sections.','wallstreet');?>
            </li>
            <li> 
                <?php esc_html_e('Typography will helps you to manage custom fonts like paragraph font, menu font etc.','wallstreet');?>
            </li>
            <li> 
                <?php esc_html_e('Translation ready supporting popular plugins WPML / Polylang.','wallstreet');?>
            </li>
            <li> 
                <?php esc_html_e('Support for google map 24/7 professional support.','wallstreet');?>
            </li>
            <li> 
                <?php esc_html_e('Dedicated support, various widget and sidebar management.','wallstreet');?>
            </li>
        </ul>
     </div>
    <?php
    }
}

$wp_customize->add_setting(
    'doc_Review_feature',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Wallstreet_Feature_document_Customize_Control( $wp_customize, 'doc_Review_feature', array(	
		'section' => 'wallstreet_pro_feature_section',
		'setting' => 'doc_Review_feature',
    ))
);

}
add_action( 'customize_register', 'wallstreet_pro_feature_customizer' );