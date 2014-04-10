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

  <script type="text/javascript">
    jQuery(document).ready(function($){

      $(window).scroll(function() {
        if($(window).scrollTop() > $('.page-header').height()) {
          $('div.navbar-fixed-top').css('position','fixed');
          $('.site-name').show();
        }
        if($(window).scrollTop() < ($('.page-header').height()-10)) {
          $('.site-name').hide();
          $('div.navbar-fixed-top').css('position','relative');
        }
      });
    });
  </script>

</head>
<body>

<div class="container-fluid site-header">
    <div class="container">
      <div id="language-selector">
        <div class="btn-group btn-group-xs">
          <?php icl_language_switcher(); ?>
        </div>
      </div>

      <div class="page-header">
        <a href="/" title="<?php bloginfo('name'); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/img/logo_museomix_MTL_bleu_S.png" alt="Museomix Montréal"/>
        </a>

        <div class="dates col-md-3 col-xs-6">
          <img src="<?php echo get_template_directory_uri() ?>/img/dates_museomix_2014_S.png" alt=""/>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="navbar-default navbar-fixed-top" role="navigation" style="position: relative;">
        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <span class="site-name highlight mmixFont" style="display: none;">Museomix Montréal</span>
          </a>
        </div>

        <?php
        wp_nav_menu( array(
            'menu'              => 'primary',
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
        );
        ?>
      </div>

    </div>
</div>

