<?php
include WP_CONTENT_DIR."/plugins/dbsync/activate.php";
include WP_CONTENT_DIR."/plugins/dbsync/deactivate.php";
include WP_CONTENT_DIR."/plugins/dbsync/shortz.php";

function dbsync_js_includes(){
	// jQuery core
	wp_enqueue_script("jquery");
	// DbSync specific files
	wp_register_script("dbsync_ready", plugins_url('ready.js', __FILE__));
	wp_enqueue_script("dbsync_ready");
}
function dbsync_css_includes(){
	// DbSync specific files
	wp_register_style("dbsync_styling", plugins_url('/style.css', __FILE__), false, false, 'all' );
	wp_enqueue_style("dbsync_styling");
}

// scripts	
add_action('wp_head', 'dbsync_js_includes');
// styles
add_action('wp_head', 'dbsync_css_includes');
?>