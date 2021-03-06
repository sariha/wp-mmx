<?php get_header(); ?>

<div class="content container-fluid" id="front-page">
  <div class="row">
  <?php
      $args = array(
        'order'=> 'ASC',
        'orderby' => 'menu_order',
        'post_parent' => $post->ID,
        'post_type' => 'page'
      );
      $sub_pages = get_children($args); $i=0;?>
      <?php foreach( $sub_pages as $page ) :
        $i++; ?>

        <?php
        if($i !== 1) {
          $style = '';
          if(has_post_thumbnail($page->ID))
            $banner = get_the_post_thumbnail( $page->ID, 'big-banner');
          else
            $banner = null;

        }
        ?>
        <div class="clearfix"></div>
        <div class="sub_page_container"  id="spage_<?php echo $page->ID; ?>" <?php echo $style ?>>
          <div class="sub_page_content">
            <?php if(!empty($banner)) : ?>
              <?php echo $banner; ?>
              <h2 class="banner-title"><?php echo $page->post_title; ?></h2>
            <?php endif; ?>
            <?php
              $pageTpl = get_page_template_slug( $page->ID );
            if(!empty($pageTpl))
            {
              //special trick
              include(locate_template($pageTpl));
            }
            else
            {
              echo do_shortcode($page->post_content);
            }

            ?>

          </div>

        </div>

      <?php endforeach; ?>

    </div>


  </div>

</div>



<?php get_footer(); ?>