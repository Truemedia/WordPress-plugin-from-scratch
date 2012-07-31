<?php
add_shortcode('copyright_disclaimer', 'copyright_shortz');

// [copyright_disclaimer license="gpl" copyright_holder=""]Content[/copyright_disclaimer]
function copyright_shortz( $atts, $content=null ) {
	extract( shortcode_atts( array(
		'license' => 'gpl',
		'copyright_holder' => ''
	), $atts ) );

	return "This content is licensed under the {$license}, copyright 2012 {$copyright_holder} <p style='color: red;'>" . $content . "</p>";
}
?>