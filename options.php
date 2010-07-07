<?php
	add_action( 'admin_menu', 'userping_modify_menu' );

	function userping_modify_menu () {
		add_options_page(
			'UserPing',
			'UserPing',
			'administrator',
			__FILE__,
			'userping_settings_page'
		);
		add_action( 'admin_init', 'register_userping_settings' );
	}

	function register_userping_settings () {
		register_setting( 'userping-settings-group', 'show-userping-graphic' );
		register_setting( 'userping-settings-group', 'track-logged-in-administrators' );
	}

	function userping_settings_page() {

	$show_userping_graphic = '';
	if( (bool) get_option( 'show-userping-graphic' ) ) 
 		$show_userping_graphic = ' selected="selected" ';

	$track_logged_in_administrators = '';
	if( (bool) get_option( 'track-logged-in-administrators' ) )
		$track_logged_in_administrators = ' selected="selected" ';

?>
<div class="wrap">
	<h2>UserPing</h2>
	<form method="post" action="options.php">
		<?php wp_nonce_field('update-options'); ?>

		<table class="form-table">
			<tr valign="top">
				<th scope="row">Show The UserPing Graphic</th>
				<td>
					<select name="show-userping-graphic">
						<option value="0">No</option>
						<option value="1" <?php echo $show_userping_graphic; ?>>Yes</option>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Track Logged In Administrators</th>
        <td>
          <select name="track-logged-in-administrators">
            <option value="0">No</option>
            <option value="1" <?php echo $track_logged_in_administrators; ?>>Yes</option>
          </select>
        </td>
			</tr>
		</table>

		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="show-userping-graphic,track-logged-in-administrators" />

		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
</div>
<?php
	}
?>
