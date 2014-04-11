<?php get_header(); ?>

<div class="content container-fluid" id="front-page">
  <div class="row">
    <div class="">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post" id="post-<?php the_ID(); ?>">
            <?php edit_post_link('<span class="glyphicon glyphicon-pencil"></span>','<span style="float: right">', '</span>'); ?>

          <?php if ( has_post_thumbnail() ): ?>
          <div style="float: left;">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium', array('class' => 'align-left')); ?></a>

          </div>
          <?php endif; ?>

          <div class="entry">
            <?php the_content('<span class="fa fa-arrow-circle-right fa-3x"></span>'); ?>
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

  <div class="pagination-centered">
    <?php show_pagination_links(); ?>
  </div>

</div>



<?php get_footer(); ?>