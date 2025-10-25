<?php
// function preload_theme_fonts() {
// 	$theme_uri = get_template_directory_uri();

// 	$fonts = [
// 		'UncutSans-Regular.woff2',
// 		'UncutSans-Medium.woff2',
// 		'UncutSans-Semibold.woff2'
// 	];

// 	foreach ($fonts as $font) {
// 		echo '<link rel="preload" href="' . esc_url($theme_uri . '/assets/font/' . $font) . '" as="font" type="font/woff2" crossorigin>' . "\n";
// 	}
// }
// add_action('wp_head', 'preload_theme_fonts', 1);

function styles() {
	wp_dequeue_style('classic-theme-styles');
	wp_deregister_style('classic-theme-styles');
	wp_dequeue_style('global-styles');
	wp_deregister_style('global-styles');

	$cssFilePath = glob( get_template_directory() . '/assets/css/main.min.*.css' );
	$cssFileURI = get_template_directory_uri() . '/assets/css/' . basename($cssFilePath[0]);
	wp_enqueue_style( 'main_css', $cssFileURI );
}

add_action( 'wp_enqueue_scripts', 'styles' );

function scripts() {
	$jsFilePath = glob( get_template_directory() . '/assets/js/main.min.*.js' );
	$jsFileURI = get_template_directory_uri() . '/assets/js/' . basename($jsFilePath[0]);
	wp_enqueue_script( 'main_js', $jsFileURI , null , null , true );
}
add_action( 'wp_enqueue_scripts', 'scripts' );