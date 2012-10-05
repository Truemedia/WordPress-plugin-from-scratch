<?php
/**
	* @package Dbsync
	* @version 1.0
	*/
/*
Plugin Name: DB Sync
Plugin URI: http://mediacityonline.net
Description: This is a test plugin created by me
Author: Wade Penistone
Version 1.0
Author URI: http://mediacityonline.net
*/

// include all other files for the plugin, from this include file
include WP_CONTENT_DIR."/plugins/dbsync/includes.php";

// register all hooks
register_activation_hook(__FILE__, 'dbsync_install');
register_deactivation_hook(__FILE__, 'dbsync_uninstall');

/* hook into action links to tweak them */
add_filter( 'plugin_action_links', 'dbsync_plugin_action_links', 10, 2 );
/* hook into meta links to tweak them */
add_filter( 'plugin_row_meta', 'dbsync_plugin_meta_links', 10, 2 );

function dbsync_theme_additional(){
	/* copy template file from plugin to current theme directory */
	$file_to_add = ABSPATH . "/wp-content/plugins/dbsync/dbsync_pagetemplate.php";
	$duplicated_dirfilename = get_template_directory(). "/dbsync_pagetemplate.". strtolower(trim(get_current_theme())) .".php";
	if(copy($file_to_add, $duplicated_dirfilename)){
		// backwards compatability
		$data = file_get_contents($file_to_add);
		if($data == false){
			return false;	
		}

		$handle = fopen($duplicated_dirfilename, "w");
		fwrite($handle, $data);
		fclose($handle);
	}
}
function dbsync_theme_subtractextras(){
	/* delete old file */
	$file_to_delete = get_template_directory(). "/dbsync_pagetemplate.". strtolower(trim(get_current_theme())) .".php";
	$fh = fopen($file_to_delete, 'w') or die("can't open file");
	fclose($fh);
	unlink($file_to_delete);	
}
?>