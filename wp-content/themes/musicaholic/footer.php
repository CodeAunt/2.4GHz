<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package musicaholic
 */

/**
 * musicaholic_site_content_ends_action hook
 *
 * @hooked musicaholic_site_content_ends -  10
 *
 */
do_action( 'musicaholic_site_content_ends_action' );

/**
 * musicaholic_footer_start_action hook
 *
 * @hooked musicaholic_footer_start -  10
 *
 */
do_action( 'musicaholic_footer_start_action' );

/**
 * musicaholic_site_info_action hook
 *
 * @hooked musicaholic_site_info -  10
 *
 */
do_action( 'musicaholic_site_info_action' );

/**
 * musicaholic_footer_ends_action hook
 *
 * @hooked musicaholic_footer_ends -  10
 * @hooked musicaholic_slide_to_top -  20
 *
 */
do_action( 'musicaholic_footer_ends_action' );

/**
 * musicaholic_page_ends_action hook
 *
 * @hooked musicaholic_page_ends -  10
 *
 */
do_action( 'musicaholic_page_ends_action' );

wp_footer();

/**
 * musicaholic_body_html_ends_action hook
 *
 * @hooked musicaholic_body_html_ends -  10
 *
 */
do_action( 'musicaholic_body_html_ends_action' );
