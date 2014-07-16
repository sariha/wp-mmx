<?php


// Register Custom Post Type
function mmix_faq() {

  $labels = array(
    'name'                => _x( 'FAQ', 'Post Type General Name', 'mmix' ),
    'singular_name'       => _x( 'FAQ', 'Post Type Singular Name', 'mmix' ),
    'menu_name'           => __( 'FAQ', 'mmix' ),
    'parent_item_colon'   => __( 'Parent FAQ:', 'mmix' ),
    'all_items'           => __( 'All FAQ', 'mmix' ),
    'view_item'           => __( 'View FAQ', 'mmix' ),
    'add_new_item'        => __( 'Add New question', 'mmix' ),
    'add_new'             => __( 'Add New', 'mmix' ),
    'edit_item'           => __( 'Edit question', 'mmix' ),
    'update_item'         => __( 'Update question', 'mmix' ),
    'search_items'        => __( 'Search question', 'mmix' ),
    'not_found'           => __( 'Not found', 'mmix' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'mmix' ),
  );
  $rewrite = array(
    'slug'                => 'faq',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => false,
  );
  $args = array(
    'label'               => __( 'mmix_faq', 'mmix' ),
    'description'         => __( 'FAQ for museomix', 'mmix' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail','excerpt' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'menu_icon'           => get_template_directory_uri().'/img/icn_faq.png',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'page',
  );
  register_post_type( 'mmix_faq', $args );

}

// Hook into the 'init' action
add_action( 'init', 'mmix_faq', 0 );

/* trick to change the title name */
function change_default_title_faq( $title ){

  $screen = get_current_screen();
  if  ( 'mmix_faq' == $screen->post_type )
    return 'Question...';

  return $title;
}
add_filter( 'enter_title_here', 'change_default_title_faq' );