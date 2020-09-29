<?php
/**
 * Page Customizer Options
 *
 * @package musicaholic
 */

// Add excerpt section
$wp_customize->add_section( 'musicaholic_page_section', array(
	'title'             => esc_html__( 'Page Setting','musicaholic' ),
	'description'       => esc_html__( 'Page Setting Options', 'musicaholic' ),
	'panel'             => 'musicaholic_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[sidebar_page_layout]', array(
	'sanitize_callback'   => 'musicaholic_sanitize_select',
	'default'             => musicaholic_theme_option('sidebar_page_layout'),
) );

$wp_customize->add_control(  new Musicaholic_Radio_Image_Control ( $wp_customize, 'musicaholic_theme_options[sidebar_page_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'musicaholic' ),
	'section'             => 'musicaholic_page_section',
	'choices'			  => musicaholic_sidebar_position(),
) ) );
