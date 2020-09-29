<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package musicaholic
 */

/**
 * musicaholic_doctype_action hook
 *
 * @hooked musicaholic_doctype -  10
 *
 */
do_action( 'musicaholic_doctype_action' );

/**
 * musicaholic_head_action hook
 *
 * @hooked musicaholic_head -  10
 *
 */
do_action( 'musicaholic_head_action' );

/**
 * musicaholic_body_start_action hook
 *
 * @hooked musicaholic_body_start -  10
 *
 */
do_action( 'musicaholic_body_start_action' );
 
/**
 * musicaholic_page_start_action hook
 *
 * @hooked musicaholic_page_start -  10
 * @hooked musicaholic_loader -  20
 *
 */
do_action( 'musicaholic_page_start_action' );

/**
 * musicaholic_header_start_action hook
 *
 * @hooked musicaholic_header_start -  10
 *
 */
do_action( 'musicaholic_header_start_action' );

/**
 * musicaholic_site_branding_action hook
 *
 * @hooked musicaholic_site_branding -  10
 *
 */
do_action( 'musicaholic_site_branding_action' );

/**
 * musicaholic_primary_nav_action hook
 *
 * @hooked musicaholic_primary_nav -  10
 *
 */
do_action( 'musicaholic_primary_nav_action' );

/**
 * musicaholic_header_ends_action hook
 *
 * @hooked musicaholic_header_ends -  10
 *
 */
do_action( 'musicaholic_header_ends_action' );

/**
 * musicaholic_site_content_start_action hook
 *
 * @hooked musicaholic_site_content_start -  10
 *
 */
do_action( 'musicaholic_site_content_start_action' );

/**
 * musicaholic_primary_content_action hook
 *
 * @hooked musicaholic_add_slider_section -  10
 *
 */
do_action( 'musicaholic_primary_content_action' );