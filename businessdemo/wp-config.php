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
define( 'DB_NAME', 'wp_businessdemo' );

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
define( 'AUTH_KEY',         '[{p&$#n1 2QJ[/:8!;GK[`~B)USB}tG&m/p[l4T2JM5^LB*WX3EMl;cVO6lrxQpa' );
define( 'SECURE_AUTH_KEY',  'L#6^9Ep4ZEakB?e U{sLa%PzW))sjUg@*wA&aFj%c`eRVmfx*(AiB99mjPR~5]oq' );
define( 'LOGGED_IN_KEY',    'Y5zX4CUL}vv{OC>hOKPd6=B-;!Ny:.O:#ZGEmxQL*WkgOz67E00nL*2:&o5QS}C,' );
define( 'NONCE_KEY',        'kvOKd_r&OMZWXi1DD07PfYz AMjY%h7$ 5cq;@_NJ[U:L{>#T.E~0szaMTG<AQ9?' );
define( 'AUTH_SALT',        '!7r956D4sm[6{FLVnN*8j;YP%?Ti,&bu}/m@0@++T|OsA)DyRtDzhEqj@E+U^GL3' );
define( 'SECURE_AUTH_SALT', '_wP{p@p2D#ut?Y}p:N-HzC-23S&,juNa#f;e.)eK_a@etI2~QEz#m*0n5fd1$3N&' );
define( 'LOGGED_IN_SALT',   'yP6[?Fr@Xo60PJ&FPQAFiR,eySix6nBTeS>i+t{%n4R,k%SK?5#tLKdU^LICrS9h' );
define( 'NONCE_SALT',       'BU`v H1QE@%MJf?Qz&:Pf]ML+ON>}F^z{A{-o8ct~AxB&wwrL8*VE|*U/^,GY8$R' );

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
