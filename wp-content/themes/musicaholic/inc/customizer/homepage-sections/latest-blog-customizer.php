<?php
/**
 * latest blog Customizer Options
 *
 * @package musicaholic
 */

// Add blog section
$wp_customize->add_section( 'musicaholic_latest_blog_section', array(
	'title'             => esc_html__( 'Latest Blog Section','musicaholic' ),
	'description'       => esc_html__( 'Latest Blog Section Setting Options', 'musicaholic' ),
	'panel'             => 'musicaholic_homepage_sections_panel',
) );

// latest blog title drop down chooser control and setting
$wp_customize->add_setting( 'musicaholic_theme_options[latest_blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> musicaholic_theme_option( 'latest_blog_title' ),
) );

$wp_customize->add_control( 'musicaholic_theme_options[latest_blog_title]', array(
	'label'             => esc_html__( 'Latest Blog Title', 'musicaholic' ),
	'description'       => esc_html__( 'Note: This title is displayed when your homepage displays option is set to latest posts.', 'musicaholic' ),
	'section'           => 'musicaholic_latest_blog_section',
	'type'				=> 'text',
) );

// column control and setting
$wp_customize->add_setting( 'musicaholic_theme_options[blog_column_type]', array(
	'default'          	=> musicaholic_theme_option('blog_column_type'),
	'sanitize_callback' => 'musicaholic_sanitize_select',
) );

$wp_customize->add_control( 'musicaholic_theme_options[blog_column_type]', array(
	'label'             => esc_html__( 'Column Layout', 'musicaholic' ),
	'section'           => 'musicaholic_latest_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-2' 		=> esc_html__( 'Two Column', 'musicaholic' ),
		'column-3' 		=> esc_html__( 'Three Column', 'musicaholic' ),
	),
) );
