<?php

// Theme Supports
add_theme_support( 'title-tag' );
add_theme_support('post-thumbnails');

function upload_svg_files( $allowed ) {
	if ( !current_user_can( 'manage_options' ) )
		 return $allowed;
	$allowed['svg'] = 'image/svg+xml';
	return $allowed;
}
add_filter( 'upload_mimes', 'upload_svg_files');
function my_mime_types($mimes) {
	$mimes['json'] = 'text/plain';
	return $mimes;
}
add_filter('upload_mimes', 'my_mime_types');



// Remove author_name e author_url das respostas oEmbed
add_filter('oembed_response_data', function($data, $post, $args) {
    if (isset($data['author_name'])) {
        unset($data['author_name']);
    }
    if (isset($data['author_url'])) {
        unset($data['author_url']);
    }

    return $data;
}, 10, 3);
