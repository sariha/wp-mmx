<?php
/**
* The template for displaying the footer.
*
* Contains footer content and the closing of the
* #main and #page div elements.
*
*/
global $tweetfeedmeta,$advertica_shortname;
?>

<?php  
if($tweetfeedmeta == '1'){ ?>
<!-- full-twitter-box -->
<div id="full-twitter-box">
	<div class="container">
		<div class="row-fluid">
			<?php  get_template_part('section','twitter-panel'); ?>
		</div>
	</div>
</div>
<?php } ?>
	<div class="clearfix"></div>
</div>
<!-- #main --> 

<!-- #footer -->
<div id="footer">
	<div class="container">
		<div class="row-fluid">
			<div class="second_wrapper">
				<?php dynamic_sidebar( 'Footer Sidebar' ); ?>
				<div class="clearfix"></div>
			</div><!-- second_wrapper -->
		</div>
	</div>

	<div class="third_wrapper">
		<div class="container">
			<div class="row-fluid">
				<?php $sktURL = 'http://www.sketchthemes.com/'; ?>
				<div class="copyright span6 alpha omega"> <?php echo stripslashes(sketch_get_option($advertica_shortname."_copyright")); ?> </div>
				<div class="clearfix"></div>
				<!--
				<div class="owner span6 alpha omega"><?php _e('Advertica Theme by','advertica-lite'); ?> <a href="<?php echo $sktURL; ?>" ><?php _e('SketchThemes','advertica-lite'); ?></a></div>
				-->
			</div>
		</div>
	</div><!-- third_wrapper --> 
</div>
<!-- #footer -->

</div>
<!-- #wrapper -->
	<a href="JavaScript:void(0);" title="Back To Top" id="backtop"></a>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-42049545-2', 'auto');
	  ga('send', 'pageview');

	</script>
	<?php wp_footer(); ?>
</body>
</html>