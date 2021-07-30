<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nonisnowy');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'mysql_wordpress');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0[=n;#hZ][x}tdz%rDN g(b#g|*<  /6oa8yy@t9wc,8/-$@pZO1W2D+=wLvjIec');
define('SECURE_AUTH_KEY',  't{5 (&XiM&9ZXG02LDO!#^F;p^F1Lcqi^J?[?,0Vvv/yjJ8-rQDzwS=RV~sz(dFO');
define('LOGGED_IN_KEY',    'sO!UOZA;Q0m-+3Oc2rw~-JJW:,[](ejQDbtGfZYxkSAvQj* 3@NfIhY-Ja!lHcP-');
define('NONCE_KEY',        '^5_s>EqD:IVE@T|0e-ZP80w{jVJm7hU qFd}O@Xo}5zk>{:%/7e<.I4#CIr((&Zj');
define('AUTH_SALT',        'bu@>u}deB)WRli+owqGoBG[ y cu`qYe-UPlsB4=db)/insgN{}C%XF0`I&PAs3b');
define('SECURE_AUTH_SALT', 'GzJMrq60^TD)];adn#NphyT8d+o3F7<Pzk<gD%X) $Q_z5o,8119Svs_N`KeyzN0');
define('LOGGED_IN_SALT',   'm^9OJ/A<b}dFKE`%e2K]|C=farB^y/$z>:vH-)%-Q1lxpx4ci@@r[dt.)lhme&5+');
define('NONCE_SALT',       '1U)$#a8z71Fx&B(GPDQp:K6vuX;KDU]zd:jY[*=^)3c[GyV=g5ZqV2EGqJ&YGV.]');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
