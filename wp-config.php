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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '3dtour');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'O<v5v9.=INp>:Kzia]jPOBS0e^[M V815*$[J_bMVhk7}B@HJ|ehLjs $6d*awbK');
define('SECURE_AUTH_KEY',  'jFh0OEP{ruTL u;}1b!VRD8xy9&Iln%#Q]WTr6qqqd1GFp]5J_`l|y Ed8KRG$n3');
define('LOGGED_IN_KEY',    '*BI- M<ST~7CwL;uD,BG{,^%c=LW{|ocuPD:0SU}!VI$|N:$0B=t5w=Infnm>?NP');
define('NONCE_KEY',        ']LGRlsbK8<33%!;aJU@v -qs}8AR^<YwL^.Rg8mZW[?04Wum]ug9[nQS7,S`90d_');
define('AUTH_SALT',        'J+ootPEsRM/EIWwa{{gX)nQ5vx@^h+Td4,RybWC ^>okSfr6K.R+Fr;mHRQha!.Z');
define('SECURE_AUTH_SALT', '`XjK{hp4>Bx m-c9*0Bzl!$ZPOuQnKso8b}J-VOy2eS2zO{w92qbY{ 54qw9t)~v');
define('LOGGED_IN_SALT',   'R~mq?Ix/+VEtpH-nT}v B&baS])QF[jjM:vWnD.24JK)58S~M!_8[0b=n_p5C0$=');
define('NONCE_SALT',       'dEL2VbQwbWeD<hD7a3De!AcYu)=L~H?wzaVfAT9T*Pz-;z=sg|C)}[$qx/ws8Z`/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
