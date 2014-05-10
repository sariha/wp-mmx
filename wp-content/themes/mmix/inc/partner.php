<?php


// Register Custom Post Type
function mmix_partners() {

  $labels = array(
    'name'                => _x( 'Partners', 'Post Type General Name', 'mmix' ),
    'singular_name'       => _x( 'Partner', 'Post Type Singular Name', 'mmix' ),
    'menu_name'           => __( 'Partners', 'mmix' ),
    'parent_item_colon'   => __( 'Parent partner:', 'mmix' ),
    'all_items'           => __( 'All partners', 'mmix' ),
    'view_item'           => __( 'View partner', 'mmix' ),
    'add_new_item'        => __( 'Add New partner', 'mmix' ),
    'add_new'             => __( 'Add New', 'mmix' ),
    'edit_item'           => __( 'Edit partner', 'mmix' ),
    'update_item'         => __( 'Update partner', 'mmix' ),
    'search_items'        => __( 'Search partner', 'mmix' ),
    'not_found'           => __( 'Not found', 'mmix' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'mmix' ),
  );
  $rewrite = array(
    'slug'                => 'partner',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => false,
  );
  $args = array(
    'label'               => __( 'mmix_partner', 'mmix' ),
    'description'         => __( 'Team partners for museomix', 'mmix' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail','excerpt' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'menu_icon'           => get_template_directory_uri().'/img/partnermmix.png',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'page',
  );
  register_post_type( 'partner', $args );

}

// Hook into the 'init' action
add_action( 'init', 'mmix_partners', 0 );

/* trick to change the title name */
function change_default_title( $title ){
  $screen = get_current_screen();
  if  ( 'mmix_partners' == $screen->post_type )
    return 'Entre partner name here...';

  return $title;
}
add_filter( 'enter_title_here', 'change_default_title' );


/* members groups */
// Register Custom Taxonomy
function team_group() {

  $labels = array(
    'name'                       => _x( 'Groups', 'Taxonomy General Name', 'mmix' ),
    'singular_name'              => _x( 'Group', 'Taxonomy Singular Name', 'mmix' ),
    'menu_name'                  => __( 'Group', 'mmix' ),
    'all_items'                  => __( 'All groups', 'mmix' ),
    'parent_item'                => __( 'Parent group', 'mmix' ),
    'parent_item_colon'          => __( 'Parent group:', 'mmix' ),
    'new_item_name'              => __( 'New group', 'mmix' ),
    'add_new_item'               => __( 'Add New group', 'mmix' ),
    'edit_item'                  => __( 'Edit group', 'mmix' ),
    'update_item'                => __( 'Update group', 'mmix' ),
    'separate_items_with_commas' => __( 'Separate groups with commas', 'mmix' ),
    'search_items'               => __( 'Search groups', 'mmix' ),
    'add_or_remove_items'        => __( 'Add or remove groups', 'mmix' ),
    'choose_from_most_used'      => __( 'Choose from the most used groups', 'mmix' ),
    'not_found'                  => __( 'Not Found', 'mmix' ),
  );
  $rewrite = array(
    'slug'                       => 'teamgroup',
    'with_front'                 => true,
    'hierarchical'               => false,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'team_group', 'partner', $args );

}

// Hook into the 'init' action
add_action( 'init', 'team_group', 0 );