<?php


/**
* Load Shortcode my short codes
**/
require get_template_directory() . '/inc/shortcodes/sc-themeshortcodes.php';






/**
* Shortcode Support in various places
**/
add_filter( 'the_excerpt', 'do_shortcode');
add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'comment_text', 'do_shortcode' );

/**
* Fixing issues of unexpected p or br tag around shortcodes
**/
if( !function_exists('bootscore_wp_fix_shortcodes') ) {
  function bootscore_wp_fix_shortcodes($content){   
    $array = array (
      '<p>[' => '[', 
      ']</p>' => ']', 
      ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
  }
  add_filter('the_content', 'bootscore_wp_fix_shortcodes');
}

/**
* Load Shortcode mce-buttons Support File.
**/
require get_template_directory() . '/inc/shortcodes/mce-button/mce-functions.php';



