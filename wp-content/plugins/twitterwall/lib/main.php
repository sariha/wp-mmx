<?php

//conf
require_once($tw_path . 'config.inc.php');

//include acf
include_once($tw_path. 'lib/acf.init.php');

//twitterAPI
require_once($tw_path . 'lib/twitter-api-php/TwitterAPIExchange.php');


/**
 * Activation
 */
function tw_activation_plugin(){

    $post = array(
        'post_name'=>'tweet-wall',
        'post_title'=>'tweet-wall',
        'post_type'=>'page',
        'post_status'=>'publish',
    );

    $page = wp_insert_post( $post );
}

/**
 * deactivation
 */
function tw_deactivation_plugin()
{

    if(!empty($page) && !is_null($page))
            wp_delete_post($page->ID, true);
}



/**
 * Set our page template
 * @param $page_template
 * @return string
 */
function tw_page_template( $page_template )
{
    if ( is_page( 'tweet-wall' ) ) {
        $page_template = plugin_dir_path( __FILE__ ) . '../page.template.php';
    }
    return $page_template;
}
add_filter( 'page_template', 'tw_page_template' );

