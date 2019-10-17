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
define( 'DB_NAME', 'subrademo_corpea' );

/** MySQL database username */
define( 'DB_USER', 'subrademo_corpea' );

/** MySQL database password */
define( 'DB_PASSWORD', 'N+#c9^W5j1Lv' );

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
define( 'AUTH_KEY',         'F()Dcb>2H(_w@}_]JhaAp-G&z-9m{**RM_}q L-Ejr?>gdP==$e7`R&PH:nz G9Z' );
define( 'SECURE_AUTH_KEY',  'yPq0 !C#(imfQ*GeIHl<);5x`-h^~&/z%tv[v$+!A& Hw_;$?bW!jOSUVK#lS2U&' );
define( 'LOGGED_IN_KEY',    'l%kfPv8^f(x.EM)XH;`kZo#/p3.{:O7l!Zl*x/Em~(DzZ=6RF%)vHjdA?:@#<l7O' );
define( 'NONCE_KEY',        'N..c}=^JNfP6?`Hf`X/~T#&H=eR 6(F?~>s0?j|XRnuEE!`q[i6|+(KLWPl<8;*=' );
define( 'AUTH_SALT',        '3c*fZW/F[--G|S2}-6wILJyD)ZOQQrXhSv.7)DI~|[5}G+Ogna$p|ZVje>%YKU7d' );
define( 'SECURE_AUTH_SALT', 's6F3iS99hr *t7s^6 KAw/ c*=}Z3%l^c{yM=4F1:OI= O=_~/&o[YK/za&aj_HL' );
define( 'LOGGED_IN_SALT',   '/X.Fhs[G!^yOJU{}H|BrDVpy8?x9h-mr4b,>L>Ma,*PkLAag~~VJ%6>C|:O6/fT5' );
define( 'NONCE_SALT',       'C@]zgM<g4Fj5f{)yaTm}Jv0zIy:yI<(,0o^e@iscP?r*ZsN3|!d]Mj*WQQk]~}c=' );

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
