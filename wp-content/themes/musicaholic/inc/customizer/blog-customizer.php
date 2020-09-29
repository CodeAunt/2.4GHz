<?php
/**
 * Blog / Archive / Search Customizer Options
 *
 * @package musicaholic
 */

// Add blog section
$wp_customize->add_section( 'musicaholic_blog_section', array(
	'title'             => esc_html__( 'Archive Page Setting','musicaholic' ),
	'description'       => esc_html__( 'Archive/Search Page Setting Options', 'musicaholic' ),
	'panel'             => 'musicaholic_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[sidebar_layout]', array(
	'sanitize_callback'   => 'musicaholic_sanitize_select',
	'default'             => musicaholic_theme_option('sidebar_layout'),
) );

$wp_customize->add_control(  new Musicaholic_Radio_Image_Control ( $wp_customize, 'musicaholic_theme_options[sidebar_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'musicaholic' ),
	'description'         => esc_html__( 'Note: Option for Archive and Search Page.', 'musicaholic' ),
	'section'             => 'musicaholic_blog_section',
	'choices'			  => musicaholic_sidebar_position(),
) ) );

// column control and setting
$wp_customize->add_setting( 'musicaholic_theme_options[column_type]', array(
	'default'          	=> musicaholic_theme_option('column_type'),
	'sanitize_callback' => 'musicaholic_sanitize_select',
) );

$wp_customize->add_control( 'musicaholic_theme_options[column_type]', array(
	'label'             => esc_html__( 'Column Layout', 'musicaholic' ),
	'description'         => esc_html__( 'Note: Option for Archive and Search Page.', 'musicaholic' ),
	'section'           => 'musicaholic_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-2' 		=> esc_html__( 'Two Column', 'musicaholic' ),
		'column-3' 		=> esc_html__( 'Three Column', 'musicaholic' ),
	),
) );

// excerpt count control and setting
$wp_customize->add_setting( 'musicaholic_theme_options[excerpt_count]', array(
	'default'          	=> musicaholic_theme_option('excerpt_count'),
	'sanitize_callback' => 'musicaholic_sanitize_number_range',
	'validate_callback' => 'musicaholic_validate_excerpt_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'musicaholic_theme_options[excerpt_count]', array(
	'label'             => esc_html__( 'Excerpt Length', 'musicaholic' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 50.', 'musicaholic' ),
	'section'           => 'musicaholic_blog_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 50,
		),
) );

// pagination control and setting
$wp_customize->add_setting( 'musicaholic_theme_options[pagination_type]', array(
	'default'          	=> musicaholic_theme_option('pagination_type'),
	'sanitize_callback' => 'musicaholic_sanitize_select',
) );

$wp_customize->add_control( 'musicaholic_theme_options[pagination_type]', array(
	'label'             => esc_html__( 'Pagination Type', 'musicaholic' ),
	'section'           => 'musicaholic_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'default' 		=> esc_html__( 'Default', 'musicaholic' ),
		'numeric' 		=> esc_html__( 'Numeric', 'musicaholic' ),
	),
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[show_date]', array(
	'default'           => musicaholic_theme_option( 'show_date' ),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[show_date]', array(
	'label'             => esc_html__( 'Show Date', 'musicaholic' ),
	'section'           => 'musicaholic_blog_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[show_category]', array(
	'default'           => musicaholic_theme_option( 'show_category' ),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[show_category]', array(
	'label'             => esc_html__( 'Show Category', 'musicaholic' ),
	'section'           => 'musicaholic_blog_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[show_author]', array(
	'default'           => musicaholic_theme_option( 'show_author' ),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[show_author]', array(
	'label'             => esc_html__( 'Show Author', 'musicaholic' ),
	'section'           => 'musicaholic_blog_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );
