<?php
add_shortcode('copyright_disclaimer', 'copyright_shortz');

// [copyright_disclaimer license="gpl" copyright_holder=""]Content[/copyright_disclaimer]
function copyright_shortz( $atts, $content=null ) {
	extract( shortcode_atts( array(
		'license' => 'gpl',
		'copyright_holder' => ''
	), $atts ) );

	return "<div id='dbsync_licensecopyright'>This content is licensed under the {$license}, copyright 2012 {$copyright_holder}</div> <p id='info_distrib_notice'>" . $content . "</p>";
}
?>