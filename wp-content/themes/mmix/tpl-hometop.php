<?php
/**
 * Template Name: Museomix Home Top
 */
?>
<div class="top-page sub_page_container" id="website_top">
  <video autoplay loop poster="<?php echo get_template_directory_uri() ?>/poster_video.jpg" id="bgvid" class="sub_page_container">
    <source src="<?php echo get_template_directory_uri() ?>/video/webfilm-mmxmtl-3.webm" type="video/webm">
    <source src="<?php echo get_template_directory_uri() ?>/video/webfilm-mmxmtl-3.ogv" type="video/ogv">
    <source src="<?php echo get_template_directory_uri() ?>/video/webfilm-mmxmtl-3.mp4" type="video/mp4">
  </video>
  <div class="home-top-content">
    <?php echo $page->post_content; ?>
  </div>
</div>
