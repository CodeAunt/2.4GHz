<?php
/**
 * Theme functions and definitions
 *
 * @package rockaholic
 */ 


if ( ! function_exists( 'rockaholic_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function rockaholic_enqueue_styles() {
		wp_enqueue_style( 'musicaholic-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'rockaholic-style', get_stylesheet_directory_uri() . '/style.css', array( 'musicaholic-style-parent' ), '1.0.0' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'rockaholic_enqueue_styles', 99 );

function rockaholic_remove_action() {
	remove_action( 'musicaholic_header_start_action', 'musicaholic_header_start', 10 );
	remove_action( 'musicaholic_site_info_action', 'musicaholic_site_info', 10 );
}
add_action( 'init', 'rockaholic_remove_action');

if ( ! function_exists( 'rockaholic_header_start' ) ) :
	/**
	 * Header starts html codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function rockaholic_header_start() { ?>
		<header id="masthead" class="site-header attached-header default-menu <?php echo musicaholic_theme_option( 'enable_sticky_menu', false ) ? 'sticky-header' : ''; ?>">
		<div class="wrapper">
	<?php }
endif;
add_action( 'musicaholic_header_start_action', 'rockaholic_header_start', 10 );

if ( ! function_exists( 'rockaholic_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 */
	function rockaholic_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Shadows Into Light, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Shadows Into Light font: on or off', 'rockaholic' ) ) {
			$fonts[] = 'Shadows Into Light:200,300,400,500,600,700,900';
		}

		/* translators: If there are characters in your language that are not supported by News Cycle, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'News Cycle font: on or off', 'rockaholic' ) ) {
			$fonts[] = 'News Cycle: 300,400,500';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		);

		if ( $fonts ) {
			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
endif;

/**
 * Add preconnect for Google Fonts.
 *
 * @since Musicaholic 1.0.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function rockaholic_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'rockaholic-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'rockaholic_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function rockaholic_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'rockaholic-fonts', rockaholic_fonts_url(), array(), null );

}
add_action( 'wp_enqueue_scripts', 'rockaholic_scripts' );

/**
 * set header text color
 */
function rockaholic_header_text() {

	set_theme_mod( 'header_textcolor', '#fff' );

}
add_action( 'customize_register', 'rockaholic_header_text' );

/**
 * register social menu
 */
function rockaholic_register_menu() {

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'social' 	=> esc_html__( 'Social Menu', 'rockaholic' ),
	) );
}
add_action( 'after_setup_theme', 'rockaholic_register_menu' );


if ( ! function_exists( 'rockaholic_theme_defaults' ) ) :
	/**
	 * Customize theme defaults.
	 *
	 * @since 1.0.0
	 *
	 * @param array $defaults Theme defaults.
	 * @param array Custom theme defaults.
	 */
	function rockaholic_theme_defaults( $defaults ) {
		$defaults['column_type'] 	 = 'column-2';

		return $defaults;
	}
endif;
add_filter( 'musicaholic_default_theme_options', 'rockaholic_theme_defaults', 99 );

if( ! function_exists( 'rockaholic_check_enable_status' ) ):
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function rockaholic_body_classes( $classes ) {

		$classes[] = 'header-font-7';
		$classes[] = 'body-font-1';

		return $classes;
	}
endif;
add_filter( 'body_class', 'rockaholic_body_classes' );

if ( ! function_exists( 'rockaholic_site_info' ) ) :
	/**
	 * Site info codes
	 *
	 * @since 1.0.0
	 */
	function rockaholic_site_info() { 
		$copyright = musicaholic_theme_option('copyright_text');
		?>
		<div class="site-info">
            <div class="wrapper">
            		<?php if ( has_nav_menu( 'social' ) ) : ?>
		                <div class="social-menu">
		                    <?php  
		                	wp_nav_menu( array(
		                		'theme_location'  	=> 'social',
		                		'container' 		=> false,
		                		'menu_class'      	=> 'menu',
		                		'depth'           	=> 1,
		            			'link_before' 		=> '<span class="screen-reader-text">',
								'link_after' 		=> '</span>',
		                	) );
		                	?>
		                </div><!-- .social-menu -->
	                <?php endif; ?>
	                <div class="copyright">
	                	<p>
	                    	<?php 
            				if ( ! empty( $copyright ) ) :
		                    	echo musicaholic_santize_allow_tags( $copyright ); 
		                    endif;

	                    	printf( esc_html__( ' Rockaholic by %1$s Shark Themes %2$s', 'rockaholic' ), '<a href="' . esc_url( 'https://sharkthemes.com/' ) . '" target="_blank">','</a>' );
	                    	
	                    	if ( function_exists( 'the_privacy_policy_link' ) ) {
								the_privacy_policy_link( ' | ' );
							}
	                    	?>
	                    </p>
	                </div><!-- .copyright -->
            </div><!-- .wrapper -->    
        </div><!-- .site-info -->
	<?php }
endif;
add_action( 'musicaholic_site_info_action', 'rockaholic_site_info', 10 );
