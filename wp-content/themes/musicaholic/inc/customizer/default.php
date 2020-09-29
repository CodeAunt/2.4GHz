<?php
/**
 * Default Theme Customizer Values
 *
 * @package musicaholic
 */

function musicaholic_get_default_theme_options() {
	$musicaholic_default_options = array(
		// default options

		// Slider
		'enable_slider'			=> false,
		'slider_arrow'			=> true,
		'slider_auto_slide'		=> true,
		'slider_btn_label'		=> esc_html__( 'Read More', 'musicaholic' ),

		// Introduction
		'enable_introduction'		=> false,
		'introduction_btn_label'	=> esc_html__( 'Read More', 'musicaholic' ),

		// Playlist
		'enable_playlist'		=> false,

		// Team
		'enable_team'			=> false,
		'team_title'			=> esc_html__( 'Meet Artists', 'musicaholic' ),

		// Product
		'enable_product'		=> false,
		'product_title'			=> esc_html__( 'For Sell', 'musicaholic' ),
		'product_content_type'	=> 'page',
		'product_readmore'		=> esc_html__( 'Read More', 'musicaholic' ),

		// Call to action
		'enable_cta'			=> false,
		'cta_btn_label'			=> esc_html__( 'Buy a Ticket', 'musicaholic' ),

		// Footer
		'slide_to_top'			=> true,
		'copyright_text'		=> esc_html__( 'Copyright &copy; 2020 | All Rights Reserved.', 'musicaholic' ),

		// blog / archive
		'latest_blog_title'		=> esc_html__( 'Latest Blogs', 'musicaholic' ),
		'blog_column_type'		=> 'column-3',
		'excerpt_count'			=> 20,
		'pagination_type'		=> 'numeric',
		'sidebar_layout'		=> 'right-sidebar',
		'column_type'			=> 'column-2',
		'show_date'				=> true,
		'show_category'			=> true,
		'show_author'			=> true,

		// single post
		'sidebar_single_layout'	=> 'right-sidebar',
		'show_single_date'		=> true,
		'show_single_category'	=> true,
		'show_single_tags'		=> true,
		'show_single_author'	=> true,

		// page
		'sidebar_page_layout'	=> 'right-sidebar',

		// global
		'enable_sticky_menu'	=> false,
		'enable_loader'			=> false,
		'loader_type'			=> 'spinner-dots',
		'site_layout'			=> 'full',
		'header_typography'		=> 'default',
		'body_typography'		=> 'default',

	);

	$output = apply_filters( 'musicaholic_default_theme_options', $musicaholic_default_options );
	return $output;
}