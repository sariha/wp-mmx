<?php
/*
Plugin Name: Twitter Wall
Plugin URI: http://www.sariha.com/
Description: Add a page template to use as twitter wall for events
Author: Sariha Chabert
Version: 0.1
Author URI: http://www.sariha.com/
*/


$tw_path = plugin_dir_path( __FILE__ );
include_once($tw_path.'lib/main.php');




register_activation_hook( __FILE__ , 'tw_activation_plugin' );
register_deactivation_hook( __FILE__, 'tw_deactivation_plugin' );