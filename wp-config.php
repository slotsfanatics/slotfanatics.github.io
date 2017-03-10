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
define('DB_NAME', 'site5');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost:3307');

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
define('AUTH_KEY',         '58.k+Q%EL0nVKW /(k1yi3j]agCU1%G%:a!}mY!XcO(p=a[G8O+s~T5S8Ix2iu-p');
define('SECURE_AUTH_KEY',  'sdwRf(Ppv]$+#me(~w|`^hbN]ydTsO!Ty-pJ6rq@r|HBJ0T:RL`#Is9V[}|I!:*C');
define('LOGGED_IN_KEY',    '9]5uDrG^J8+44PZ^.F0nUD=2RJ5bL+vtE-(5#UWvI*~c+AD;Y8W)mEffs f]TQMn');
define('NONCE_KEY',        '9_{c7{)s/S<-O$z?:!;O-r!f7TViX3,AR1x?y*]l.h!xKZ5iCm:N]2pp3x<HjK!K');
define('AUTH_SALT',        '!9k0}7FSg];[_o.E#f_z/8pSX:ttuey%=UN7e*2^.fXMkmc(twjrJS}]1K6agBoI');
define('SECURE_AUTH_SALT', '*{x&[-RzHs|c1&n_fYg?3<XQ6UM$,(OJ,k8_O;0L#gK[h]8Udj.MVG94FGtHe?;5');
define('LOGGED_IN_SALT',   '9X7T]2}N{Mbe7WOra[524qImITuV;kNH4vtb)DL];3rq]hJR_c.I@]4*N/RGjL<w');
define('NONCE_SALT',       'qWwvcDgN=+4H)@,lX0!.A`JBrq=FOUg.Lh0^f~FWnJd#:o[TO[Mj|~hYKo0:60}}');

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
