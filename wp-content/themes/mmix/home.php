<?php get_header(); ?>

<div class="content container home">
  <div class="row">
    <div class="col-md-8">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post" id="post-<?php the_ID(); ?>">
          <?php edit_post_link('<span class="glyphicon glyphicon-pencil"></span>','<span style="float: right">', '</span>'); ?>


          <h2><?php the_title(); ?></h2>

          <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-4">

              <div class="panel panel-default author">
                <div class="panel-body text-center">
                  <span class="user-avatar">
                    <?php echo get_avatar(get_the_author_meta('ID')); ?>
                  </span>
                </div>
                <div class="panel-footer">
                  <div class="text-center">
                    <?php the_author(); ?>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-10 col-sm-10 col-xs-8">

              <div class="row">
                <div class="col-md-12">
                  <p style="margin: 5px auto">
                    <!-- AddThis Button BEGIN -->
                  <div class="addthis_toolbox addthis_default_style addthis_16x16_style">
                    <a class="addthis_button_facebook"></a>
                    <a class="addthis_button_twitter"></a>
                    <a class="addthis_button_google_plusone_share"></a>
                    <a class="addthis_button_pinterest_share"></a>
                    <a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
                  </div>
                  <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5374079b313142e4"></script>
                  <!-- AddThis Button END -->
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="entry">
                    <?php the_content('<span class="fa fa-arrow-circle-right fa-3x"></span>'); ?>
                  </div>
                </div>
              </div>

            </div>
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