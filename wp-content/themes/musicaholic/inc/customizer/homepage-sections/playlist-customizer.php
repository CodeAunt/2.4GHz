<?php
/**
 * Playlist Customizer Options
 *
 * @package musicaholic
 */

// Add playlist section
$wp_customize->add_section( 'musicaholic_playlist_section', array(
	'title'             => esc_html__( 'Playlist Section','musicaholic' ),
	'description'       => esc_html__( 'Playlist Setting Options', 'musicaholic' ),
	'panel'             => 'musicaholic_homepage_sections_panel',
) );

// playlist menu enable setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[enable_playlist]', array(
	'default'           => musicaholic_theme_option('enable_playlist'),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[enable_playlist]', array(
	'label'             => esc_html__( 'Enable Playlist', 'musicaholic' ),
	'section'           => 'musicaholic_playlist_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );

// playlist additional image setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[playlist_image]', array(
	'sanitize_callback' => 'musicaholic_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'musicaholic_theme_options[playlist_image]',
		array(
		'label'       		=> esc_html__( 'Select Background Image', 'musicaholic' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'musicaholic' ), 1920, 1080 ),
		'section'     		=> 'musicaholic_playlist_section',
) ) );

// playlist pages drop down chooser control and setting
$wp_customize->add_setting( 'musicaholic_theme_options[playlist_content_page]', array(
	'sanitize_callback' => 'musicaholic_sanitize_page_post',
) );

$wp_customize->add_control( new Musicaholic_Dropdown_Chosen_Control( $wp_customize, 'musicaholic_theme_options[playlist_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'musicaholic' ),
	'section'           => 'musicaholic_playlist_section',
	'choices'			=> musicaholic_page_choices(),
) ) );
