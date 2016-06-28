<?php
// Posts category "Wspieramy-spolecznosc" with pagination
function comment($atts, $content = null){

            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

            $args = array(
                 'posts_per_page' => 1,
                 'paged' => $paged,
                 'post_type' => 'comments',
                 'order' => 'DESC',
                 'post_status' => 'publish'
            );

            $custom_query = new WP_Query( $args );

            while($custom_query->have_posts()) :
                 $custom_query->the_post();
            ?>

            <div class="posts_news">
                <div class="posts_content2">
                    <?php the_post_thumbnail('full'); ?>
                    <?php echo the_title(); ?>
                    <?php echo the_content(); ?>
                </div>
            </div>

             <?php endwhile; ?>
            </div>

            <?php
            if (function_exists("pagination")) {
                    pagination($custom_query->max_num_pages);
            }
  				}
add_shortcode( 'comment', 'comment');
