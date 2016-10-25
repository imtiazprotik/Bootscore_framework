<?php

// Shortcode [skill text="html" percent="80"] support
// Shortcode [bootscore_wp] support
function bootscore_wp_shortcode($atts, $content=null){
	extract( $atts = shortcode_atts(
		array(
			'' 			=> '',
			), $atts, 'bootscore_wp' ) );
	ob_start();
?>
 	<!-- html goes here -->
<?php
	return ob_get_clean();
}
add_shortcode('bootscore_wp', 'bootscore_wp_shortcode');


