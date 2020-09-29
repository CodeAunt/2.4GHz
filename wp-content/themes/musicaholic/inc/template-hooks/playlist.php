<?php
/**
 * Playlist hook
 *
 * @package musicaholic
 */

if ( ! function_exists( 'musicaholic_add_playlist_section' ) ) :
    /**
    * Add playlist section
    *
    *@since Musicaholic 1.0.0
    */
    function musicaholic_add_playlist_section() {

        // Check if playlist is enabled on frontpage
        $playlist_enable = apply_filters( 'musicaholic_section_status', 'enable_playlist', '' );

        if ( ! $playlist_enable )
            return false;

        if ( ! is_singular() ) {
            $paged = get_query_var( 'paged' );
            if ( $paged !== 0 )
                return false;
        }

        // Render playlist section now.
        musicaholic_render_playlist_section();
    }
endif;
add_action( 'musicaholic_primary_content_action', 'musicaholic_add_playlist_section', 60 );

if ( ! function_exists( 'musicaholic_render_playlist_section' ) ) :
  /**
   * Start playlist section
   *
   * @return string playlist content
   * @since Musicaholic 1.0.0
   *
   */
   function musicaholic_render_playlist_section() {
        $background = musicaholic_theme_option( 'playlist_image', '' );
        $content = array();
        $page_id = musicaholic_theme_option( 'playlist_content_page', '' );
        
        $args = array(
            'post_type' => 'page',
            'page_id' => absint( $page_id ),
            'posts_per_page' => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : ?>
            <div id="playlist" class="page-section playlist-section relative left-align" <?php if ( ! empty( $background ) ) { echo 'style="background-image: url(' . $background . ')"';  } ?>>
                <div class="overlay"></div>
                <div class="wrapper">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <article class="hentry">
                        <div class="post-wrapper">
                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <?php the_title(); ?>
                                    </h2>
                                </header>
                                
                                <div class="entry-content">
                                    <?php the_content(); ?>
                                </div><!-- .entry-content -->

                            </div><!-- .entry-container -->
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="featured-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
                                    </a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>
                        </div><!-- .post-wrapper -->
                    </article>
                <?php endwhile; ?>
                </div><!-- .wrapper -->
            </div><!-- #playlist -->
        <?php endif;
        wp_reset_postdata();
    }
endif;