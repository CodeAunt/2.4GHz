<?php
/**
 * Global Customizer Options
 *
 * @package musicaholic
 */

// Add Global section
$wp_customize->add_section( 'musicaholic_global_section', array(
	'title'             => esc_html__( 'Global Setting','musicaholic' ),
	'description'       => esc_html__( 'Global Setting Options', 'musicaholic' ),
	'panel'             => 'musicaholic_theme_options_panel',
) );

// site layout setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[site_layout]', array(
	'sanitize_callback'   => 'musicaholic_sanitize_select',
	'default'             => musicaholic_theme_option('site_layout'),
) );

$wp_customize->add_control(  new Musicaholic_Radio_Image_Control ( $wp_customize, 'musicaholic_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'musicaholic' ),
	'section'             => 'musicaholic_global_section',
	'choices'			  => musicaholic_site_layout(),
) ) );

// Sticky menu setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[enable_sticky_menu]', array(
	'default'           => musicaholic_theme_option( 'enable_sticky_menu' ),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[enable_sticky_menu]', array(
	'label'             => esc_html__( 'Enable Sticky Menu', 'musicaholic' ),
	'section'           => 'musicaholic_global_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );

// loader setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[enable_loader]', array(
	'default'           => musicaholic_theme_option( 'enable_loader' ),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[enable_loader]', array(
	'label'             => esc_html__( 'Enable Loader', 'musicaholic' ),
	'section'           => 'musicaholic_global_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );

// loader type control and setting
$wp_customize->add_setting( 'musicaholic_theme_options[loader_type]', array(
	'default'          	=> musicaholic_theme_option('loader_type'),
	'sanitize_callback' => 'musicaholic_sanitize_select',
) );

$wp_customize->add_control( 'musicaholic_theme_options[loader_type]', array(
	'label'             => esc_html__( 'Loader Type', 'musicaholic' ),
	'section'           => 'musicaholic_global_section',
	'type'				=> 'select',
	'choices'			=> musicaholic_get_spinner_list(),
) );

