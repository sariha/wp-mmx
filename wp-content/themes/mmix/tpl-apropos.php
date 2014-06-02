<?php
/**
 * Template Name: Museomix à propos
 */
?>

    <?php
    $args = array(
        'order'=> 'ASC',
        'orderby'=> '',
        'post_parent' => $page->ID,
        'post_type' => 'page'
    );
    $panels = get_children($args); $i=0;?>

    <div id="carousel-about" class="carousel slide height100" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">

            <?php $i=0; foreach( $panels as $panel) : ?>

                <li data-target="#carousel-about" data-slide-to="<?php echo $i; ?>" class="<?php echo ($j==0) ? 'active' : '' ; ?>"></li>

            <?php $i++; endforeach; ?>

        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

            <?php $j=0; foreach( $panels as $panel) : ?>
                <div class="item <?php echo ($j==0) ? 'active' : '' ; ?> height100">

                    <?php $img = wp_prepare_attachment_for_js(get_post_thumbnail_id($panel->ID)); ?>
                    <div class="fill height100" style="background-image:url('<?php echo ($img) ? $img['sizes']['large']['url'] : 'http://museomixmtl.com/wp-content/uploads/2014/04/slider_background.jpg'; ?>');">
                        <div class="carousel-caption middle">
                            <?php echo apply_filters('the_content', $panel->post_content); ?>
                        </div>
                    </div>

                </div>
            <?php $j++; endforeach; ?>

        </div>

        <!-- Controls -->
        <a class="left carousel-control " href="#carousel-about" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-about" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>


  <div class="clearfix"></div>
