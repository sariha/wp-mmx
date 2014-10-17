<?php
/*
Plugin Name: Twiget Twitter Widget
Plugin URI: http://www.prasannasp.net/wordpress-plugins/twiget/
Description: A widget to display the latest Twitter status updates.
Author: Prasanna SP
Version: 1.1.3
Author URI: http://www.prasannasp.net/
*/

/*  This file is part of TwiGet Twitter Widget plugin, developed by Syahir Hakim (email : syahir at khairul dash syahir dot com) and Prasanna SP (email: prasanna[AT]prasannasp.net)

    TwiGet Twitter Widget is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    TwiGet Twitter Widget is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with TwiGet Twitter Widget plugin. If not, see <http://www.gnu.org/licenses/>.
*/

define( 'TWIGET_PLUGIN_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'TWIGET_PLUGIN_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Load plugin textdomain
 *
 * @package Twiget Twitter Widget
 * @since 1.0
 */
function load_twiget_plugin_textdomain() {
  load_plugin_textdomain( 'twiget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}
add_action( 'plugins_loaded', 'load_twiget_plugin_textdomain' );


require_once TWIGET_PLUGIN_PATH . '/options.php';
require_once TWIGET_PLUGIN_PATH . '/widgets.php';
require_once TWIGET_PLUGIN_PATH . '/get-tweets.php';


/**
 * Delete options table entries ONLY when plugin deactivated AND deleted (options.php)
 */
function twiget_delete_plugin_options(){
	delete_option( 'twiget_options' );
}
register_uninstall_hook(__FILE__, 'twiget_delete_plugin_options' );


/* 
 ** Define default option settings
 */ 
function twiget_add_defaults(){
	$tmp = get_option( 'twiget_options' );
    if ( ( $tmp['twiget_default_options_db'] == '1' ) || ( ! is_array( $tmp ) ) ) {
		delete_option( 'twiget_options' );
		$arr = array( 'twiget_default_options_db' => '' );
		update_option( 'twiget_options', $arr );
	}
}
register_activation_hook(__FILE__, 'twiget_add_defaults' );




/**
 * Display admin notice if Twitter oAuth info is missing.
 *
 * @package Twiget Twitter Widget
 * @since 1.1
 */
function twiget_admin_notice_missing_api(){
	$opts = get_option( 'twiget_options' );
	$req_opts = array( 'consumer_key', 'consumer_secret', 'access_token', 'access_token_secret' );
	$api_exists = true;
	foreach ( $req_opts as $req_opt ) {
		if ( ! array_key_exists( $req_opt, $opts ) ) {
			$api_exists = false;
			break;
		} elseif ( ! $opts[$req_opt] ) {
			$api_exists = false;
			break;
		}
	}
	if ( $api_exists ) return;
	?>
    <div class="error">
       <p><?php printf( __( 'Twiget Twitter Widget plugin requires your Twitter API credentials to work. See <a href="%s">Twiget\'s Options Page</a> for instructions on how to set this up.', 'twiget' ), admin_url( 'options-general.php?page=twiget/options.php' ) ); ?></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'twiget_admin_notice_missing_api' );


/*
** Localize timestamp strings
 *
 * @package Twiget Twitter Widget
 * @since 1.1
*/

function twiget_localize_scripts(){
	$twiget_args = array(
		'via'			=> sprintf( __( 'via %s', 'twiget' ), 'twigetTweetClient' ),
		'LessThanMin'  	=> __( 'il y a moins d\'une minute', 'twiget' ),
		'AboutAMin'  	=> __( 'il y a environ une minute', 'twiget' ),
		'MinutesAgo'  	=> sprintf( __( 'il y a %s minutes', 'twiget' ), 'twigetRelTime' ),
		'AnHourAgo'  	=> __( 'il y a environ une heure', 'twiget' ),
		'HoursAgo'  	=> sprintf( __( 'il y a environ %s heures', 'twiget' ), 'twigetRelTime' ),
		'OneDayAgo'  	=> __( 'il y a un jour', 'twiget' ),
		'DaysAgo'  		=> sprintf( __( 'il y a %s jours', 'twiget' ), 'twigetRelTime' ),
		'isSSL'			=> is_ssl(),
	);
   wp_localize_script( 'twiget-widget-js', 'TwigetArgs', $twiget_args );
}
add_action( 'wp_enqueue_scripts', 'twiget_localize_scripts' );
