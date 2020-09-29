<?php
/**
 * Team Customizer Options
 *
 * @package musicaholic
 */

// Add team section
$wp_customize->add_section( 'musicaholic_team_section', array(
	'title'             => esc_html__( 'Team Section','musicaholic' ),
	'description'       => esc_html__( 'Team Setting Options', 'musicaholic' ),
	'panel'             => 'musicaholic_homepage_sections_panel',
) );

// team menu enable setting and control.
$wp_customize->add_setting( 'musicaholic_theme_options[enable_team]', array(
	'default'           => musicaholic_theme_option('enable_team'),
	'sanitize_callback' => 'musicaholic_sanitize_switch',
) );

$wp_customize->add_control( new Musicaholic_Switch_Control( $wp_customize, 'musicaholic_theme_options[enable_team]', array(
	'label'             => esc_html__( 'Enable Team', 'musicaholic' ),
	'section'           => 'musicaholic_team_section',
	'on_off_label' 		=> musicaholic_show_options(),
) ) );

// team label chooser control and setting
$wp_customize->add_setting( 'musicaholic_theme_options[team_title]', array(
	'default'          	=> musicaholic_theme_option('team_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'musicaholic_theme_options[team_title]', array(
	'label'             => esc_html__( 'Title', 'musicaholic' ),
	'section'           => 'musicaholic_team_section',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 4; $i++ ) :

	// team pages drop down chooser control and setting
	$wp_customize->add_setting( 'musicaholic_theme_options[team_content_page_' . $i . ']', array(
		'sanitize_callback' => 'musicaholic_sanitize_page_post',
	) );

	$wp_customize->add_control( new Musicaholic_Dropdown_Chosen_Control( $wp_customize, 'musicaholic_theme_options[team_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'musicaholic' ), $i ),
		'section'           => 'musicaholic_team_section',
		'choices'			=> musicaholic_page_choices(),
	) ) );

endfor;
