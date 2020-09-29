<?php
/**
 * Slider Customizer Options
 *
 * @package musicaholic
 */

// Add slider section
$wp_customize->add_section( 'musicaholic_slider_section', array(
	'title'             => esc_html__( 'Slider Section','musicaholic' ),
	'description'       => esc_html__( 'Slider Setting Options', 'musicaholic' ),
	'panel'             => 'musicaholic_homepage_sections_panel',
) );

// slider menu enable setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[enable_slider]', array(
	'default'           => musicaholic_theme_option('enable_slider'),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[enable_slider]', array(
	'label'             => esc_html__( 'Enable Slider', 'musicaholic' ),
	'section'           => 'musicaholic_slider_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );

// slider arrow control enable setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[slider_arrow]', array(
	'default'           => musicaholic_theme_option('slider_arrow'),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[slider_arrow]', array(
	'label'             => esc_html__( 'Show Arrow Controller', 'musicaholic' ),
	'section'           => 'musicaholic_slider_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );

// slider auto slide control enable setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[slider_auto_slide]', array(
	'default'           => musicaholic_theme_option('slider_auto_slide'),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[slider_auto_slide]', array(
	'label'             => esc_html__( 'Enable Auto Slide', 'musicaholic' ),
	'section'           => 'musicaholic_slider_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );

// slider btn label chooser control and setting
$wp_customize->add_setting( 'musicaholic_theme_options[slider_btn_label]', array(
	'default'          	=> musicaholic_theme_option('slider_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'musicaholic_theme_options[slider_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'musicaholic' ),
	'section'           => 'musicaholic_slider_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 5; $i++ ) :

	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'musicaholic_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'musicaholic_sanitize_page_post',
	) );

	$wp_customize->add_control( new Musicaholic_Dropdown_Chosen_Control( $wp_customize, 'musicaholic_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'musicaholic' ), $i ),
		'section'           => 'musicaholic_slider_section',
		'choices'			=> musicaholic_page_choices(),
	) ) );

endfor;
