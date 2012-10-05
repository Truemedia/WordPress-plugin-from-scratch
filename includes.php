<?php
// install
include WP_CONTENT_DIR."/plugins/dbsync/activate.php";
// uninstall
include WP_CONTENT_DIR."/plugins/dbsync/deactivate.php";

// shortcodes
include WP_CONTENT_DIR."/plugins/dbsync/shortz.php";

// action links
include WP_CONTENT_DIR."/plugins/dbsync/action_links.php";
// meta links
include WP_CONTENT_DIR."/plugins/dbsync/meta_links.php";

function dbsync_js_includes(){
	// jQuery core
	wp_enqueue_script("jquery");
	// DbSync specific files
	wp_register_script("dbsync_ready", plugins_url( 'ready.js', __FILE__ ));
	wp_enqueue_script("dbsync_ready");
}
function dbsync_css_includes(){
	// Dbsync specific files
	wp_register_style("dbsync_styling", plugins_url( 'style.css', __FILE__ ));
	wp_enqueue_style("dbsync_styling");
}

// scripts
add_action('wp_head', 'dbsync_js_includes');
// styles
add_action('wp_head', 'dbsync_css_includes');
?>