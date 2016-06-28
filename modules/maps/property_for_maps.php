<?php
      global $wpdb;

      $table_posts = $wpdb->get_blog_prefix() . 'posts';
      $table_postmeta  = $wpdb->get_blog_prefix() . 'postmeta';

      $property_info    =  $wpdb->get_results("SELECT id, post_title, post_content
                                             FROM $table_posts
                                             WHERE post_type = 'property' AND post_status = 'publish'", ARRAY_A);


      $latitude     =    $wpdb->get_results("SELECT `meta_value`
                                             FROM $table_postmeta
                                             WHERE `post_id`
                                             IN (SELECT id
                                                 FROM $table_posts
                                                 WHERE post_type = 'property')
                                             AND `meta_key` = 'latitude'", ARRAY_A);


      $longitude     =    $wpdb->get_results("SELECT `meta_value`
                                              FROM $table_postmeta
                                              WHERE `post_id`
                                              IN (SELECT id
                                                  FROM $table_posts
                                                  WHERE post_type = 'property')
                                              AND `meta_key` = 'longitude'", ARRAY_A);


      $count_div_for_maps = [];
      $coordinates_and_info = '';
      for($i = 0; $i < count($latitude); $i++)
      {

          if(!empty($latitude[$i]['meta_value']) || !empty($longitude[$i]['meta_value']))
          {
              $count_div_for_maps[$i] = $i;

              $num = $i + 1;
              $coordinates_and_info .= $latitude[$i]['meta_value'] . ',';
              $coordinates_and_info .= $longitude[$i]['meta_value'] . ',';
              $coordinates_and_info .= $property_info[$i]['post_content'] . ',';
              $coordinates_and_info .= $property_info[$i]['post_title'] . ';';
          }
      }

?>
