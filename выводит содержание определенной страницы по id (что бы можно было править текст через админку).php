<?
  $postId = 75;
  $post = get_post($postId);
  echo '<h2>'.$post->post_title.'</h2>';
  echo '<div>'.$post->post_content.'</div>';
?>
