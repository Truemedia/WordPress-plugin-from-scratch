<?php
function dbsync_plugin_action_links( $links, $file ) {

	// action link for plugins based in folders (not a single file)
	$this_plugin = dirname(plugin_basename(__FILE__));
	
	// while wordpress iterates plugins, see if current iteration is this plugin
	if(dirname($file) == $this_plugin){
		// extra link to show
		$settings_link = '<a href="options-general.php">Settings</a>';
		$links[] = $settings_link;
	}

	return $links;
}	
?>