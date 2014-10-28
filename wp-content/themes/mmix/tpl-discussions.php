<?php
/**
 * Template Name: Museomix discussions
 */
?>
<?php get_header(); ?>

    <div id="single-page" class="content container">
        <div class="row">
            <div class="col-md-8">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="post" id="post-<?php the_ID(); ?>">

                        <?php edit_post_link('<span class="glyphicon glyphicon-pencil"></span>','<span style="float: right">', '</span>'); ?>

                        <h2><?php the_title(); ?></h2>

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-10">

                                <div class="row">
                                    <div class="col-md-12">
                                        <p style="margin: 5px auto">
                                            <!-- AddThis Button BEGIN -->
                                        <div class="addthis_toolbox addthis_default_style addthis_16x16_style"
                                             addthis:url="<?php the_permalink() ?>"
                                             addthis:title="<?php the_title() ?>">
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="entry">
                                            <?php comments_template(); ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>





                        <div class="left">
                            <a href="<?php echo home_url(); ?>"><span class="fa fa-arrow-circle-left fa-3x"></span></a>
                        </div>
                    </div>



                <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>



    </div>



<?php get_footer(); ?>