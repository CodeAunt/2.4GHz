<?php
/**
 * Call to Action Customizer Options
 *
 * @package musicaholic
 */

// Add cta section
$wp_customize->add_section( 'musicaholic_cta_section', array(
	'title'             => esc_html__( 'Call to Action Section','musicaholic' ),
	'description'       => esc_html__( 'Call to Action Setting Options', 'musicaholic' ),
	'panel'             => 'musicaholic_homepage_sections_panel',
) );

// cta menu enable setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[enable_cta]', array(
	'default'           => musicaholic_theme_option('enable_cta'),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[enable_cta]', array(
	'label'             => esc_html__( 'Enable Call to Action', 'musicaholic' ),
	'section'           => 'musicaholic_cta_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );

// cta pages drop down chooser control and setting
$wp_customize->add_setting( 'musicaholic_theme_options[cta_content_page]', array(
	'sanitize_callback' => 'musicaholic_sanitize_page_post',
) );

$wp_customize->add_control( new Musicaholic_Dropdown_Chosen_Control( $wp_customize, 'musicaholic_theme_options[cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'musicaholic' ),
	'section'           => 'musicaholic_cta_section',
	'choices'			=> musicaholic_page_choices(),
) ) );

// cta btn label chooser control and setting
$wp_customize->add_setting( 'musicaholic_theme_options[cta_btn_label]', array(
	'default'          	=> musicaholic_theme_option('cta_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'musicaholic_theme_options[cta_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'musicaholic' ),
	'section'           => 'musicaholic_cta_section',
	'type'				=> 'text',
) );
