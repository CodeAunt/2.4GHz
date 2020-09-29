<?php
/**
 * Templated sections init
 *
 * @package musicaholic
 */

/**
 * Add template hooks defaults.
 */
// slider
require get_template_directory() . '/inc/template-hooks/slider.php';

// introduction
require get_template_directory() . '/inc/template-hooks/introduction.php';

// playlist
require get_template_directory() . '/inc/template-hooks/playlist.php';

// team
require get_template_directory() . '/inc/template-hooks/team.php';

// product
require get_template_directory() . '/inc/template-hooks/product.php';

// cta
require get_template_directory() . '/inc/template-hooks/cta.php';
