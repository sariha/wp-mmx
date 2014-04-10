<?php

require_once('inc/wp_bootstrap_navwalker.php');
require_once('inc/gallery-shortcode.php');


function theme_setup()
{
  register_nav_menu( 'primary', 'Menu principal' );
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'dty-full-width', 750, 99999999, false );
  add_image_size( 'thumb-gallery', 200, 120, false );
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

  );
  $settings['style_formats'] = json_encode( $style_formats );
  return $settings;
}
add_filter( 'tiny_mce_before_init', 'themeit_tiny_mce_before_init' );

//language switcher
function icl_language_switcher()
{
  $output = '';
  $languages = icl_get_languages('orderby=name');
  foreach($languages as $l){
    $active = ($l['active']==1) ? 'active' : '';
    $output .= '<a href="'.$l['url'].'" class="btn btn-info btn-xs '.$active.'">'.$l['native_name'].'</a>';
  }

  echo $output;
}

//trads
function trad($fr, $en = null)
{
  if(!empty($en))
  {
    if(ICL_LANGUAGE_CODE == 'en')
    {
      return $en;
    }
    return $fr;
  }
  return $fr;
}