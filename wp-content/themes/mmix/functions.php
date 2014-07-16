<?php

require_once('inc/wp_bootstrap_navwalker.php');
require_once('inc/gallery-shortcode.php');
require_once('inc/partner.php');
require_once('inc/faq.php');

//loads settings (not plugged yet..)
//require_once('inc/settings/admin-init.php');

function theme_setup()
{
  register_nav_menu( 'primary', 'Menu principal' );
  add_theme_support( 'post-thumbnails' );

  //add image size
  add_image_size( 'big-banner', 1200, 290, true );

  //hide admin bar for everyone..
  add_filter('show_admin_bar', '__return_false');
}
add_action( 'after_setup_theme', 'theme_setup' );

function custom_scripts()
{
  //styles
  wp_enqueue_style( 'bootstrap-css',  get_template_directory_uri().'/css/bootstrap.simplex.css', array(), null );
  wp_enqueue_style( 'bootstrap-theme',  get_template_directory_uri().'/css/bootstrap-theme.css', array(), null );
  wp_enqueue_style( 'fontawesome-css',  get_template_directory_uri().'/css/font-awesome.min.css', array(), null );

  //scripts
  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20140204', false );

  wp_enqueue_script( 'scripts-js', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '20140204', true );

  //fancybox
  wp_enqueue_script( 'fancybox-js', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.pack.js', array( 'jquery' ), '20140204', true );
  wp_enqueue_style( 'fancybox-css',  get_template_directory_uri().'/js/fancybox/jquery.fancybox.css', array(), null );

}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );


//edit post link
//Add class to edit button
function custom_edit_post_link($output) {
  $output = str_replace('class="post-edit-link"', 'class="post-edit-link btn btn-primary btn-sm"', $output);
  return $output;
}
add_filter('edit_post_link', 'custom_edit_post_link');


function show_pagination_links()
{
  global $wp_query;

  $page_tot = $wp_query->max_num_pages;
  $page_cur = get_query_var( 'paged' );
  $big = 999999999;

  if ( $page_tot == 1 ) return;

  $pages = paginate_links( array(
      'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ), // need an unlikely integer cause the url can contains a number
      'format' => '?paged=%#%',
      'current' => max( 1, $page_cur ),
      'total' => $page_tot,
      'prev_next' => true,
      'end_size' => 1,
      'mid_size' => 1,
      'type' => 'array',
      'prev_text'    => __('« '),
      'next_text'    => __(' »'),
    )
  );

  $return = '<ul class="pagination pagination-sm">';
  for($i=0,$c=count($pages);$i<$c;$i++)
  {
      $return .= '<li>'.$pages[$i].'</li>';
  }
  $return .= '</ul>';

  echo $return;
}

if ( function_exists('register_sidebar') ) {
  register_sidebar(array(
    'name' => 'Homepage Sidebar',
    'id' => 'homepage-sidebar',
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>',
  ));
}

function get_list_pages($args = '') {
  if ( is_array($args) )
    $r =  &$args;
  else
    parse_str($args, $r);

  $defaults = array('depth' => 0, 'show_date' => '', 'date_format' => get_option('date_format'),
    'child_of' => 0, 'exclude' => "", 'title_li' => __('Pages'), 'echo' => 1, 'authors' => '', 'sort_column' => 'menu_order, post_title');
  $r = array_merge($defaults, $r);

  $output = '';
  $current_page = 0;

  // sanitize, mostly to keep spaces out
  $r['exclude'] = preg_replace('[^0-9,]', '', $r['exclude']);

  // Allow plugins to filter an array of excluded pages
  $r['exclude'] = implode(',', apply_filters('wp_list_pages_excludes', explode(',', $r['exclude'])));

  // Query pages.
  $pages = get_pages($r);

  return $pages;
}


/* custom style text editor */
function themeit_mce_buttons_2( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}
add_filter( 'mce_buttons_2', 'themeit_mce_buttons_2' );
function themeit_tiny_mce_before_init( $settings ) {

  $style_formats = array(
    //add styles here...
    array( 'title' => 'Museomix Font', 'inline'=> 'span', 'classes' => 'mmixFont' ),
    array( 'title' => 'Roboto Font', 'inline'=> 'span', 'classes' => 'robotoFont' ),
    array( 'title' => 'Roboto Condensed Font', 'inline'=> 'span', 'classes' => 'robotoCondensedFont' ),

  );
  $settings['style_formats'] = json_encode( $style_formats );
  return $settings;
}
add_filter( 'tiny_mce_before_init', 'themeit_tiny_mce_before_init' );

function my_theme_add_editor_styles() {
  add_editor_style( 'style-editor.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

//language switcher
function icl_language_switcher()
{
  $output = '';
  $languages = icl_get_languages('orderby=name');
  foreach($languages as $l){
    $active = ($l['active']==1) ? 'active' : '';
    $hide = ($l['active']==1) ? 'hide' : '';
    $output .= '<li class="langSelector '.$hide.'"><a href="'.$l['url'].'" class="'.$active.'">'.$l['language_code'].'</a></li>';
  }

  echo $output;
}

//special shortcodes for languages..
function wpml_show_fr($atts, $content = null)
{
  if(ICL_LANGUAGE_CODE == 'fr')
    return do_shortcode($content);
}
add_shortcode('fr', 'wpml_show_fr');
function wpml_show_en($atts, $content = null)
{
  if(ICL_LANGUAGE_CODE == 'en')
    return do_shortcode($content);
}
add_shortcode('en', 'wpml_show_en');

add_filter('widget_text', 'do_shortcode');
add_filter('gettext', 'do_shortcode');

/*  */



/**
 * custom form user meta
 */

add_filter( 'user_meta_field_config', 'user_meta_field_config_function', 10, 3 );
function user_meta_field_config_function( $field, $fieldID, $formName ){
  if( $fieldID != 'Enter field id that you need to control' )
    return $field;

  $field['field_class'] = 'form-control';

  return $field;
}

function remove_more_link_scroll( $link ) {
  $link = preg_replace( '|#more-[0-9]+|', '', $link );
  return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );


///
add_filter('widget_text', 'do_shortcode');