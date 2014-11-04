<?php
header('Content-Type: application/json');

require( '../../../wp-load.php' );

$tw_path = plugin_dir_path( __FILE__ );
include_once($tw_path.'lib/main.php');

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/

$url = 'https://api.twitter.com/1.1/search/tweets.json';
$requestMethod = 'GET';
$getfield = (!empty($_POST['url'])) ? $_POST['url'] : $search ;

$twitter = new TwitterAPIExchange($settings);
$tweets = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
echo ($tweets);