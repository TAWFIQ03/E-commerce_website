<?php
/**
 * Ibsen Theme Customizer
 *
 * @package Ibsen
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object
 */
function ibsen_customize_register( $wp_customize ) {
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('custom_logo')->transport      = 'postMessage';

	$wp_customize->add_setting(
		'header_image_helper',
		array(
			'default'			=> '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control(
		new Ibsen_Customize_Heading_Small(
			$wp_customize,
			'header_image_helper',
			array(
				'settings'		=> 'header_image_helper',
				'section'		=> 'header_image',
				'label'			=> esc_html__( 'Note: header image is not displayed on Transparent Header page template.', 'ibsen' )
			)
		)
	);

	ibsen_customizer_controls();

	$wp_customize->add_setting(
		'header_color',
		array(
			'default'			=> '',
			'sanitize_callback'	=> 'ibsen_sanitize_choices',
		)
	);
	$wp_customize->add_control(
		'header_color',
		array(
			'label'		=> esc_html__( 'Header Style', 'ibsen' ),
			'description'		=> esc_html__( 'Note: only applies to *Default* page template, not to *Transparent Header* page template.', 'ibsen' ),
			'type'		=> 'select',
			'section'	=> 'colors',
			'choices'	=> array(
				''	=> esc_html__( 'Dark', 'ibsen' ),
				'light'	=> esc_html__( 'Light', 'ibsen' ),
			),
		)
	);

	$wp_customize->add_setting(
		'grid_layout',
		array(
			'default'			=> '2',
			'transport'			=> 'postMessage',
			'sanitize_callback' => 'ibsen_sanitize_radio_select'
		)
	);
	$wp_customize->add_control(
		new Ibsen_Image_Radio_Control(
		$wp_customize,
		'grid_layout',
		array(
			'type' => 'radio',
			'label' => esc_html__( 'Blog - Grid Layout', 'ibsen' ),
			'section' => 'layout_options',
			'settings' => 'grid_layout',
			'choices' => array(
				'1' => esc_url( get_template_directory_uri() ) . '/images/mag-layout-1.png',
				'2' => esc_url( get_template_directory_uri() ) . '/images/mag-layout-2.png',
				'3' => esc_url( get_template_directory_uri() ) . '/images/mag-layout-3.png',
				'4' => esc_url( get_template_directory_uri() ) . '/images/mag-layout-4.png',
				)
			)
		)
	);

	$wp_customize->add_setting(
		'sidebar_position',
		array(
			'default'			=> 'right',
			'sanitize_callback'	=> 'ibsen_sanitize_choices',
		)
	);
	$wp_customize->add_control(
		'sidebar_position',
		array(
			'label'		=> esc_html__( 'Sidebar Position', 'ibsen' ),
			'type'		=> 'select',
			'section'	=> 'layout_options',
			'choices'	=> array(
				'left'	=> esc_html__( 'Left', 'ibsen' ),
				'right'	=> esc_html__( 'Right', 'ibsen' ),
			),
		)
	);

	$wp_customize->add_setting(
		'sticky_footer',
		array(
			'default'			=> 0,
			'sanitize_callback' => 'ibsen_sanitize_checkbox'
		)
	);
	$wp_customize->add_control(
			'sticky_footer',
			array(
				'settings'		=> 'sticky_footer',
				'section'		=> 'layout_options',
				'label'			=> esc_html__( 'Enable Sticky Footer', 'ibsen' ),
				'type'       	=> 'checkbox',
			)
	);

	// SECTION - Typography
	$wp_customize->add_section(
		'typography',
		array(
			'title'		=> esc_html__( 'Typography & Fonts', 'ibsen' ),
			'priority'	=> 42,
		)
	);

	// Setting - Font - Header
	$wp_customize->add_setting( 'font_site_title', array(
		'default'           => 'Sanchez:400,400i',
		'transport'			=> 'postMessage',
		'sanitize_callback' => 'ibsen_sanitize_choices',
	) );
	$wp_customize->add_control( 'font_site_title', array(
		'label'   => esc_html__( 'Site Title', 'ibsen' ),
		'type'    => 'select',
		'section' => 'typography',
		'choices' => ibsen_google_fonts_array(),
	) );

	// Setting - Font - Navigation
	$wp_customize->add_setting( 'font_nav', array(
		'default'           => 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i',
		'transport'			=> 'postMessage',
		'sanitize_callback' => 'ibsen_sanitize_choices',
	) );
	$wp_customize->add_control( 'font_nav', array(
		'label'   => esc_html__( 'Navigation', 'ibsen' ),
		'type'    => 'select',
		'section' => 'typography',
		'choices' => ibsen_google_fonts_array(),
	) );

	// Setting - Font - Content
	$wp_customize->add_setting( 'font_content', array(
		'default'           => 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i',
		'transport'			=> 'postMessage',
		'sanitize_callback' => 'ibsen_sanitize_choices',
	) );
	$wp_customize->add_control( 'font_content', array(
		'label'   => esc_html__( 'Content', 'ibsen' ),
		'type'    => 'select',
		'section' => 'typography',
		'choices' => ibsen_google_fonts_array(),
	) );

	// Setting - Font - Headings
	$wp_customize->add_setting( 'font_headings', array(
		'default'           => 'Sanchez:400,400i',
		'transport'			=> 'postMessage',
		'sanitize_callback' => 'ibsen_sanitize_choices',
	) );
	$wp_customize->add_control( 'font_headings', array(
		'label'   => esc_html__( 'Headings', 'ibsen' ),
		'type'    => 'select',
		'section' => 'typography',
		'choices' => ibsen_google_fonts_array(),
	) );

	$wp_customize->add_setting(
		'fs_base',
		array(
			'default'			=> '16',
			'transport'			=> 'postMessage',
			'sanitize_callback' => 'absint'
		)
	);
	$wp_customize->add_control(
			'fs_base',
			array(
				'settings'		=> 'fs_base',
				'section'		=> 'typography',
				'label'			=> esc_html__( 'Base Font Size', 'ibsen' ),
				'type'       	=> 'number',
				'input_attrs' => array(
                'min'   => 10,
                'max'   => 40,
                'step'  => 1,
            ),
			)
	);


	// Section - Go Pro
	$wp_customize->add_section( 'go_pro_sec' , array(
		'title'      => esc_html__( 'Go Pro', 'ibsen' ),
		'priority'   => 1,
		'description' => esc_html__( 'Upgrade to Ibsen Pro for even more cool features and customization options.', 'ibsen' ),
	) );
	$wp_customize->add_control(
		new Ibsen_Customize_Extra_Control(
			$wp_customize,
			'go_pro',
			array(
				'section'   => 'go_pro_sec',
				'type'      => 'pro-link',
				'label'		=> esc_html__( 'Go Pro', 'ibsen' ),
				'url'		=> 'https://uxlthemes.com/theme/ibsen-pro/',
				'priority'	=> 10
			)
		)
	);

}
add_action('customize_register', 'ibsen_customize_register');


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ibsen_customize_preview_js() {
	wp_enqueue_script('ibsen_customizer', get_template_directory_uri() . '/functions/js/customizer.js', array('customize-preview'), '1.0', true );
}
add_action('customize_preview_init', 'ibsen_customize_preview_js');


function ibsen_customizer_script() {
	wp_enqueue_script('ibsen-customizer-script', get_template_directory_uri() .'/functions/js/customizer-scripts.js', array("jquery","jquery-ui-draggable"),'', true  );
	wp_enqueue_style('ibsen-customizer-style', get_template_directory_uri() .'/functions/css/customizer-style.css');	
}
add_action('customize_controls_enqueue_scripts', 'ibsen_customizer_script');


if( class_exists('WP_Customize_Control') ):

class Ibsen_Image_Radio_Control extends WP_Customize_Control {

	public function render_content() {

		if ( empty( $this->choices ) )
			return;

		$name = '_customize-radio-' . $this->id;

		?>
		<style>
			#ibsen-img-container-<?php echo $this->id; ?> .ibsen-radio-img-img {
			border: 2px solid #f2f3f5;
			cursor: pointer;
			margin: 0 4px 4px 0;
			}
			#ibsen-img-container-<?php echo $this->id; ?> .ibsen-radio-img-selected {
			border: 2px solid #0085BA;
			margin: 0 4px 4px 0;
			}
			input[type=checkbox]:before {
			content: '';
			margin: -3px 0 0 -4px;
			}
		</style>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php if ( $this->description ) {
			echo '<span class="customize-control-description">' . esc_html( $this->description ) . '</span>';
		}
		?>
		<ul class="controls" id='ibsen-img-container-<?php echo $this->id; ?>'>
		<?php
		foreach ( $this->choices as $value => $label ) :
			$class = ($this->value() == $value)?'ibsen-radio-img-selected ibsen-radio-img-img':'ibsen-radio-img-img';
			?>
			<li style="display: inline;">
				<label>
					<input <?php $this->link(); ?>style='display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
					<img src = '<?php echo esc_attr( $label ); ?>' class = '<?php echo esc_attr( $class ); ?>' />
				</label>
			</li>
			<?php
			endforeach;
		?>
		</ul>
	<?php
	}
}


