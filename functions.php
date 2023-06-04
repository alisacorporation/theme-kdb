<?php

$version = WP_DEBUG ? time() : wp_get_theme()->get( 'Version' );

/**
 * KDB Theme setup
 *
 * @return void
 */
function kdb_setup(): void {

	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'automatic-feed-links' );

	$menus = [
		'primary'   => __( 'Top navigation menu', 'kdb' ),
		'secondary' => __( 'Footer links', 'kdb' ),
		'footer_1'  => __( 'Footer #1 menu', 'kdb' ),
		'footer_2'  => __( 'Footer #2 menu', 'kdb' ),
		'footer_3'  => __( 'Footer #3 menu', 'kdb' ),
	];

	register_nav_menus( $menus );
}

function kdb_register_styles(): void {
	global $version;
	wp_enqueue_style( 'kdb-style', get_template_directory_uri() . '/assets/css/style.css', [ 'kdb-style-semantic' ], $version );
	wp_enqueue_style( 'kdb-style-category-slug-colors', get_template_directory_uri() . '/assets/css/category-slug-colors.css', [ 'kdb-style' ], $version );
	wp_enqueue_style( 'kdb-style-semantic', 'https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css', [], '2.9.2' );
}

function kdb_register_scripts(): void {
	global $version;
	wp_enqueue_script( 'kdb-script', get_template_directory_uri() . '/assets/js/main.js', [], $version, TRUE );
}

add_action( 'after_setup_theme', 'kdb_setup' );
add_action( 'wp_enqueue_scripts', 'kdb_register_styles' );
add_action( 'wp_enqueue_scripts', 'kdb_register_scripts' );