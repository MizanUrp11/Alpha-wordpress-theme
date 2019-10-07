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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wptheme' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'J+G4Ux_FbF_}K;k5aJg4~Gx%eZ?BxI.}$q|M]eU[~WuMel[}R+tYP/^{:H-htr^-' );
define( 'SECURE_AUTH_KEY',  '+&5AF[g7w~o5wlt8_4_+[adYOHR{Ee 9j}.S/0yV3BXo/~Gl;AmkVb/&*U)?HOCh' );
define( 'LOGGED_IN_KEY',    'Mo>:EHQ9i,Im%B&^u</e|N y~jl)3z%Sv4L.ha}%OZ}[-72#GzeNy60tWQ#Kl#0M' );
define( 'NONCE_KEY',        'DfdihHmS2L5X_~^QEN*EqE9GD9I]J1ruk{p%UxH+7,R-t)]MJz_g/YA@Rs??f7u_' );
define( 'AUTH_SALT',        '0?l-`}wUnO+rp-M^!oaGHpZe6d:<8X^/vz0D+K;77X`Hy7Q^NqOh?K{_oC0I:Hep' );
define( 'SECURE_AUTH_SALT', 'y6_<LSWlb<WR%3()g#?]`)Nogub=}q/:>b0.b-4>;Hs*>d)+GlL=Wu22+9]9dt;g' );
define( 'LOGGED_IN_SALT',   '4=<iL>NYs?*yJyM8%^!y+!BSZ4<=A6(3EP+1cV]H83WnZruhbkgD3yG/~dy!LM/r' );
define( 'NONCE_SALT',       'TReB,4NIajQ<q5>ns]H%W<6q8YZC;.->-,CyGD]Abz^AHtRP[_O&`;>+sM/ft4K$' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
