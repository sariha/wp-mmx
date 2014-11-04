<?php

    $plugin_url = plugin_dir_url( __FILE__ );

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tweet Wall | Museomix</title>

    <!-- Bootstrap -->
    <link href="<?php echo $plugin_url; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $plugin_url; ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $plugin_url; ?>css/darkly.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<h1>Museomix tweet wall !</h1>
<div class="row" id="tweet-container">

</div>

<script src="<?php echo $plugin_url; ?>js/vendor/jquery.js"></script>
<script src="<?php echo $plugin_url; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $plugin_url; ?>js/freewall.js"></script>
<script>
    var ajaxUrl = '<?php echo $plugin_url; ?>/get_tweets.php';
</script>
<script src="<?php echo $plugin_url; ?>js/script.js"></script>
</body>
</html>

