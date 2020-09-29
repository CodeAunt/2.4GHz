<?php
/**
 * Introduction Customizer Options
 *
 * @package musicaholic
 */

// Add introduction section
$wp_customize->add_section( 'musicaholic_introduction_section', array(
	'title'             => esc_html__( 'Introduction Section','musicaholic' ),
	'description'       => esc_html__( 'Introduction Setting Options', 'musicaholic' ),
	'panel'             => 'musicaholic_homepage_sections_panel',
) );

// introduction menu enable setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[enable_introduction]', array(
	'default'           => musicaholic_theme_option('enable_introduction'),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[enable_introduction]', array(
	'label'             => esc_html__( 'Enable Introduction', 'musicaholic' ),
	'section'           => 'musicaholic_introduction_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );

// introduction pages drop down chooser control and setting
$wp_customize->add_setting( 'musicaholic_theme_options[introduction_content_page]', array(
	'sanitize_callback' => 'musicaholic_sanitize_page_post',
) );

$wp_customize->add_control( new Musicaholic_Dropdown_Chosen_Control( $wp_customize, 'musicaholic_theme_options[introduction_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'musicaholic' ),
	'section'           => 'musicaholic_introduction_section',
	'choices'			=> musicaholic_page_choices(),
) ) );

// introduction btn label chooser control and setting
$wp_customize->add_setting( 'musicaholic_theme_options[introduction_btn_label]', array(
	'default'          	=> musicaholic_theme_option('introduction_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'musicaholic_theme_options[introduction_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'musicaholic' ),
	'section'           => 'musicaholic_introduction_section',
	'type'				=> 'text',
) );
