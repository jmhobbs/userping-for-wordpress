<?php
/*
Plugin Name: UserPing for WordPress
Plugin URI: http://github.com/jmhobbs/userping-for-wordpress
Description: Adds UserPing to your WordPress site!
Author: John Hobbs
Version: 1.0.0
Requires at least: 2.0
Author URI: http://www.velvetcachce.org/
License: MIT

*/

function insert_userping_code () {
	echo "<!-- UserPing [alpha] Tracking Code -->\n";
	echo '<script type="text/javascript" src="http://userping.com/js/pinger.js"></script>' . "\n";
	echo "<!-- End UserPing Tracking Code -->\n";
}

add_action( 'wp_footer', 'insert_userping_code' );
