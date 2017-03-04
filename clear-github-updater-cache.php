<?php
/**
 * Plugin Name:       GitHub Updater Clear Cache
 * Plugin URI:        https://github.com/afragen/clear-github-updater-cache
 * Description:       Deletes the GitHub Updater options from the database.
 * Author:            Andy Fragen
 * Version:           0.2
 * Author URI:        https://github.com/afragen/
 * GitHub Plugin URI: https://github.com/afragen/clear-github-updater-cache
 * GitHub Branch:     force-check
 */


add_action( 'plugins_loaded', function() {
	if ( class_exists( 'Fragen\\GitHub_Updater\\Base' ) ) {
		include_once __DIR__ . '/src/Purge_Cache.php';
		new Purge_Cache();
	}
} );
