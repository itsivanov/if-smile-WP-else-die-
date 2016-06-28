<?php
// In template

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array(
  'posts_per_page' => 2,
  'paged' => $paged
);

$custom_query = new WP_Query( $args );

while($custom_query->have_posts()) :
  $custom_query->the_post();
?>
<div>
<ul>
 <li>
   <h3><a class="blog-title" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
 <span>Written <i>by:&nbsp;</i> <a class="link" href="<?php bloginfo('url'); ?>/author/<?php the_author(); ?>"> <?php the_author(); ?></a> <i>on</i> <?php the_time('F j, Y'); ?> <a class="link" href="<?php the_permalink(); ?>#comments "><?php comments_number( '', '- 1 comment', '- % comments' ); ?></a></span>
 <div>
    <ul>
   <div><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
    </ul>
    <ul>
   <li class="work-description"><?php echo the_excerpt(); ?></li>
    </ul>
 </div>
 <div><?php the_tags(); ?>
  </li>
</ul>
</div> <!-- end blog posts -->

<?php endwhile; ?>
</div>

<?php
if (function_exists("pagination")) {
   pagination($custom_query->max_num_pages);
}
?>


<?php
// In function.php

// Numbered pagination
function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
                  echo '<div class="paginations">';
        //echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
        //if($paged > 2 && $paged > $range+1 && $showitems < $pages)
                 echo "<a class='pagination_first' href='".get_pagenum_link(1)."'>&laquo;</a>";

                         // < Previous page
                         if(basename($_SERVER['REQUEST_URI']) > 0)
                         {
                                echo "<a class='prev_page pag-prev-next pag-prev' href=\"".get_pagenum_link(basename($_SERVER['REQUEST_URI']) - 1)."\"> Poprzednia</a>";
                         }
                         else
                         {
                                echo "<span class='no_prev_page pag-prev-next pag-prev'> Poprzednia</span>";
                         }
                         // >



        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
        //if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages)

                      // < Next page
                        if(basename($_SERVER['REQUEST_URI']) != $pages)
                        {
                             if(!empty((int)basename($_SERVER['REQUEST_URI'])))
                             {
                                 echo "<a class='next_page pag-prev-next pag-next' href=\"".get_pagenum_link(basename($_SERVER['REQUEST_URI']) + 1)."\">Nastepna</a>";
                             }
                             else
                             {
                                     echo "<a class='next_page pag-prev-next pag-next' href=\"".get_pagenum_link(2)."\">Nastepna</a>";
                             }
                        }
                        else
                        {
                             echo "<span class='no_next_page pag-prev-next pag-next'>Nastepna </span>";
                        }
                        // >

                 echo "<a class='pagination_last' href='".get_pagenum_link($pages)."'>&raquo;</a>";
        echo '</div>';
    }
}
