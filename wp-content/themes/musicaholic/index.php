<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package musicaholic
 */

get_header(); 
?>

<div class="wrapper page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<header class="page-header add-separator">
				<h1 class="page-title"><?php echo ( is_home() && ! is_front_page() ) ? single_post_title( '', false ) : esc_html( musicaholic_theme_option( 'latest_blog_title', esc_html__( 'Blogs', 'musicaholic' ) ) ); ?></h1>
				<div class="separator"></div>
			</header><!-- .page-header -->

			<div class="blog-posts-wrapper grid <?php echo esc_attr( musicaholic_theme_option( 'blog_column_type','column-3' ) ); ?>">
				<?php
				if ( have_posts() ) : 

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div><!-- #blog-posts-wrapper -->
			<?php  
			/**
			* Hook - musicaholic_pagination_action.
			*
			* @hooked musicaholic_pagination 
			*/
			do_action( 'musicaholic_pagination_action' ); 
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrapper -->

<?php
get_footer();
