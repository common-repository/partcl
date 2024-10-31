<?php
/*
Plugin Name: Partcl
Plugin URI: http://partcl.com/
Description: Plugin inserts partcl script tag to your wordpress blog
Author: Stark
Version: 0.9
Author URI: http://onjs.net/
*/


/*
* Insert scripts to all pages
*/
function partcl_script_adder() {
	$web_key = get_option('partcl_web_key');
	if(!empty($web_key)) {
		echo '<script id="partcl_client_script" fdfdf="1" web_key="'. $web_key .'" src="http://partcl.com/partcl.full.js"></script>';
	}
	?>
	
	
	<?php
}

function partcl_create_menu() {
	
	add_options_page('Partcl Settings', 'Partcl Settings', 'administrator', __FILE__, 'partcl_settings_page');
	
	add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {
	
	register_setting( 'partcl-settings-group', 'partcl_web_key' );
}

function partcl_settings_page() {
?>
<div class="wrap">
	<h2>Patcl settings.</h2>
	
	<form method="post" action="options.php">
<?php settings_fields( 'partcl-settings-group' ); ?>
    
	<table class="form-table">
        	<tr valign="top">
        	<th scope="row">Fill your partcl web-key here</th>
        	<td><input type="text" name="partcl_web_key" value="<?php echo get_option('partcl_web_key'); ?>"> An example 101a0a5d5ed4dd590714d5dbb444757e.</td>
        	</tr>
         
    	</table>

    		<p class="submit">
    			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    		</p>
	</form>
</div>

<?php }

add_action( 'wp_head', 'partcl_script_adder' );
add_action('admin_menu', 'partcl_create_menu');
?>
