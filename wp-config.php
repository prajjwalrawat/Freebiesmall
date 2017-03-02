<?php

/** Enable Cache by WP Rocket */
define('WP_CACHE', true); // Added by WP Rocket


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
define('DB_NAME', 'freebiesmall');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost'); 

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'JYW &Dg6 4kw~0cj-x(O.t>mJ(Bg$Fga+b?FWB&pn%p8uoK|T|!%cfet*#76zU~?');
define('SECURE_AUTH_KEY',  '>R4J9|JDe)Ea$ue]@&m[y`ARFp*.CpuTnMisAx&q@4e6bT63#&s`k$16hInulUzA');
define('LOGGED_IN_KEY',    'yb/&QBz+sp]~p`-tfLO$2B5t#ZYOdQ-9$Cm9-<~|je|Z3~jM@LM+pnv%Vh38DTl}');
define('NONCE_KEY',        '{zA#S|_th*I8!JY,u}0yx4vBp,XgDrTQ2}v?7JQmYywDbrhBwMHn?Gs3$Ah2f{V_');
define('AUTH_SALT',        'QwkGc.sQAX+K=<IIXBa`sx@<1L5bF>-/tOsWHZ?R{wDLA9?@~G+-l?X9?tNgZMyG');
define('SECURE_AUTH_SALT', ':tW[_A0$`A^Trz}k@gTX8x8)-dA2nzCrCz.kV<:>T(%B^I*l-b+dfbS_MhOOzP*^');
define('LOGGED_IN_SALT',   'e5i^+pwvR=ShBv. M&$Na%jo/6t7p`-LbKuDDlZPr/`2`;pf6fa&4vK@pGMb<+G[');
define('NONCE_SALT',       'JT>-;(!#+rl{M*G41b]?N+!nK|**^vFZ^&W|2=0P2k;wD,W`$K*+5/ +m+ EgDjD');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'fb_r3k1o0r987_';

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
define(‘WP_DEBUG_LOG’, false);
ini_set(‘display_errors’, ‘off’);
define('DISALLOW_FILE_EDIT',true);
define('DISALLOW_FILE_MODS',false);


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

# Disables all core updates. Added by SiteGround Autoupdate:
define( 'WP_AUTO_UPDATE_CORE', false );
