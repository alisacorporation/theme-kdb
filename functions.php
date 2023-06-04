<?php

$version = wp_get_theme()->get( 'Version' );

function kdb_register_styles(): void {
	global $version;
	wp_enqueue_style( 'kdb-style', get_template_directory_uri() . '/assets/css/style.css', [ 'kdb-style-semantic' ], $version );
	wp_enqueue_style( 'kdb-style-semantic', 'https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css', [], '2.9.2' );
}

function kdb_register_scripts(): void {
	global $version;
	wp_enqueue_script( 'kdb-script', get_template_directory_uri() . '/assets/js/main.js', [], $version, true );
}

add_action( 'wp_enqueue_scripts', 'kdb_register_styles' );
add_action( 'wp_enqueue_scripts', 'kdb_register_scripts' );