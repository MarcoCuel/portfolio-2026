<?php

add_filter('show_admin_bar', '__return_false');

// Disable the emoji's
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

// Filter out the tinymce emoji plugin
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
}
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

// Remove auto p CF7
add_filter( 'wpcf7_autop_or_not', '__return_false' );




// Remove menu
function clean_admin_menu() {
	remove_menu_page('edit.php');
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'clean_admin_menu');

// Remove widget
function clean_dashboard_widgets() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'clean_dashboard_widgets');

// Clean Admin Bar
function clean_admin_bar($wp_admin_bar) {
	$wp_admin_bar->remove_node('comments');
	$wp_admin_bar->remove_node('new-post');
}
add_action('admin_bar_menu', 'clean_admin_bar', 999);

// Remove updates page
function hide_update_menu() {
    remove_submenu_page('index.php', 'update-core.php');
}
add_action('admin_menu', 'hide_update_menu', 999);
