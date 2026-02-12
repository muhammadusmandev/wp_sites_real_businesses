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
define( 'DB_NAME', 'trojanproservice' );

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
define( 'AUTH_KEY',         '`Kd(m-QmVfPSWQvG;jnw.}r! @3Oe !8Q%CFq_[gH8-<GAUxyZ!CA{ep45^1!1JB' );
define( 'SECURE_AUTH_KEY',  'Ub!1~E+..4KpWz#WZ`*L;2{t>zZ2[r]b_e^x((X0S@Zj /~>XQz/d,5sxZa]n>}r' );
define( 'LOGGED_IN_KEY',    'suL@X/ tl9lRbqM7G|{xP,qLGVe@P.z;CM;[Sd _!>ZAjBDwYne4*x`AG6CM![fN' );
define( 'NONCE_KEY',        '6_0bzCV@8_-VcE%Z=AtoY.4>BV[)Nlbt7}v~<Cx=2o)n>tMYOAr2&4F?m)|=b>8d' );
define( 'AUTH_SALT',        'vL<>Wn;vSGUy>U:;K3@O4L_7kF ^8}= ,f0u7D>QPDhmjrH:#xeBD01G%B/5Q$J]' );
define( 'SECURE_AUTH_SALT', '/T+)K<EQ){B]aS|?&H~AibO8- 5WF36^;p[]~/P(^|?Ku7pS-ij&d{b+TcVs<9c}' );
define( 'LOGGED_IN_SALT',   '^C>+%WHg7I[#9P-~*{#HVN^{}pyInVNb>I#CYV =08BFe(3LpNd4JJUt&g`01{6E' );
define( 'NONCE_SALT',       '_lU1f(KrYVn8&8>QF.&9cqxT6CM_/9eIkPrNvE?.!v> ?y-0V}AIR&tbD/y0f3b,' );

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
