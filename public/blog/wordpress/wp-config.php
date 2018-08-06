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
define('DB_NAME', 'petmeprezent');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'KEv] k=yi/+R/hZ2x>7KWPLEXEJ8ZZ+%)Y6(H[[Rd^.+(!8d(`~bLl]1]>=+Ja}k');
define('SECURE_AUTH_KEY',  'ba.MibH3gjAt=dF^D}4,$*i21[K]RuMI:O$KtC_vL2eS2SB05jt* .CJ|;+g,VC/');
define('LOGGED_IN_KEY',    'M@Z+/@7u=<pUX)`i$qp=!|E!OHf`*h(/a/nmv5<Qp{*=FZ~EF^{k_j_ri gHDY(h');
define('NONCE_KEY',        '|Bf/[rXKLGE=`(0+ThE*bKqv1# O`Br~V{:-1Wx.H7IH5=5QG4OXS+@?i+4yYvb?');
define('AUTH_SALT',        'HQlK/>-<tk{D+^|CVbhu*BY+-#>ttn6aIkN`s]Ah_ <A;46ZR9v2NUcFfu&}ZTUY');
define('SECURE_AUTH_SALT', '?77+:6|?nt@wOf&{wum14$vA@vB)faa!GF8iJ.=-)@rGiA,aEncH^2-tYqQONU*I');
define('LOGGED_IN_SALT',   'XL,CPX DhG8;.%8J1LwEqGDKkDn?#W0Q8BX$kA9w7nYOGnLv*eHdAZt0Ob1]b>SS');
define('NONCE_SALT',       '(^l6XO!lnI,7nCbu[<^8NVMsuO&W:ppG?UVK0C/r}.#_){o).%)BTTf^1yns~v}~');

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
