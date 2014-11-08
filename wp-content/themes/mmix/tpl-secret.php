<?php
/**
 * Template Name: Template MixBox
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <link rel="icon" href="/favicon.ico" />
    <link rel="image_src" href="http://museomixmtl.com/wp-content/uploads/2014/06/pastlle-jaune1.png"/>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php bloginfo('name'); ?> - <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <meta property="og:image" content="http://museomixmtl.com/wp-content/uploads/2014/06/pastlle-jaune1.png"/>
    <meta property="og:image:secure_url" content="http://museomixmtl.com/wp-content/uploads/2014/06/pastlle-jaune1.png" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <script type="text/javascript" charset="utf-8" src="<?php echo get_template_directory_uri() ?>/js/jquery.tubular.1.0.js"></script>

    <script>
        jQuery(document).ready(function($) {
            $('#wrapper').tubular({videoId: 'IExpnvKDnnU', mute: false});
        });
    </script>
</head>
<body>
<div id="wrapper" class="clearfix">



</div>
<?php wp_footer(); ?>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-47524203-1', 'museomixmtl.com');
    ga('send', 'pageview');
</script>
</body>
</html>
