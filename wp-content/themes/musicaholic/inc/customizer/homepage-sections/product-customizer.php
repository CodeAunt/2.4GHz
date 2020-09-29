<?php
/**
 * Products Customizer Options
 *
 * @package musicaholic
 */

// Add product section
$wp_customize->add_section( 'musicaholic_product_section', array(
	'title'             => esc_html__( 'Products Section','musicaholic' ),
	'description'       => esc_html__( 'Products Setting Options', 'musicaholic' ),
	'panel'             => 'musicaholic_homepage_sections_panel',
) );

// product menu enable setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[enable_product]', array(
	'default'           => musicaholic_theme_option('enable_product'),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[enable_product]', array(
	'label'             => esc_html__( 'Enable Products', 'musicaholic' ),
	'section'           => 'musicaholic_product_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );

// product title chooser control and setting
$wp_customize->add_setting( 'musicaholic_theme_options[product_title]', array(
	'default'          	=> musicaholic_theme_option('product_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'musicaholic_theme_options[product_title]', array(
	'label'             => esc_html__( 'Title', 'musicaholic' ),
	'section'           => 'musicaholic_product_section',
	'type'				=> 'text',
) );

// product label chooser control and setting
$wp_customize->add_setting( 'musicaholic_theme_options[product_readmore]', array(
	'default'          	=> musicaholic_theme_option('product_readmore'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'musicaholic_theme_options[product_readmore]', array(
	'label'             => esc_html__( 'Readmore Label', 'musicaholic' ),
	'section'           => 'musicaholic_product_section',
	'type'				=> 'text',
) );

// product content type control and setting
$wp_customize->add_setting( 'musicaholic_theme_options[product_content_type]', array(
	'default'          	=> musicaholic_theme_option('product_content_type'),
	'sanitize_callback' => 'musicaholic_sanitize_select',
) );

$wp_customize->add_control( 'musicaholic_theme_options[product_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'musicaholic' ),
	'section'           => 'musicaholic_product_section',
	'type'				=> 'select',
	'choices'			=> musicaholic_body_product_choice(),
) );

for ( $i = 1; $i <= 4; $i++ ) :

	// product pages drop down chooser control and setting
	$wp_customize->add_setting( 'musicaholic_theme_options[product_content_page_' . $i . ']', array(
		'sanitize_callback' => 'musicaholic_sanitize_page_post',
	) );

	$wp_customize->add_control( new Musicaholic_Dropdown_Chosen_Control( $wp_customize, 'musicaholic_theme_options[product_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'musicaholic' ), $i ),
		'section'           => 'musicaholic_product_section',
		'choices'			=> musicaholic_page_choices(),
		'active_callback'	=> 'musicaholic_product_content_page_enable',
	) ) );

	// product products drop down chooser control and setting
	$wp_customize->add_setting( 'musicaholic_theme_options[product_content_product_' . $i . ']', array(
		'sanitize_callback' => 'musicaholic_sanitize_page_post',
	) );

	$wp_customize->add_control( new Musicaholic_Dropdown_Chosen_Control( $wp_customize, 'musicaholic_theme_options[product_content_product_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Product %d', 'musicaholic' ), $i ),
		'section'           => 'musicaholic_product_section',
		'choices'			=> musicaholic_product_choices(),
		'active_callback'	=> 'musicaholic_product_content_product_enable',
	) ) );

endfor;
