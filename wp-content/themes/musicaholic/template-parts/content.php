<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package musicaholic
 */

$class = 'grid-item';
$class .= has_post_thumbnail() ? '' : ' no-post-thumbnail';
$read_more = musicaholic_theme_option( 'read_more_text', esc_html__( 'View Details', 'musicaholic' ) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>
	<div class="post-wrapper">
		<?php if ( has_post_thumbnail() ) : ?>
            <div class="featured-image">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'medium_large', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
                </a>
            </div><!-- .recent-image -->
            <div class="overlay"></div>
        <?php endif; ?>
        <div class="entry-container">
			<header class="entry-header">
				<?php if ( 'post' === get_post_type() ) : ?>
					<?php musicaholic_article_category(); ?>
				<?php
				endif;

				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>
			</header><!-- .entry-header -->

			<div class="entry-header">
                <?php musicaholic_posted_on(); ?>
            </div><!-- .entry-meta -->

			<div class="entry-content">
				<?php
					the_excerpt();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'musicaholic' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
			
		</div><!-- .entry-container -->
	</div><!-- .post-wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->
