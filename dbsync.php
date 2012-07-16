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

// register all hooks
register_activation_hook(__FILE__, 'dbsync_install');
register_deactivation_hook(__FILE__, 'dbsync_uninstall');
add_shortcode('copyright_disclaimer', 'copyright_shortz');

function dbsync_install(){
	global $wpdb;
	global $dbsync_db_version;
	
	// DB Sync tasks table
	$dbsync_tt_table = $wpdb->prefix."dbsync_tasks";
	
	$sql = "CREATE TABLE ".$dbsync_tt_table." (task_id bigint(20) NOT NULL AUTO_INCREMENT, 
	task_time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL, 
	task_initiator int(2) DEFAULT '0' NOT NULL,
	task_type int(32) DEFAULT '0' NOT NULL,
	task_warnings int(32) DEFAULT '0' NOT NULL,
	UNIQUE KEY task_id (task_id)
	);"; 
	
	require_once(ABSPATH. 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	
	add_option("dbsync_db_version", $dbsync_db_version);
}
function dbsync_uninstall(){
	global $wpdb;
	global $dbsync_db_version;
	
	// DB Sync tasks table
	$dbsync_tt_table = $wpdb->prefix."dbsync_tasks";
	
	$wpdb->query('DROP TABLE IF EXISTS '.$dbsync_tt_table);
}

// [copyright_disclaimer license="gpl" copyright_holder=""]
function copyright_shortz( $atts ) {
	extract( shortcode_atts( array(
		'license' => 'gpl',
		'copyright_holder' => ''
	), $atts ) );

	return "This content is licensed under the {$license}, copyright 2012 {$copyright_holder}";
}
?>