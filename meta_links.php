<?php
function dbsync_plugin_meta_links( $links, $file ) {

	// meta link for plugins based in folders (not a single file)
	$this_plugin = dirname(plugin_basename(__FILE__));

	// while wordpress iterates plugins, see if current iteration is this plugin
	if(dirname($file) == $this_plugin){
		// extra link to show
		return array_merge(
			$links,
			array('license' => '<a href="http://www.gnu.org/copyleft/gpl.html">License</a>')
			);
	}

	return $links;
}
?>