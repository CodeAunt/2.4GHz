<?php
/**
 * Musicaholic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package musicaholic
 */

if ( ! function_exists( 'musicaholic_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function musicaholic_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Musicaholic, use a find and replace
		 * to change 'musicaholic' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'musicaholic', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 700, 700, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' 	=> esc_html__( 'Primary Menu', 'musicaholic' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'musicaholic_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add theme support for page excerpt.
		add_post_type_support( 'page', 'excerpt' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 400,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets', 4 );

		// Load Footer Widget Support.
		require_if_theme_supports( 'footer-widgets', get_template_directory() . '/inc/footer-widget.php' );

		// Gutenberg support
		add_theme_support( 'editor-color-palette', array(
	       	array(
	           	'name' => esc_html__( 'Geraldine', 'musicaholic' ),
	           	'slug' => 'geraldine',
	           	'color' => '#F78888',
	       	),
	       	array(
	           	'name' => esc_html__( 'Shark', 'musicaholic' ),
	           	'slug' => 'shark',
	           	'color' => '#272B2F',
	       	),
	       	array(
	           	'name' => esc_html__( 'Emperor', 'musicaholic' ),
	           	'slug' => 'emperor',
	           	'color' => '#555',
	       	),
	   	));

		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-font-sizes', array(
		   	array(
		       	'name' => esc_html__( 'small', 'musicaholic' ),
		       	'shortName' => esc_html__( 'S', 'musicaholic' ),
		       	'size' => 12,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'regular', 'musicaholic' ),
		       	'shortName' => esc_html__( 'M', 'musicaholic' ),
		       	'size' => 16,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'large', 'musicaholic' ),
		       	'shortName' => esc_html__( 'L', 'musicaholic' ),
		       	'size' => 36,
		       	'slug' => 'larger'
		   	),
		   	array(
		       	'name' => esc_html__( 'extra large', 'musicaholic' ),
		       	'shortName' => esc_html__( 'XL', 'musicaholic' ),
		       	'size' => 48,
		       	'slug' => 'huge'
		   	)
		));
		add_theme_support('editor-styles');
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'musicaholic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function musicaholic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'musicaholic_content_width', 819 );
}
add_action( 'after_setup_theme', 'musicaholic_content_width', 0 );

if ( ! function_exists( 'musicaholic_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 */
function musicaholic_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'musicaholic' ) ) {
		$fonts[] = 'Montserrat:200,300,400,500,600,700,900';
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
function musicaholic_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'musicaholic-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'musicaholic_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function musicaholic_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'musicaholic' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'musicaholic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Optional Sidebar', 'musicaholic' ),
		'id'            => 'optional-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'musicaholic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Sidebar', 'musicaholic' ),
		'id'            => 'woo-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'musicaholic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'musicaholic_widgets_init' );

/**
 * Function to detect SCRIPT_DEBUG on and off.
 * @return string If on, empty else return .min string.
 */
function musicaholic_min() {
	return defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
}

/**
 * Enqueue scripts and styles.
 */
function musicaholic_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'musicaholic-fonts', musicaholic_fonts_url(), array(), null );

	// slick
	wp_enqueue_style( 'jquery-slick', get_template_directory_uri() . '/assets/css/slick' . musicaholic_min() . '.css' );

	// slick theme
	wp_enqueue_style( 'jquery-slick-theme', get_template_directory_uri() . '/assets/css/slick-theme' . musicaholic_min() . '.css' );

	// blocks
	wp_enqueue_style( 'musicaholic-blocks', get_template_directory_uri() . '/assets/css/blocks' . musicaholic_min() . '.css' );

	wp_enqueue_style( 'musicaholic-style', get_stylesheet_uri() );

	// Load the html5 shiv.
	wp_enqueue_script( 'musicaholic-html5', get_template_directory_uri() . '/assets/js/html5' . musicaholic_min() . '.js', array(), '3.7.3' );
	wp_script_add_data( 'musicaholic-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'musicaholic-navigation', get_template_directory_uri() . '/assets/js/navigation' . musicaholic_min() . '.js', array(), '20151215', true );

	$musicaholic_l10n = array(
		'quote'          => musicaholic_get_svg( array( 'icon' => 'quote-right' ) ),
		'expand'         => esc_html__( 'Expand child menu', 'musicaholic' ),
		'collapse'       => esc_html__( 'Collapse child menu', 'musicaholic' ),
		'icon'           => musicaholic_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) ),
	);
	wp_localize_script( 'musicaholic-navigation', 'musicaholic_l10n', $musicaholic_l10n );

	wp_enqueue_script( 'musicaholic-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . musicaholic_min() . '.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'imagesloaded', '', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick' . musicaholic_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-isotope', get_template_directory_uri() . '/assets/js/isotope' . musicaholic_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-packery', get_template_directory_uri() . '/assets/js/packery' . musicaholic_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'musicaholic-custom', get_template_directory_uri() . '/assets/js/custom' . musicaholic_min() . '.js', array( 'jquery' ), '20151215', true );

}
add_action( 'wp_enqueue_scripts', 'musicaholic_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 */
function musicaholic_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'musicaholic-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks' . musicaholic_min() . '.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'musicaholic-fonts', musicaholic_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'musicaholic_block_editor_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
* TGM plugin additions.
*/
require get_template_directory() . '/inc/tgm-plugin/tgm-hook.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * WooCommerce plugin compatibility.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * OCDI plugin demo importer compatibility.
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
    require get_template_directory() . '/inc/demo-import.php';
}
