<?php
/**
 * demo import
 *
 * @package musicaholic
 */

/**
 * Imports predefine demos.
 * @return [type] [description]
 */
function musicaholic_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Demo content files for Musicaholic Theme.', 'musicaholic' ),
    esc_url( 'https://sharkthemes.com/downloads/musicaholic' ), esc_html__( 'Click here', 'musicaholic' ) );

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'musicaholic_intro_text' );