<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package musicaholic
 */

get_header(); ?>

<div class="inner-page-header featured-image">
	<div class="overlay"></div>
	<?php $image = musicaholic_inner_header_image(); ?>
	<img src="<?php echo esc_url( $image ); ?>" alt="<?php single_post_title(); ?>">
</div>

<div class="single-template-wrapper wrapper page-section align-center">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<h1 class="error-heading"><?php esc_html_e( '404', 'musicaholic' ); ?></h1>
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'musicaholic' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search.', 'musicaholic' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
