<?php
function dbsync_uninstall(){
	global $wpdb;
	global $dbsync_db_version;
	
	// DB Sync tasks table
	$dbsync_tt_table = $wpdb->prefix."dbsync_tasks";
	
	$wpdb->query('DROP TABLE IF EXISTS '.$dbsync_tt_table);
	dbsync_theme_subtractextras();
}
?>