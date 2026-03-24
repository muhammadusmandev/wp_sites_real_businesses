<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'acbtrades' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ']G+n78U.rON_;3D$>=nt]xUiV|6mP8m/?)&T7] 5Z 6-1BgshRiFM6FR]Dk,z~M_' );
define( 'SECURE_AUTH_KEY',  '~WMP2Cp&FkH !txVXk5m|8NImh4PC|0$L()a+gk~aPb)_!pC)OK_SHZPafP5|qQ5' );
define( 'LOGGED_IN_KEY',    'BToQLzR4muSQU$bFt}R[@*.F3hNnk3]w]rqGLa&Si?./:|6?dBix+|B}?<^8x?H[' );
define( 'NONCE_KEY',        'B(u<n@@=y[.4.I39opZ_}V,~,unAAI}*y9%1h8W}z:?^;F<m8.a/~h!esKLF r%+' );
define( 'AUTH_SALT',        ';=]%;v}]r7)x)29n4gl0}w@pD8C4IxUlKgVl El#r`Le{;.fqHk+shIC}3c!gV{_' );
define( 'SECURE_AUTH_SALT', 'U/A~9^FSLjdddC`;y:^`@8s@Gg^hBi]n;-e0Ri94{x;xez?E=Zg]?EX!y04zAU{}' );
define( 'LOGGED_IN_SALT',   '6{/%W37yY]qJG~j-akZlWx6heNcyR^27eEFyB4vMZeBFl!Lv(N$ubS8WMQ],%W+T' );
define( 'NONCE_SALT',       '3Jh(C2U}2ldv>ykW=Kc`;#2osU!V&V]?Ke`R6-fxj2V!ml!wwO!>!wo~UebXbhA!' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
