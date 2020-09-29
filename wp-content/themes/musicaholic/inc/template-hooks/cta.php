<?php
/**
 * Call to action hook
 *
 * @package musicaholic
 */

if ( ! function_exists( 'musicaholic_add_cta_section' ) ) :
    /**
    * Add cta section
    *
    *@since Musicaholic 1.0.0
    */
    function musicaholic_add_cta_section() {

        // Check if cta is enabled on frontpage
        $cta_enable = apply_filters( 'musicaholic_section_status', 'enable_cta', 'cta_entire_site' );

        if ( ! $cta_enable )
            return false;

        if ( ! is_singular() ) {
            $paged = get_query_var( 'paged' );
            if ( $paged !== 0 )
                return false;
        }

        // Get cta section details
        $section_details = array();
        $section_details = apply_filters( 'musicaholic_filter_cta_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render cta section now.
        musicaholic_render_cta_section( $section_details );
    }
endif;
add_action( 'musicaholic_primary_content_action', 'musicaholic_add_cta_section', 90 );


if ( ! function_exists( 'musicaholic_get_cta_section_details' ) ) :
    /**
    * cta section details.
    *
    * @since Musicaholic 1.0.0
    * @param array $input cta section details.
    */
    function musicaholic_get_cta_section_details( $input ) {

        $content = array();
        $page_id = musicaholic_theme_option( 'cta_content_page', '' );
        
        $args = array(
            'post_type' => 'page',
            'page_id' => absint( $page_id ),
            'posts_per_page' => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// cta section content details.
add_filter( 'musicaholic_filter_cta_section_details', 'musicaholic_get_cta_section_details' );


if ( ! function_exists( 'musicaholic_render_cta_section' ) ) :
  /**
   * Start cta section
   *
   * @return string cta content
   * @since Musicaholic 1.0.0
   *
   */
   function musicaholic_render_cta_section( $content_details = array() ) {
        $read_more = musicaholic_theme_option( 'cta_btn_label', '' );

        if ( empty( $content_details ) )
            return;

        foreach ( $content_details as $content ) :  ?>
            <div class="page-section cta-section relative" 
                <?php if ( ! empty( $content['image'] ) ) : ?> 
                    style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');"
                <?php endif; ?>>
                <div class="overlay"></div>
                <div class="wrapper">
                    <article class="hentry">
                        <div class="post-wrapper">
                            <div class="entry-container">
                                <?php if ( ! empty( $content['title'] ) ) : ?>
                                    <div class="section-header align-center add-separator">
                                        <h2 class="section-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </div><!-- .section-header -->
                                    <div class="separator"></div>
                                <?php endif;

                                if ( ! empty( $read_more ) ) : ?>
                                    <a class="btn" href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $read_more ); ?></a>
                                <?php endif; ?>
                            </div><!-- .entry-container -->
                        </div><!-- .post-wrapper -->
                    </article>
                </div><!-- .wrapper -->
            </div><!-- #cta -->
        <?php endforeach;
    }
endif;
