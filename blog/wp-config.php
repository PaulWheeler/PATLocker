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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'paulwheeler');

/** MySQL database password */
define('DB_PASSWORD', '10 PRINT”click-clack&nick_nack” v2.0');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Lrs*-#wY+mmX YGE2ZC)%#9keWvlx*vI#ZJ/pWlOh{6.L_U-8]x>F#Ev]3jeGh7*');
define('SECURE_AUTH_KEY',  'n++Vi-=d1b_rJ|;?+8z4sj[)Ev3-xK$lVZU($CT/x;iNXTL;JC[i.C^YzYO?yy@:');
define('LOGGED_IN_KEY',    'D]otG#7W]rE9e`#z54<70RYb^EKu$|xyBJj!h3|U`vN%X|=^r4u;|]}9]8M;WBmR');
define('NONCE_KEY',        '/mfR^C3N{dp%yhn#FCL#o-aU#o|b/ZO<2jqmT- 4+$}k1fB<;h+v-)Dg,h&vX~xA');
define('AUTH_SALT',        'Bu B9XzNks>Z],HfhX0]*GGzl:]t!M*$lV=zf6=*,6aOds-A6Y0*Sy=oh14+K.~:');
define('SECURE_AUTH_SALT', '3j]&a8?z(wYHpM%h,Q;p3pTqis j@,m+.fY;L|6yN_VcD-XZ tw-6xXv,CMERLn^');
define('LOGGED_IN_SALT',   '0PW=(jo}gymm8?8 -kbY/xbpQCk-(@t@VFn}f>X*BKs(%L(#J5 Z5||3Sp/W ~kk');
define('NONCE_SALT',       'y]bj6[+63QZ3*~r00-KGF]eW=8bNNK2UX=r{:GH2Yxcl sId|)?+r[.-8.ezAB3{');

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
