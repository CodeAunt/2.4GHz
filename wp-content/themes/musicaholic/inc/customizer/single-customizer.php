<?php
/**
 * Single Post Customizer Options
 *
 * @package musicaholic
 */

// Add excerpt section
$wp_customize->add_section( 'musicaholic_single_section', array(
	'title'             => esc_html__( 'Single Post Setting','musicaholic' ),
	'description'       => esc_html__( 'Single Post Setting Options', 'musicaholic' ),
	'panel'             => 'musicaholic_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[sidebar_single_layout]', array(
	'sanitize_callback'   => 'musicaholic_sanitize_select',
	'default'             => musicaholic_theme_option('sidebar_single_layout'),
) );

$wp_customize->add_control(  new Musicaholic_Radio_Image_Control ( $wp_customize, 'musicaholic_theme_options[sidebar_single_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'musicaholic' ),
	'section'             => 'musicaholic_single_section',
	'choices'			  => musicaholic_sidebar_position(),
) ) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[show_single_date]', array(
	'default'           => musicaholic_theme_option( 'show_single_date' ),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[show_single_date]', array(
	'label'             => esc_html__( 'Show Date', 'musicaholic' ),
	'section'           => 'musicaholic_single_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[show_single_category]', array(
	'default'           => musicaholic_theme_option( 'show_single_category' ),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[show_single_category]', array(
	'label'             => esc_html__( 'Show Category', 'musicaholic' ),
	'section'           => 'musicaholic_single_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[show_single_tags]', array(
	'default'           => musicaholic_theme_option( 'show_single_tags' ),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[show_single_tags]', array(
	'label'             => esc_html__( 'Show Tags', 'musicaholic' ),
	'section'           => 'musicaholic_single_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[show_single_author]', array(
	'default'           => musicaholic_theme_option( 'show_single_author' ),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[show_single_author]', array(
	'label'             => esc_html__( 'Show Author', 'musicaholic' ),
	'section'           => 'musicaholic_single_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );
