<?php

/**
 *
 * Template Name: Page template Profile
 *
 */

get_header();

$wpdb->hide_errors(); auth_redirect_login(); nocache_headers();

global $userdata; get_currentuserinfo(); // grabs the user info and puts into vars

// check to see if the form has been posted. If so, validate the fields
if(!empty($_POST['action'])) {
    require_once(ABSPATH . 'wp-admin/includes/user.php');
    require_once(ABSPATH . WPINC . '/registration.php');
    check_admin_referer('update-profile_' . $user_ID);
    $errors = edit_user($user_ID);
    
    if ( is_wp_error( $errors ) ) {
      foreach( $errors->get_error_messages() as $message )
      $errmsg = "$message";
      //exit;
   }
  // if there are no errors, then process the ad updates
  if($errmsg == '') {
    do_action('personal_options_update');
    $d_url = $_POST['dashboard_url'];
    wp_redirect( get_option("siteurl").'?page_id='.$post->ID.'&updated=true' );
  } else {
    $errmsg = '<div class="box-red">** ' . $errmsg . ' **</div>';
    $errcolor = 'style="background-color:#FFEBE8;border:1px solid #CC0000;"';
  }
}
?>

<div class="container">
  <div class="row-fluid" style="margin-top: 60px; margin-bottom: 60px;">
    <div class="span12">
      <?php if ( isset($_GET['updated']) ) {
      $d_url = $_GET['d'];?>
        <p class="message"><?php _e('Your profile has been updated.','cp')?></p>
      <?php } ?>


      <?php echo $errmsg; ?>
        <form name="profile" action="" method="post">
        <?php wp_nonce_field('update-profile_' . $user_ID) ?>
        <input type="hidden" name="from" value="profile" />
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="checkuser_id" value="<?php echo $user_ID ?>" />
        <input type="hidden" name="dashboard_url" value="<?php echo get_option("dashboard_url"); ?>" />
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />
        
        <h2 class="h2top">Information général</h2>
        <table class="form-table" style="640px;">
          <tr>
            <th><label for="user_login"><?php _e('Psedo','cp'); ?></label></th>
            <td><input type="text" name="user_login" class="mid2" id="user_login" value="<?php echo $userdata->user_login; ?>" size="35" maxlength="100" disabled /></td>
          </tr>
          <tr>
            <th><label for="first_name"><?php _e('Prénom','cp') ?></label></th>
            <td><input type="text" name="first_name" class="mid2" id="first_name" value="<?php echo $userdata->first_name ?>" size="35" maxlength="100" /></td>
          </tr>
          <tr>
            <th><label for="last_name"><?php _e('Nom','cp') ?></label></th>
            <td><input type="text" name="last_name" class="mid2" id="last_name" value="<?php echo $userdata->last_name ?>" size="35" maxlength="100" /></td>
          </tr>
          <tr>
            <th><label for="email"><?php _e('Email','cp') ?></label></th>
            <td><input type="text" name="email" class="mid2" id="email" value="<?php echo $userdata->user_email ?>" size="35" maxlength="100" /></td>
          </tr>
          <tr>
            <th><label for="phone"><?php _e('Téléphone', 'cp') ?></label></th>
            <td><input type="text" name="cimy_uef_PHONE" class="mid2" id="cimy_uef_3" value="<?php echo get_cimyFieldValue($user_id, 'phone'); ?>"></td>
          </tr>
        </table>

        <h2 class="h2top">Sécurité</h2>
        
        <h2 class="h2top"><?php echo $GLOBALS['_LANG']['_password']; ?></h2>
        <table class="form-table" style="640px;">
          <?php
          $show_password_fields = apply_filters('show_password_fields', true);
          if ( $show_password_fields ) :
          ?>
          <tr>
          <th><label for="pass1"><?php _e('Nouveau mot de passe','cp'); ?></label></th>
          <td>
          <input type="password" name="pass1" class="mid2" id="pass1" size="35" maxlength="50" value="" />
          </td>
          </tr>
          <tr>
          <th><label for="pass1"><?php _e('Confirmer le mot de passe','cp'); ?></label></th>
          <td>
          <input type="password" name="pass2" class="mid2" id="pass2" size="35" maxlength="50" value="" /></td>
          </tr>
          <tr>
          </tr>
          <?php endif; ?>
        </table>

        <button class="CheckoutBtn" type="submit"><?php _e('Mettre à jour »', 'cp')?></button>
      </form>
    </div>
  </div>
</div>
<?php get_footer(); ?>