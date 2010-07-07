<?php
/*
Plugin Name: UserPing for WordPress
Plugin URI: http://github.com/jmhobbs/userping-for-wordpress
Description: Adds UserPing to your WordPress site!
Author: John Hobbs
Version: 1.2.0
Requires at least: 2.7
Author URI: http://www.velvetcachce.org/
License: MIT

*/

include( dirname( __FILE__ ) . '/options.php' );

function insert_userping_code () {
	if( ! (bool) get_option( 'track-logged-in-administrators' ) and current_user_can( 'administrator' ) )
		return;

	echo "<!-- UserPing Tracking Code -->\n";
	/*
		the userping badge is "optional" in that you don't have to display it. Unfortunately, it _IS_ used to generate
		the initial session. If get_option('show-userping-graphic') is false, we'll need to display another image
		that will serve as the session builder
	*/
	if( get_option( 'show-userping-graphic' ) ) {
		echo '<a href="http://userping.com"><img src="http://ping.userping.com/badge.png" alt="get userping" title="get userping" style="border: 0 none;"/></a>';
	} else {
		echo '<img src="http://ping.userping.com/blank.png" alt="userping.com session tracker" title="userping session tracker" style="border: 0 none;"/>';
	}
	echo '<script type="text/javascript" src="http://ping.userping.com/pinger.js"></script>' . "\n";
	echo "<!-- End UserPing Tracking Code -->\n";
}

add_action( 'wp_footer', 'insert_userping_code' );
