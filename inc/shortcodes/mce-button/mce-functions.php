<?php
// Declare script for new button
function wpbootscore_add_tinymce_button_js( $button_js ) {
	$button_js['wpbootscore_mce_button'] = get_stylesheet_directory_uri() . '/inc/shortcodes/mce-button/mce-button.js';
	return $button_js;
}

// Register new button in the editor
function wpbootscore_register_mce_button( $buttons ) {
	array_push( $buttons, 'wpbootscore_mce_button' );
	return $buttons;
}
function wpbootscore_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'wpbootscore_add_tinymce_button_js' );
		add_filter( 'mce_buttons', 'wpbootscore_register_mce_button' );
	}
}
add_action('admin_head', 'wpbootscore_add_mce_button');

function wpbootscore_add_tinymce_button_css() {
	wp_enqueue_style('wpbootscore_mce_button', get_stylesheet_directory_uri() . '/inc/shortcodes/mce-button/mce-button.css' );
}
add_action( 'admin_enqueue_scripts', 'wpbootscore_add_tinymce_button_css' );