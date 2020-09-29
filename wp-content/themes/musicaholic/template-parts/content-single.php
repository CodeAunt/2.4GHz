<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package musicaholic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="page-header">
		<?php 
			musicaholic_article_category();
			the_title( '<h1 class="page-title">', '</h1>' ); 
		?>
    	<div class="entry-meta">
			<?php musicaholic_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	
    <div class="entry-container">
		
		<div class="entry-content">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'musicaholic' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<div class="entry-meta">
            <?php musicaholic_entry_footer(); ?>
        </div><!-- .entry-meta -->
	</div><!-- .entry-container -->
</article><!-- #post-<?php the_ID(); ?> -->
