<?php
/**
 * Template Name: Museomix teams
 */
?>

<div>

  <?php
  //set the team you want to show here :
  $groups =  array(
    'coreTeam' => array('name'=>'Core Team'),
    'benevole' => array('name'=>'Benevoles'),
    'ambassadeur'=> array('name'=>'Ambassadeurs')
  );
  ?>

  <?php foreach($groups as $group=>$value) :  ?>
  <?php $users = get_users(array('meta_key' => 'mmix_team', 'meta_value' => $group)) ?>
    <?php if(!empty($users)): ?>
    <div class="clearfix"></div>
    <h2 class="alt-title robotoFont"><?php echo $value['name']; ?></h2>
    <div class="clearfix"></div>
      <?php foreach($users as $user): ?>
        <?php $metas = array_map( function( $a ){ return $a[0]; }, get_user_meta( $user->ID ) ); ?>
      <div class="<?php echo ($group=='coreTeam') ? 'col-md-4' : 'col-md-3'; ?>">
        <div class="user-panel">
          <div class="user-avatar">
            <?php echo get_avatar( $user->ID, 180 ); ?>
          </div>
          <h3><?php echo $metas['first_name']; ?> <?php echo $metas['last_name']; ?></h3>
          <?php if(!empty($metas['twitter_account'])): ?>
          <div class="twitter-account">
            <a href="http://www.twitter.com/<?php echo $metas['twitter_account']; ?>" target="_blank">
              <i class="fa fa-twitter"></i> <?php echo $metas['twitter_account']; ?>
            </a>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    <?php endif; ?>
    <div class="clearfix"></div>
  <?php endforeach; ?>



  <div class="clearfix"></div>
</div>