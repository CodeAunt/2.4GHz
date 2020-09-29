<?php
/**
 * Team hook
 *
 * @package musicaholic
 */

if ( ! function_exists( 'musicaholic_add_team_section' ) ) :
    /**
    * Add team section
    *
    *@since Musicaholic 1.0.0
    */
    function musicaholic_add_team_section() {

        // Check if team is enabled on frontpage
        $team_enable = apply_filters( 'musicaholic_section_status', 'enable_team', '' );

        if ( ! $team_enable )
            return false;

        if ( ! is_singular() ) {
            $paged = get_query_var( 'paged' );
            if ( $paged !== 0 )
                return false;
        }

        // Get team section details
        $section_details = array();
        $section_details = apply_filters( 'musicaholic_filter_team_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render team section now.
        musicaholic_render_team_section( $section_details );
    }
endif;
add_action( 'musicaholic_primary_content_action', 'musicaholic_add_team_section', 70 );


if ( ! function_exists( 'musicaholic_get_team_section_details' ) ) :
    /**
    * team section details.
    *
    * @since Musicaholic 1.0.0
    * @param array $input team section details.
    */
    function musicaholic_get_team_section_details( $input ) {

        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 4; $i++ )  :
            $page_id = musicaholic_theme_option( 'team_content_page_' . $i );

            if ( ! empty( $page_id ) ) :
                $page_ids[] = $page_id;
            endif;

        endfor;
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 4,
            'orderby'           => 'post__in',
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 0;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
                $i++;
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// team section content details.
add_filter( 'musicaholic_filter_team_section_details', 'musicaholic_get_team_section_details' );


if ( ! function_exists( 'musicaholic_render_team_section' ) ) :
  /**
   * Start team section
   *
   * @return string team content
   * @since Musicaholic 1.0.0
   *
   */
   function musicaholic_render_team_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $title = musicaholic_theme_option( 'team_title', '' );

        ?>
        <div id="team" class="page-section team-section relative">
            <div class="wrapper">
                <?php if ( ! empty( $title ) ) : ?>
                    <div class="section-header align-center">
                        <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
                        <div class="separator"></div>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="section-content column-4">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry">
                            <div class="post-wrapper">
                                    <div class="featured-image">
                                        <?php if ( ! empty( $content['image'] ) ) : ?>
                                            <a href="<?php echo esc_url( $content['url'] ); ?>">
                                                <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                                                <div class="overlay"></div>
                                            </a>
                                        <?php endif; ?> 
                                            
                                    </div>

                                <div class="entry-container no-position">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>
                                </div>
                            </div><!-- .post-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #gallery -->
    <?php 
    }
endif;