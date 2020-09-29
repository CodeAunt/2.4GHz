<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package musicaholic
 */

get_header(); ?>

<div class="inner-page-header featured-image">
	<div class="overlay"></div>
	<?php $image = musicaholic_inner_header_image(); ?>
	<img src="<?php echo esc_url( $image ); ?>" alt="<?php the_title_attribute(); ?>">
</div>

<div class="single-template-wrapper wrapper page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
