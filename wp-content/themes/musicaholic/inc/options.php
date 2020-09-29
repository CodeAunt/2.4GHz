<?php
/**
 * Options functions
 *
 * @package musicaholic
 */

if ( ! function_exists( 'musicaholic_show_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function musicaholic_show_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'musicaholic' ),
            'off'       => esc_html__( 'No', 'musicaholic' )
        );
        return apply_filters( 'musicaholic_show_options', $arr );
    }
endif;

if ( ! function_exists( 'musicaholic_page_choices' ) ) :
    /**
     * List of pages for page choices.
     * @return Array Array of page ids and name.
     */
    function musicaholic_page_choices() {
        $pages = get_pages();
        $choices = array();
        $choices[0] = esc_html__( 'None', 'musicaholic' );
        foreach ( $pages as $page ) {
            $choices[ $page->ID ] = $page->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'musicaholic_post_choices' ) ) :
    /**
     * List of posts for post choices.
     * @return Array Array of post ids and name.
     */
    function musicaholic_post_choices() {
        $posts = get_posts( array( 'numberposts' => -1 ) );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'musicaholic' );
        foreach ( $posts as $post ) {
            $choices[ $post->ID ] = $post->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'musicaholic_category_choices' ) ) :
    /**
     * List of categories for category choices.
     * @return Array Array of category ids and name.
     */
    function musicaholic_category_choices() {
        $args = array(
                'type'          => 'post',
                'child_of'      => 0,
                'parent'        => '',
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => true,
                'hierarchical'  => 0,
                'taxonomy'      => 'category',
            );
        $categories = get_categories( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'musicaholic' );
        foreach ( $categories as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'musicaholic_product_choices' ) ) :
    /**
     * List of products for product choices.
     * @return Array Array of product ids and name.
     */
    function musicaholic_product_choices() {
        $posts = get_posts( array( 'post_type' => 'product', 'numberposts' => -1 ) );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'musicaholic' );
        foreach ( $posts as $post ) {
            $choices[ $post->ID ] = $post->post_title;
        }
        return $choices;
    }
endif;
if ( ! function_exists( 'musicaholic_product_category_choices' ) ) :
    /**
     * List of product categories for product category choices.
     * @return Array Array of product category ids and name.
     */
    function musicaholic_product_category_choices() {
        $args = array(
                'type'          => 'product',
                'child_of'      => 0,
                'parent'        => '',
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => 0,
                'hierarchical'  => 0,
                'taxonomy'      => 'product_cat',
            );
        $categories = get_categories( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'musicaholic' );
        foreach ( $categories as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'musicaholic_site_layout' ) ) :
    /**
     * site layout
     * @return array site layout
     */
    function musicaholic_site_layout() {
        $musicaholic_site_layout = array(
            'full'    => esc_url( get_template_directory_uri() ) . '/assets/uploads/full.png',
            'boxed'   => esc_url( get_template_directory_uri() ) . '/assets/uploads/boxed.png',
        );

        $output = apply_filters( 'musicaholic_site_layout', $musicaholic_site_layout );

        return $output;
    }
endif;

if ( ! function_exists( 'musicaholic_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidebar position
     */
    function musicaholic_sidebar_position() {
        $musicaholic_sidebar_position = array(
            'right-sidebar' => esc_url( get_template_directory_uri() ) . '/assets/uploads/right.png',
            'no-sidebar'    => esc_url( get_template_directory_uri() ) . '/assets/uploads/full.png',
        );

        $output = apply_filters( 'musicaholic_sidebar_position', $musicaholic_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'musicaholic_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function musicaholic_get_spinner_list() {
        $arr = array(
            'spinner-umbrella'      => esc_html__( 'Umbrella', 'musicaholic' ),
            'spinner-dots'          => esc_html__( 'Dots', 'musicaholic' ),
        );
        return apply_filters( 'musicaholic_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'musicaholic_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function musicaholic_selected_sidebar() {
        $musicaholic_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'musicaholic' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar', 'musicaholic' ),
        );

        $output = apply_filters( 'musicaholic_selected_sidebar', $musicaholic_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'musicaholic_body_product_choice' ) ) :
    /**
     * product options
     * @return array product
     */
    function musicaholic_body_product_choice() {
        $musicaholic_body_product_choice = array(
            'page'      => esc_html__( 'Page', 'musicaholic' ),
        );

        if ( class_exists( 'WooCommerce' ) ) {
            $musicaholic_body_product_choice = array_merge( $musicaholic_body_product_choice, array( 'product' => esc_html__( 'Product', 'musicaholic' ) ) );
        }

        $output = apply_filters( 'musicaholic_body_product_choice', $musicaholic_body_product_choice );

        return $output;
    }
endif;

