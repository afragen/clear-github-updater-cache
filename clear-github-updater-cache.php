<?php
/**
 * Plugin Name:       GitHub Updater Purge Cache
 * Plugin URI:        https://github.com/afragen/clear-github-updater-cache
 * Description:       Deletes the GitHub Updater transients from the database.
 * Author:            Andy Fragen
 * Version:           0.1
 * Author URI:        https://github.com/afragen/
 * GitHub Plugin URI: https://github.com/afragen/clear-github-updater-cache
 */

//ajf_github_updater_delete_all_transients();
///return;
add_action( 'init', function(){
	deactivate_plugins( 'clear-github-updater-cache.php' );
} );

/**
 * Delete all `_ghu-` transients from database table.
 *
 * @return bool
 */
function ajf_github_updater_delete_all_transients() {
	global $wpdb;

	$table         = is_multisite() ? $wpdb->base_prefix . 'sitemeta' : $wpdb->base_prefix . 'options';
	$column        = is_multisite() ? 'meta_key' : 'option_name';
	$delete_string = 'DELETE FROM ' . $table . ' WHERE ' . $column . ' LIKE %s LIMIT 1000';

	$wpdb->query( $wpdb->prepare( $delete_string, array( '%_ghu-%' ) ) );

	return true;
}

