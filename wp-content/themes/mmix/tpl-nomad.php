<?php
/**
 * Template Name: Nomad template
 */
 ?>
<?php get_header(); ?>

    <div class="content container index">
        <div class="row">
            <div class="col-md-8">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h2><?php the_title(); ?></h2>

                <div class="entry">
                    <?php the_content('<span class="fa fa-arrow-circle-right fa-3x"></span>'); ?>
                </div>

                <iframe src="//www.ustream.tv/embed/18155672?wmode=direct&ub=85a901&lc=85a901&oc=ffffff&uc=ffffff&autoplay=true" style="border: 0 none transparent;" frameborder="no" width="100%" height="600"></iframe>


<?php endwhile; endif; ?>
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