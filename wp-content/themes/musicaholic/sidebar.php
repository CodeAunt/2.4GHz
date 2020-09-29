<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package musicaholic
 */
$sidebar_layout = musicaholic_sidebar_layout();
if ( 'no-sidebar' == $sidebar_layout ) {
	return;
}

$sidebar = 'sidebar-1';
if ( is_singular() ) {
	$sidebar = get_post_meta( get_the_ID(), 'musicaholic-selected-sidebar', true );
	$sidebar = ! empty( $sidebar ) ? $sidebar : 'sidebar-1';
}

if ( class_exists( 'WooCommerce' ) && is_woocommerce() ) {
	$sidebar = 'woo-sidebar';
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( $sidebar ); ?>
</aside><!-- #secondary -->
