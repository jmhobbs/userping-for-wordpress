<?php
/*
Plugin Name: UserPing for WordPress
Plugin URI: http://github.com/jmhobbs/userping-for-wordpress
Description: Adds UserPing to your WordPress site!
Author: John Hobbs
Version: 1.1.0
Requires at least: 2.7
Author URI: http://www.velvetcachce.org/
License: MIT

*/

include( dirname( __FILE__ ) . '/options.php' );

function insert_userping_code () {
	if( ! (bool) get_option( 'track-logged-in-administrators' ) and current_user_can( 'administrator' ) )
		return;

	echo "<!-- UserPing [alpha] Tracking Code -->\n";
	if( get_option( 'show-userping-graphic' ) )
		echo '<a href="http://userping.com"><img src="http://userping.com/ping/badge.png" alt="get userping" title="get userping" style="border: 0 none;"/></a>';
	echo '<script type="text/javascript" src="http://userping.com/js/pinger.js"></script>' . "\n";
	echo "<!-- End UserPing Tracking Code -->\n";
}

add_action( 'wp_footer', 'insert_userping_code' );
