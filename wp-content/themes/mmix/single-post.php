<?php get_header(); ?>

<div class="content container">
  <div class="row">
    <div class="col-md-8">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post" id="post-<?php the_ID(); ?>">

          <?php edit_post_link('<span class="glyphicon glyphicon-pencil"></span>','<span style="float: right">', '</span>'); ?>

        <h2><?php the_title(); ?></h2>

        <?php if ( has_post_thumbnail() ): ?>
        <div style="float: left;">
          <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?>
          <a href="<?php echo $large_image_url[0] ?>" title="<?php the_title_attribute(); ?>" class="fancybox" rel="post_<?php the_ID(); ?>"><?php the_post_thumbnail('medium', array('class' => 'align-left')); ?></a>

        </div>
        <?php endif; ?>

        <div class="entry">
          <?php the_content('<span class="fa fa-arrow-circle-right fa-3x"></span>'); ?>
        </div>


<!--
        <div class="tags">
          <?php
            $posttags = get_the_tags();
            if($posttags && !empty($posttags)):
              foreach($posttags as $tag):
              ?>
                <a href="/tag/<?php echo $tag->slug ?>" class="">#<?php echo $tag->name; ?> <span class="badge badge-tags"><?php echo $tag->count; ?></span></a>
              <?php
              endforeach;
            endif;
          ?>
        </div>
-->


          <div class="left">
            <a href="javascript:history.back()"><span class="fa fa-arrow-circle-left fa-3x"></span></a>
          </div>
       </div>



<?php endwhile; else: ?>

  <p>Oups !</p>

<?php endif; ?>
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>



</div>



<?php get_footer(); ?>