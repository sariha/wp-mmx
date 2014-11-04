<?php
// 1. customize ACF path
add_filter('acf/settings/path', 'tw_acf_settings_path');
function tw_acf_settings_path( $path ) {
    $tw_path = plugin_dir_path( __FILE__ );
    $path = $tw_path . 'lib/advanced-custom-fields/';

    return $path;
}


// 2. customize ACF dir
add_filter('acf/settings/dir', 'tw_acf_settings_dir');

function tw_acf_settings_dir( $dir ) {

    $tw_dir = plugin_dir_url( __FILE__ );
    $dir = $tw_dir . 'lib/advanced-custom-fields/';

    // return
    return $dir;

}


//Hide ACF
//add_filter('acf/settings/show_admin', '__return_false');

include_once( $tw_path . 'lib/advanced-custom-fields/acf.php' );