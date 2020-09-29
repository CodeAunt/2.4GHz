<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package musicaholic
 */

get_header(); 
$column = musicaholic_theme_option( 'column_type' ); ?>

<div class="inner-page-header featured-image">
	<div class="overlay"></div>
	<?php $image = musicaholic_inner_header_image(); ?>
	<img src="<?php echo esc_url( $image ); ?>">
</div>

<div class="wrapper page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<header class="page-header">
				<h1 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'musicaholic' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
			</header><!-- .page-header -->
			<div class="blog-posts-wrapper grid <?php echo esc_attr( $column ) ?>">
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
