<?php
include WP_CONTENT_DIR."/plugins/dbsync/activate.php";
include WP_CONTENT_DIR."/plugins/dbsync/deactivate.php";
include WP_CONTENT_DIR."/plugins/dbsync/shortz.php";
function dbsync_js_includes(){
	// jQuery core
	wp_enqueue_script("jquery");
	// DbSync specific files
	wp_register_script("dbsync_ready", plugins_url( 'ready.js', __FILE__ ));
	wp_enqueue_script("dbsync_ready", plugins_url( 'ready.js', __FILE__ ));
}
add_action('wp_head', 'dbsync_js_includes');
?>