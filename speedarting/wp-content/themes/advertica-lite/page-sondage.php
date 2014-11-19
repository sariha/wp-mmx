<?php

/**
 *
 * Template Name: Page template Profile
 *
 */

get_header();

$wpdb->hide_errors(); auth_redirect_login(); nocache_headers();

?>

<div class="container">
  <div class="row-fluid" style="margin-top: 60px; margin-bottom: 60px;">
    <div class="span12" style="font-size: 1.5em;">
      <iframe src="https://docs.google.com/forms/d/1cw7VmMMO3P7BvmD_zzoOjigmwPfdi79s4OruNxR-vDY/viewform?embedded=true" width="760" height="1300" frameborder="0" marginheight="0" marginwidth="0">Chargement en cours...</iframe>
    </div>
  </div>
</div>
<?php get_footer(); ?>