<?php
/**
 * template for displaying search forms
 *
 * @package musicaholic
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'musicaholic' ); ?></span>
	</label>
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'musicaholic' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo musicaholic_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'musicaholic' ); ?></span></button>
</form>
