<?php
/**
 * Template Name: Museomix teams
 */
?>

<div>

  <h2 class="alt-title robotoFont">Core Team</h2>
  <div class="clearfix"></div>

  <?php $users = get_users(array('meta_key' => 'mmix_team', 'meta_value' => 'coreTeam')) ?>
  <?php foreach($users as $user): ?>
    <?php $metas = array_map( function( $a ){ return $a[0]; }, get_user_meta( $user->ID ) ); ?>
  <div class="col-md-4">
    <div class="user-panel">
      <div class="user-avatar">
        <?php echo get_avatar( $user->ID, 180 ); ?>
      </div>
      <h3><?php echo $metas['first_name']; ?> <?php echo $metas['last_name']; ?></h3>
      <?php if(!empty($metas)): ?>
      <div class="twiter-account"><?php echo $metas['twitter']; ?></div>
      <?php endif; ?>
    </div>
  </div>
  <?php endforeach; ?>

  <div class="clearfix"></div>
  <h2 class="alt-title robotoFont"><?php echo __("[en]Volunteers[/en][fr]Bénévoles[/fr]"); ?></h2>
  <div class="clearfix"></div>

  <?php $users = get_users(array('meta_key' => 'mmix_team', 'meta_value' => 'benevole')) ?>
  <?php foreach($users as $user): ?>
    <?php $metas = array_map( function( $a ){ return $a[0]; }, get_user_meta( $user->ID ) ); ?>
    <div class="col-md-3">
      <div class="user-panel">
        <div class="user-avatar">
          <?php echo get_avatar( $user->ID, 180 ); ?>
        </div>
        <h3><?php echo $metas['first_name']; ?> <?php echo $metas['last_name']; ?></h3>
        <?php if(!empty($metas)): ?>
          <div class="twiter-account"><?php echo $metas['twitter']; ?></div>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>

  <div class="clearfix"></div>
  <h2 class="alt-title robotoFont"><?php echo __("[en]Ambassadors[/en][fr]Ambassadeurs[/fr]"); ?></h2>
  <div class="clearfix"></div>

  <?php $users = get_users(array('meta_key' => 'mmix_team', 'meta_value' => 'ambassador')) ?>
  <?php foreach($users as $user): ?>
    <?php $metas = array_map( function( $a ){ return $a[0]; }, get_user_meta( $user->ID ) ); ?>
    <div class="col-md-3">
      <div class="user-panel">
        <div class="user-avatar">
          <?php echo get_avatar( $user->ID, 180 ); ?>
        </div>
        <h3><?php echo $metas['first_name']; ?> <?php echo $metas['last_name']; ?></h3>
        <?php if(!empty($metas)): ?>
          <div class="twiter-account"><?php echo $metas['twitter']; ?></div>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>

</div>