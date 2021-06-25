<?php
/**
 * Array of customizer settings, controls and outputs
 *
 * @package Ibsen
 */
if ( !function_exists( 'ibsen_customizer_array' ) ) {
	function ibsen_customizer_array() {
		return array(

			'color1' => array(
				'type' => 'setting',
				'default' => '#f53b57',
				'transport' => 'postMessage',
				'sanitize' => 'sanitize_hex_color',
					'control' => 'color',
					'label' => __( 'Accent Color', 'ibsen' ),
					'description' => '',
					'section' => 'colors',
					'priority' => '',
			),

			'layout_options' => array(
				'type' => 'section',
				'label' => __( 'Layout Options', 'ibsen' ),
				'description' => '',
				'priority' => 26,
			),

			'container_width' => array(
				'type' => 'setting',
				'default' => '1400',
				'transport' => 'postMessage',
				'sanitize' => 'absint',
					'control' => 'number',
					'label' => __( 'Container Width', 'ibsen' ),
					'description' => '',
					'section' => 'layout_options',
					'attrs' => array(
                		'min'   => 1120,
                		'max'   => 2560,
                		'step'  => 1,
                	),
			),

			'header_search_off' => array(
				'type' => 'setting',
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize' => 'ibsen_sanitize_checkbox',
					'control' => 'checkbox',
					'label' => __( 'Disable Search Form in Header', 'ibsen' ),
					'description' => '',
					'section' => 'layout_options',
			),

		);
	}
}


/**
 * Return customizer settings and controls
 */
if ( !function_exists( 'ibsen_customizer_controls' ) ) {
	function ibsen_customizer_controls() {

		global $wp_customize;

		$controls = ibsen_customizer_array();

		foreach ( $controls as $control => $value ) {

			if ( $value['type'] == 'section' ) {

				$wp_customize->add_section(
					$control,
					array(
						'title'		=> $value['label'],
						'description'=> $value['description'],
						'priority'	=> $value['priority'],
					)
				);

			} elseif ( $value['type'] == 'setting' ) {

				$wp_customize->add_setting(
					$control,
					array(
						'default'			=> $value['default'],
						'transport'			=> $value['transport'],
						'sanitize_callback' => $value['sanitize'],
					)
				);

				if ( $value['control'] == 'color' ) {

					$wp_customize->add_control( 
						new WP_Customize_Color_Control(
							$wp_customize,
							$control,
							array( 
								'settings'   => $control,
								'section'    => $value['section'],
								'label'      => $value['label'],
								'description'=> $value['description'],
							)
						)
					);
				
				} elseif ( $value['control'] == 'number' ) {

					$wp_customize->add_control(
						$control,
						array(
							'settings'		=> $control,
							'section'    => $value['section'],
							'label'      => $value['label'],
							'description'=> $value['description'],
							'type'       => 'number',
							'input_attrs' => $value['attrs'],
						)
					);

				} elseif ( $value['control'] == 'checkbox' ) {

					$wp_customize->add_control(
						$control,
						array(
							'settings'		=> $control,
							'section'    => $value['section'],
							'label'      => $value['label'],
							'description'=> $value['description'],
							'type'       => 'checkbox',
						)
					);

				}	
			
			}
		
		}

	}
}
