<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <link rel="icon" href="/favicon.ico" />
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <title><?php bloginfo('name'); ?> - <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
  <![endif]-->

  <?php wp_head(); ?>
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />



</head>
<body data-spy="scroll" data-target="#main-nav">

<div class="container-fluid site-header">
  <div class="container-fluid">
    <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="main-nav">
      <div class="navbar-header">
        <a href="/" title="<?php bloginfo('name'); ?>" class="navbar-brand" id="mmix-logo">
          <img src="<?php echo get_template_directory_uri(); ?>/img/logo_museomix_MTL.png" alt="Museomix Montréal"/>
        </a>
      </div>

      <?php
      $args = array(
        'order'=> 'ASC',
        'post_parent' => get_option('page_on_front'),
        'post_type' => 'page'
      );
      $sub_pages = get_children($args); $i=0;
      $post_url = get_permalink(get_option('page_on_front'));
      ?>
      <ul class="nav navbar-nav" id="main-nav-bar">
        <?php foreach($sub_pages as $page): ?>
          <li class="">
            <a href="<?php echo $post_url; ?>#spage_<?php echo $page->ID; ?>" data-target="#spage_<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></a>
          </li>
        <?php endforeach; ?>
      </ul>

    </div>
  </div>
</div>

