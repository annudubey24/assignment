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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '=:3aq3NCPo5Z]nerxef0rS=_aBa);^Nj`%ng0bO6(JAXpL-5SLDK%%Vf4X|f0EqY' );
define( 'SECURE_AUTH_KEY',  '$UFR+6Agq%}JOU^g04B`0&Gz8*>kRv6p9(S,8Mum+ =<A6ARPd6^Wah}FKF5,dd~' );
define( 'LOGGED_IN_KEY',    'p{,U!snkBW>ia$dva35s,!K7b()8ZT&ZuRCnT;_1.Ve]wl63|i!@K[qz7.Rt5=Qy' );
define( 'NONCE_KEY',        '*]Q^^L?@~`&,F/H<,(?M~+E;zEZebmO8Z:b+1XM)! IyB;4!:7$JVd=t@eFNA4FO' );
define( 'AUTH_SALT',        '@wEp}z&yXD7~aYv`|a-e!:rLe)-hIh1mto>Pb/9QvUxXZh9TF]-Dnk8Ew[R#1~;j' );
define( 'SECURE_AUTH_SALT', '[d|I/Xi,IdQi~Vl2G9/S3;,YUX)|7HG//}F4Mny<X71qWInX1^Z<3GhU,RGKz^+a' );
define( 'LOGGED_IN_SALT',   'Y<4_ZgVsl_tO{y!W28IAd{f)5d(^F&S&C89vh8q[E7yQ96YSoL`2Fat`8}_Y|b9J' );
define( 'NONCE_SALT',       'TDF8W:08q<luSm^Ros7J]>&dDE9G4r3ODk.uzb~D{d,0oJS3]>d(Z;<?d@p#?],8' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true ); 

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';


define('FS_METHOD', 'direct');

