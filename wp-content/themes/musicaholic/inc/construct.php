<?php
/**
 * Functions which construct the theme by hooking into WordPress
 *
 * @package musicaholic
 */


/*------------------------------------------------
            HEADER HOOK
------------------------------------------------*/

if ( ! function_exists( 'musicaholic_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_doctype() { ?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php }
endif;
add_action( 'musicaholic_doctype_action', 'musicaholic_doctype', 10 );

if ( ! function_exists( 'musicaholic_head' ) ) :
	/**
	 * head Codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_head() { ?>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			<link rel="profile" href="http://gmpg.org/xfn/11">
			<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
				<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
			<?php endif; ?>
			<?php wp_head(); ?>
		</head>
	<?php }
endif;
add_action( 'musicaholic_head_action', 'musicaholic_head', 10 );

if ( ! function_exists( 'musicaholic_body_start' ) ) :
	/**
	 * Body start codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_body_start() { ?>
		<body <?php body_class(); ?>>
		<?php do_action( 'wp_body_open' ); ?>
	<?php }
endif;
add_action( 'musicaholic_body_start_action', 'musicaholic_body_start', 10 );


if ( ! function_exists( 'musicaholic_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_page_start() { ?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'musicaholic' ); ?></a>
	<?php }
endif;
add_action( 'musicaholic_page_start_action', 'musicaholic_page_start', 10 );


if ( ! function_exists( 'musicaholic_loader' ) ) :
	/**
	 * loader html codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_loader() { 
		if ( ! musicaholic_theme_option( 'enable_loader' ) )
			return;
		
		$loader = musicaholic_theme_option( 'loader_type' )
		?>
		<div id="loader">
            <div class="loader-container">
               	<?php echo musicaholic_get_svg( array( 'icon' => esc_attr( $loader ) ) ); ?>
            </div>
        </div><!-- #loader -->
	<?php }
endif;
add_action( 'musicaholic_page_start_action', 'musicaholic_loader', 20 );


if ( ! function_exists( 'musicaholic_header_start' ) ) :
	/**
	 * Header starts html codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_header_start() { ?>
		<header id="masthead" class="site-header attached-header hamburger <?php echo musicaholic_theme_option( 'enable_sticky_menu', false ) ? 'sticky-header' : ''; ?>">
		<div class="wrapper">
	<?php }
endif;
add_action( 'musicaholic_header_start_action', 'musicaholic_header_start', 10 );


if ( ! function_exists( 'musicaholic_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_site_branding() { ?>
		<div class="site-branding pull-left">
			<?php
			// site logo
			the_custom_logo();
			?>
			<div class="site-details">
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
				</div><!-- .site-details -->
		</div><!-- .site-branding -->
	<?php }
endif;
add_action( 'musicaholic_site_branding_action', 'musicaholic_site_branding', 10 );


if ( ! function_exists( 'musicaholic_primary_nav' ) ) :
	/**
	 * Primary nav codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_primary_nav() { ?>
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span class="screen-reader-text"><?php esc_html_e( 'Menu', 'musicaholic' ); ?></span>
            <svg viewBox="0 0 40 40" class="icon-menu">
                <g>
                    <rect y="7" width="40" height="2"/>
                    <rect y="19" width="40" height="2"/>
                    <rect y="31" width="40" height="2"/>
                </g>
            </svg>
            <?php echo musicaholic_get_svg( array( 'icon' => 'close' ) ); ?>
        </button>
		<nav id="site-navigation" class="main-navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
        			'container' => 'div',
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'primary-menu',
        			'fallback_cb' => 'musicaholic_menu_fallback_cb',
				) );
			?>
		</nav><!-- #site-navigation -->
	<?php }
endif;
add_action( 'musicaholic_primary_nav_action', 'musicaholic_primary_nav', 10 );


if ( ! function_exists( 'musicaholic_header_ends' ) ) :
	/**
	 * Header ends codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_header_ends() { ?>
		</div><!-- .wrapper -->
		</header><!-- #masthead -->
	<?php }
endif;
add_action( 'musicaholic_header_ends_action', 'musicaholic_header_ends', 10 );


if ( ! function_exists( 'musicaholic_site_content_start' ) ) :
	/**
	 * Site content start codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_site_content_start() { ?>
		<div id="content" class="site-content">
	<?php }
endif;
add_action( 'musicaholic_site_content_start_action', 'musicaholic_site_content_start', 10 );


/*------------------------------------------------
            FOOTER HOOK
------------------------------------------------*/

if ( ! function_exists( 'musicaholic_site_content_ends' ) ) :
	/**
	 * Site content ends codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_site_content_ends() { ?>
		</div><!-- #content -->
	<?php }
endif;
add_action( 'musicaholic_site_content_ends_action', 'musicaholic_site_content_ends', 10 );


if ( ! function_exists( 'musicaholic_footer_start' ) ) :
	/**
	 * Footer start codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_footer_start() { ?>
		<footer id="colophon" class="site-footer">
	<?php }
endif;
add_action( 'musicaholic_footer_start_action', 'musicaholic_footer_start', 10 );


if ( ! function_exists( 'musicaholic_site_info' ) ) :
	/**
	 * Site info codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_site_info() { 
		$copyright = musicaholic_theme_option('copyright_text');
		?>
		<div class="site-info">
            <div class="wrapper">
	                <div class="copyright">
	                	<p>
	                    	<?php 
            				if ( ! empty( $copyright ) ) :
		                    	echo musicaholic_santize_allow_tags( $copyright ); 
		                    endif;

	                    	printf( esc_html__( ' Musicaholic by %1$s Shark Themes %2$s', 'musicaholic' ), '<a href="' . esc_url( 'https://sharkthemes.com/' ) . '" target="_blank">','</a>' );
	                    	
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
add_action( 'musicaholic_site_info_action', 'musicaholic_site_info', 10 );


if ( ! function_exists( 'musicaholic_footer_ends' ) ) :
	/**
	 * Footer ends codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_footer_ends() { ?>
		</footer><!-- #colophon -->
	<?php }
endif;
add_action( 'musicaholic_footer_ends_action', 'musicaholic_footer_ends', 10 );


if ( ! function_exists( 'musicaholic_slide_to_top' ) ) :
	/**
	 * Footer ends codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_slide_to_top() { ?>
		<div class="backtotop">
            <?php echo musicaholic_get_svg( array( 'icon' => 'up' ) ); ?>
        </div><!-- .backtotop -->
	<?php }
endif;
add_action( 'musicaholic_footer_ends_action', 'musicaholic_slide_to_top', 20 );


if ( ! function_exists( 'musicaholic_page_ends' ) ) :
	/**
	 * Page ends codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_page_ends() { ?>
		</div><!-- #page -->
	<?php }
endif;
add_action( 'musicaholic_page_ends_action', 'musicaholic_page_ends', 10 );


if ( ! function_exists( 'musicaholic_body_html_ends' ) ) :
	/**
	 * Body & Html ends codes
	 *
	 * @since Musicaholic 1.0.0
	 */
	function musicaholic_body_html_ends() { ?>
		</body>
		</html>
	<?php }
endif;
add_action( 'musicaholic_body_html_ends_action', 'musicaholic_body_html_ends', 10 );
