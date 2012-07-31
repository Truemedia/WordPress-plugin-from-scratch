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

include WP_CONTENT_DIR."/plugins/dbsync/activate.php";
include WP_CONTENT_DIR."/plugins/dbsync/deactivate.php";
include WP_CONTENT_DIR."/plugins/dbsync/shortz.php";

// register all hooks
register_activation_hook(__FILE__, 'dbsync_install');
register_deactivation_hook(__FILE__, 'dbsync_uninstall');

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