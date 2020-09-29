<?php
/**
 * Musicaholic Theme Customizer
 *
 * @package musicaholic
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function musicaholic_customize_register( $wp_customize ) {
	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/controls.php';

	// Load callback functions.
	require get_template_directory() . '/inc/customizer/callbacks.php';

	// Load validation functions.
	require get_template_directory() . '/inc/customizer/validate.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'musicaholic_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'musicaholic_customize_partial_blogdescription',
		) );
	}

	// Register custom section types.
	$wp_customize->register_section_type( 'Musicaholic_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Musicaholic_Customize_Section_Upsell(
			$wp_customize,
			'musicaholic_upsell',
			array(
				'title'    => esc_html__( 'Musicaholic Pro', 'musicaholic' ),
				'pro_text' => esc_html__( 'Buy Pro', 'musicaholic' ),
				'pro_url'  => 'http://www.sharkthemes.com/downloads/musicaholic-pro/',
				'priority'  => 10,
			)
		)
	);

	// Add panel for common Home Page Settings
	$wp_customize->add_panel( 'musicaholic_homepage_sections_panel' , array(
	    'title'      => esc_html__( 'Homepage Sections','musicaholic' ),
	    'description'=> esc_html__( 'Musicaholic Theme Options.', 'musicaholic' ),
	    'priority'   => 100,
	) );

	// slider settings
	require get_template_directory() . '/inc/customizer/homepage-sections/slider-customizer.php';

	// introduction settings
	require get_template_directory() . '/inc/customizer/homepage-sections/introduction-customizer.php';

	// playlist settings
	require get_template_directory() . '/inc/customizer/homepage-sections/playlist-customizer.php';

	// team settings
	require get_template_directory() . '/inc/customizer/homepage-sections/team-customizer.php';

	// product settings
	require get_template_directory() . '/inc/customizer/homepage-sections/product-customizer.php';

	// cta settings
	require get_template_directory() . '/inc/customizer/homepage-sections/cta-customizer.php';

	// latest blog settings
	require get_template_directory() . '/inc/customizer/homepage-sections/latest-blog-customizer.php';

	// Add panel for common Home Page Settings
	$wp_customize->add_panel( 'musicaholic_theme_options_panel' , array(
	    'title'      => esc_html__( 'Theme Options','musicaholic' ),
	    'description'=> esc_html__( 'Musicaholic Theme Options.', 'musicaholic' ),
	    'priority'   => 100,
	) );

	// footer settings
	require get_template_directory() . '/inc/customizer/footer-customizer.php';
	
	// blog/archive settings
	require get_template_directory() . '/inc/customizer/blog-customizer.php';

	// single settings
	require get_template_directory() . '/inc/customizer/single-customizer.php';

	// page settings
	require get_template_directory() . '/inc/customizer/page-customizer.php';

	// global settings
	require get_template_directory() . '/inc/customizer/global-customizer.php';

}
add_action( 'customize_register', 'musicaholic_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function musicaholic_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function musicaholic_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function musicaholic_customize_preview_js() {
	wp_enqueue_script( 'musicaholic-customizer', get_template_directory_uri() . '/assets/js/customizer' . musicaholic_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'musicaholic_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function musicaholic_customize_control_js() {
	// Choose from select jquery.
	wp_enqueue_style( 'jquery-chosen', get_template_directory_uri() . '/assets/css/chosen' . musicaholic_min() . '.css' );
	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen' . musicaholic_min() . '.js', array( 'jquery' ), '1.4.2', true );

	wp_enqueue_style( 'musicaholic-customizer-style', get_template_directory_uri() . '/assets/css/customizer' . musicaholic_min() . '.css' );
	wp_enqueue_script( 'musicaholic-customizer-controls', get_template_directory_uri() . '/assets/js/customizer-controls' . musicaholic_min() . '.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'musicaholic_customize_control_js' );