class Ibsen_Customize_Heading_Large extends WP_Customize_Control {
    public function render_content() {
    	?>

        <?php if ( !empty( $this->label ) ) : ?>
            <h3 class="ibsen-accordion-section-title"><?php echo esc_html( $this->label ); ?></h3>
        <?php endif; ?>
        <?php if ( !empty( $this->description ) ) : ?>
            <p class="ibsen-accordion-section-paragraph"><?php echo esc_html( $this->description ); ?></p>
        <?php endif; ?>
    <?php }
}


class Ibsen_Customize_Heading_Small extends WP_Customize_Control {
    public function render_content() {
    	?>

        <?php if ( !empty( $this->label ) ) : ?>
            <h5 class="ibsen-accordion-section-title"><?php echo esc_html( $this->label ); ?></h5>
        <?php endif; ?>
        <?php if ( !empty( $this->description ) ) : ?>
            <p class="ibsen-accordion-section-paragraph"><?php echo esc_html( $this->description ); ?></p>
        <?php endif; ?>
    <?php }
}


class Ibsen_Customize_Extra_Control extends WP_Customize_Control {
	public $settings = 'blogname';
	public $description = '';
	public $url = '';
	public $group = '';

	public function render_content() {
		switch ( $this->type ) {
			default:

			case 'extra':
				echo '<p style="margin-top:40px;">' . sprintf(
							'<a href="%1$s" target="_blank">%2$s</a>',
							esc_url( $this->url ),
							esc_html__( 'More options available', 'ibsen' )
						) . '</p>';
				echo '<p class="description" style="margin-top:5px;">' . esc_html( $this->description ) . '</p>';
				break;

			case 'docs':
				echo sprintf(
							'<a href="%1$s" class="button-primary" target="_blank">%2$s</a>',
							esc_url( $this->url ),
							esc_html__( 'Documentation', 'ibsen' )
						);
				break;

			case 'pro-link':
				echo sprintf(
							'<a href="%1$s" class="button-primary" target="_blank">%2$s</a>',
							esc_url( $this->url ),
							esc_html__( 'Go Pro', 'ibsen' )
						);
				break;
					
			case 'line' :
				echo '<hr />';
				break;
		}
	}
}


endif;


/**
 * Sanitization functions
 */

function ibsen_sanitize_checkbox( $input ){
	if ( $input ) {
		$output = '1';
	} else {
		$output = false;
	}
	return $output;
}


function ibsen_sanitize_choices( $input, $setting ) {
    global $wp_customize;
 
    $control = $wp_customize->get_control( $setting->id );
 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}


function ibsen_sanitize_radio_select( $input, $setting ) {
	// Ensuring that the input is a slug.
	$input = sanitize_key( $input );
	// Get the list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	// If the input is a valid key, return it, else, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
