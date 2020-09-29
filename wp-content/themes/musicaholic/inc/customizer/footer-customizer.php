<?php
/**
 * Footer Customizer Options
 *
 * @package musicaholic
 */

// Add footer section
$wp_customize->add_section( 'musicaholic_footer_section', array(
	'title'             => esc_html__( 'Footer Section','musicaholic' ),
	'description'       => esc_html__( 'Footer Setting Options', 'musicaholic' ),
	'panel'             => 'musicaholic_theme_options_panel',
) );

// slide to top enable setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[slide_to_top]', array(
	'default'           => musicaholic_theme_option('slide_to_top'),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[slide_to_top]', array(
	'label'             => esc_html__( 'Show Slide to Top', 'musicaholic' ),
	'section'           => 'musicaholic_footer_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );

// copyright text
$wp_customize->add_setting( 'musicaholic_theme_options[copyright_text]',
	array(
		'default'       		=> musicaholic_theme_option('copyright_text'),
		'sanitize_callback'		=> 'musicaholic_santize_allow_tags',
	)
);
$wp_customize->add_control( 'musicaholic_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'musicaholic' ),
		'section'    			=> 'musicaholic_footer_section',
		'type'		 			=> 'textarea',
    )
);
