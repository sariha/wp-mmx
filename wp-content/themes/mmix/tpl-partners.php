<?php
/**
 * Template Name: Museomix Partners
 */
?>
<div class="container-fluid">
  <div class="row">
    <?php
    // no default values. using these as examples
    $taxonomies = array(
      'team_group'
    );

    $args = array(
      'orderby'       => 'name',
      'order'         => 'ASC',
      'hide_empty'    => true,
      'cache_domain'  => 'core'
    );

    $groups = get_terms( $taxonomies, $args ); ?>
    <div class="col-md12">
      <div class="container-fluid">
        <?php foreach($groups as $group): ?>

          <div class="clearfix"></div>
          <h2 class="alt-title robotoFont"><?php echo($group->name) ?></h2>

          <div class="row">
            <?php
            $args = array(
              'posts_per_page' => -1,
              'post_type' => 'partner',
              'tax_query' => array(
                array(
                  'taxonomy' => 'team_group',
                  'field' => 'term_id',
                  'terms' => $group->term_id)
              ),
              'post_status' => 'publish'
            );
            $partners = get_posts($args);

            foreach($partners as $partner):
              //is large logo ?
              $larger = get_field('large_display', $partner->ID);
              ?>
              <div class="<?php echo ($larger === true) ? 'col-md-4' : 'col-md-2'; ?>">
                <div class="panel panel-default partners">
                  <div class="panel-body text-center">
                  <span class="partner-logo">
                    <?php if(!empty($partner->post_excerpt)): ?>
                    <a href="<?php echo $partner->post_excerpt; ?>" target="_blank"><?php endif ?>
                    <?php echo get_the_post_thumbnail($partner->ID, 'partner-logo'); ?>
                    <?php if(!empty($partner->post_excerpt)): ?></a><?php endif ?>
                  </span>
                  </div>
                  <div class="panel-footer">
                    <div class="text-center">
                      <?php echo $partner->post_title; ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endforeach;?>
      </div>


    </div>

  </div>
</div>

<!---
<div class="container-fluid">  
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
     <img src="http://museomixmtl.com/wp-content/uploads/2014/10/entente_banner.png" class="img-responsive">
   </div>
  </div>
</div>
--->

