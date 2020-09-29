<?php
/**
 * Callbacks functions
 *
 * @package musicaholic
 */

if ( ! function_exists( 'musicaholic_product_content_page_enable' ) ) :
	/**
	 * Check if product content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function musicaholic_product_content_page_enable( $control ) {
		return 'page' == $control->manager->get_setting( 'musicaholic_theme_options[product_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'musicaholic_product_content_product_enable' ) ) :
	/**
	 * Check if product content type is product.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function musicaholic_product_content_product_enable( $control ) {
		return 'product' == $control->manager->get_setting( 'musicaholic_theme_options[product_content_type]' )->value();
	}
endif;














if ( ! function_exists( 'musicaholic_blog_filter_category' ) ) :
	/**
	 * Check if blog filter category enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function musicaholic_blog_filter_category( $control ) {
		return ( in_array( $control->manager->get_setting( 'musicaholic_theme_options[filter_blog_posts]' )->value(), array( 'category', 'both' ) ) );
	}
endif;

if ( ! function_exists( 'musicaholic_blog_filter_tag' ) ) :
	/**
	 * Check if blog filter tag enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function musicaholic_blog_filter_tag( $control ) {
		return ( in_array( $control->manager->get_setting( 'musicaholic_theme_options[filter_blog_posts]' )->value(), array( 'tag', 'both' ) ) );
	}
endif;
