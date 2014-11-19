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
    <div class="span12">
      <h2 class="h2top">Liste des utilisateurs qui aiment le Protorype1</h2>
        <ul>
        <?php 
          $values = get_cimyFieldValue(false, 'PROTOTYPE', 'Prototype1');

          foreach ($values as $value) {
            $user_id = $value['user_id'];
        ?>            
            <li><?php echo $value['user_login']; ?></li>
        <?php 
          }
       ?>
        </ul>
    </div>
  </div>
</div>
<?php get_footer(); ?>