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
define( 'DB_NAME', 'kendra-soliz' );

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
define( 'AUTH_KEY',         '5s~VF(pX@X1PqQQH]s~D,/w>2=,oz=Z5*S!hDUWb0.Ji1[&A;(qM/EGMD4IBI_*y' );
define( 'SECURE_AUTH_KEY',  '&]c:)rbxYuEI7D20?ZRZw=?#DF#;`Y^,Pe]&`xMU_<UiRJoQ^NLI+wcX^(2QW]*L' );
define( 'LOGGED_IN_KEY',    'rSwM,@a<F@-wv3gHr>@Z._VwfSO?U}`:w/X!#PY3UY+SOmkX^ZUx0e1vxxD[AVSN' );
define( 'NONCE_KEY',        'T{4kR(g&f07$E5&#Tmn<[xq:]=s$poMd9=3)Paah9_PzFqewlgJ}j~7^VLF_^l c' );
define( 'AUTH_SALT',        'V~gq1]#u|^uB,aN9<~qy<3G&XR{ :J[v#XrjLrkHQKELg5@-t^?zqIHkHHwr.4KK' );
define( 'SECURE_AUTH_SALT', '5Ui7QGblMD|Y<KzGQsg/YOAIeZR|g2%1<e^=2}GMSpDb0K{@HfDZS[sZhzao1`Ks' );
define( 'LOGGED_IN_SALT',   'iPeFf6>Xr-W^BIF]jZx6RXehFe9D=AzowmB>sWv7[(c04hL^_m1$.wPPUBfD__?c' );
define( 'NONCE_SALT',       '.bHe&M%Es523Va|Q%%Fjs.]LKwVcHVkF_~x&*|$E~|,R^mxw,{E)g.N^UwPwR!G{' );

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
