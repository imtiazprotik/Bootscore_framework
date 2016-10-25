<?php
if ( !function_exists( 'bootscore_wp_register_custom_post' ) ) : 
	// Function 'bootscore_wp_register_custom_post' starts
	function bootscore_wp_register_custom_post() {
	
		//require get_template_directory().'/inc/custom-posts/cpt-service.php';
		
	
	} 
	// Function 'bootscore_wp_register_custom_post' ends
	add_action( 'init', 'bootscore_wp_register_custom_post' );
	// Hook into the 'init' action
	
	
endif;
// end of bootscore_wp_register_custom_post function_exists