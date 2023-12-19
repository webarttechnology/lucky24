<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'lucky24data' );

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
define( 'AUTH_KEY',         'zHG5;2k_qWydmeKFJt?A`J1&Zf$kwaBc +1[8[IPLP90wZtM!5&`+QuC5y]sywNd' );
define( 'SECURE_AUTH_KEY',  '3be[z^_=q-<cg&y<At}r 9r{YD#*P$d)$9-;,B;3&$tmIV:3?_&NF;:OB-h;nT*(' );
define( 'LOGGED_IN_KEY',    'fVyCbvIC<|_,UZA+nKE)g-NwkJeg7)j_6nu-(l|ER&0SnnLV$/V6lbL,j 1cLxcV' );
define( 'NONCE_KEY',        'GP8L7Hn>g#pAmqdpC^VhiT98Tk1Oy(}VW&=0`o.FOeU]|q.p*/1y@a0!Ewy/@{aF' );
define( 'AUTH_SALT',        'agHu)bi)Z],~hphFQ,#(.5 =&Vg]Ae{Pkx2sn6EWG`cp7Ch1 *+Mt&78CryvrK&a' );
define( 'SECURE_AUTH_SALT', 'pO_A^sdh?F(_oK2}c6OW/5j8:&tPo!&x{jb6r0k@>+csbl!.p{4hHU-eu*9:D#R#' );
define( 'LOGGED_IN_SALT',   'Ht:{.-`zQ0|%:!JW%2tO/;mBZC9!ScV<gZ;SDpm?~jds8 {:]Edj&BL)qSCpI=OP' );
define( 'NONCE_SALT',       'X3FccWx/_XbPE,k,^;p*mn^PT3_b.8QGx<_Tj3a+&N&L!WcxwWrdq,emINtDc}->' );

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
define( 'WP_DEBUG', false );
//define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
