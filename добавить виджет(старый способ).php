<?
function bert_widgets_init() {

        if ( function_exists('register_sidebar') )
   register_sidebar(array(
       'name' => 'Localization',
       'id'            => 'localization',
       'description' => '',
       'before_widget' => '',
       'after_widget' => '',
       'before_title' => '<p style="display: none">',
       'after_title' => '</p>',
   ));

      if ( function_exists('register_sidebar') )
      register_sidebar(array(
              'name' => 'Footer',
              'id'            => 'footer',
              'description' => '',
              'before_widget' => '',
              'after_widget' => '',
              'before_title' => '<p style="display: none">',
              'after_title' => '</p>',
      ));

        if ( function_exists('register_sidebar') )
        register_sidebar(array(
                'name' => 'Logo',
                'id'            => 'logo',
                'description' => '',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '<p style="display: none">',
                'after_title' => '</p>',
        ));

}
add_action( 'widgets_init', 'bert_widgets_init' ); ?>
