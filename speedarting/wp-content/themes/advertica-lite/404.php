<?php 
/**
 * The template for displaying Error 404 page.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>
<?php global $advertica_shortname; ?>

<div class="page-content">
	<div class="container" id="error-404">
		<div class="row-fluid">
			<div id="content" class="span12">
				<div class="post">
					<div class="skepost _404-page">
						<div class="error-txt-first"><?php _e( '404', 'advertica-lite' ); ?></div>
						<!-- 
						<p><?php _e( 'Sorry, but the requested resource was not found on this site. Please try again or contact the administrator for assistance.', 'advertica-lite' ); ?></p>
						-->
						<img src="<?php echo get_bloginfo('template_directory');?>/images/404.jpg" alt="">
					</div>
					<!-- post --> 
				</div>
				<!-- post -->
			</div>
			<!-- content --> 
		</div>
	</div>
</div>
<?php get_footer(); ?>