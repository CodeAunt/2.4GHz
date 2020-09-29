<?php
/**
 * Product hook
 *
 * @package musicaholic
 */

if ( ! function_exists( 'musicaholic_add_product_section' ) ) :
    /**
    * Add product section
    *
    *@since Kiddiz Pro 1.0.0
    */
    function musicaholic_add_product_section() {

        // Check if product is enabled on frontpage
        $product_enable = apply_filters( 'musicaholic_section_status', 'enable_product', '' );

        if ( ! $product_enable )
            return false;

        if ( ! is_singular() ) {
            $paged = get_query_var( 'paged' );
            if ( $paged !== 0 )
                return false;
        }

        // Get product section details
        $section_details = array();
        $section_details = apply_filters( 'musicaholic_filter_product_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render product section now.
        musicaholic_render_product_section( $section_details );
    }
endif;
add_action( 'musicaholic_primary_content_action', 'musicaholic_add_product_section', 80 );


if ( ! function_exists( 'musicaholic_get_product_section_details' ) ) :
    /**
    * product section details.
    *
    * @since Kiddiz Pro 1.0.0
    * @param array $input product section details.
    */
    function musicaholic_get_product_section_details( $input ) {

        // Content type.
        $product_content_type  = musicaholic_theme_option( 'product_content_type' );
        $content = array();
        switch ( $product_content_type ) {

            case 'page':
                $page_ids = array();

                for ( $i = 1; $i <= 4; $i++ )  :
                    $page_id = musicaholic_theme_option( 'product_content_page_' . $i );

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
            break;

            case 'product':
                if ( ! class_exists( 'WooCommerce' ) ) {
                    return;
                }

                $post_ids = array();

                for ( $i = 1; $i <= 4; $i++ )  :
                    $post_id = musicaholic_theme_option( 'product_content_product_' . $i );

                    if ( ! empty( $post_id ) ) :
                        $post_ids[] = $post_id;
                    endif;
                endfor;
                
                $args = array(
                    'post_type'         => 'product',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => 4,
                    'orderby'           => 'post__in',
                    );                    
            break;

            default:
            break;
        }


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 0;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = musicaholic_trim_content( 15 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

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
// product section content details.
add_filter( 'musicaholic_filter_product_section_details', 'musicaholic_get_product_section_details' );


if ( ! function_exists( 'musicaholic_render_product_section' ) ) :
  /**
   * Start product section
   *
   * @return string product content
   * @since Kiddiz Pro 1.0.0
   *
   */
   function musicaholic_render_product_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $product_content_type  = musicaholic_theme_option( 'product_content_type' );
        $title = musicaholic_theme_option( 'product_title', '' );
        $readmore = musicaholic_theme_option( 'product_readmore', esc_html__('Learn More', 'musicaholic' ) );

        ?>
        <div id="product" class="page-section relative center-align">
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
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                                        </a>

                                        <?php if ( in_array( $product_content_type, array( 'product', 'product-category' ) ) ) : 
                                            $product = wc_get_product( $content['id'] );

                                            if ( $product->is_on_sale() ) : ?>
                                                <span class="onsale"><?php esc_html_e( 'Sale!', 'musicaholic' ); ?></span>
                                            <?php endif; 
                                        endif; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="entry-container">
                                    <?php if ( !empty( $content['title'] ) ) : ?>
                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>
                                    <?php endif;

                                    if ( in_array( $product_content_type, array( 'product', 'product-category' ) ) ) : ?>
                                        <span class="price"><?php echo $product->get_price_html(); ?></span>
                                    <?php endif;

                                    if ( !empty( $content['excerpt'] ) ) : ?>
                                        <div class="entry-content">
                                            <?php echo wp_kses_post( $content['excerpt'] ); ?>
                                        </div><!-- .entry-content -->
                                    <?php endif;

                                    if ( in_array( $product_content_type, array( 'product', 'product-category' ) ) ) : ?>
                                        <a href="?add-to-cart=<?php echo absint( $content['id'] ); ?>" data-quantity="1" class="button more-btn add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo absint( $content['id'] ); ?>" rel="nofollow"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></a>
                                    <?php else : ?>
                                        <a class="more-btn" href="<?php echo esc_url( $content['url'] ); ?>">
                                            <span class="screen-reader-text"><?php echo esc_html( $content['title'] ); ?></span>
                                            <?php echo esc_html( $readmore ); ?>
                                        </a>
                                    <?php endif; ?>
                                </div><!-- .entry-container -->

                            </div><!-- .post-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #product -->
    <?php 
    }
endif;