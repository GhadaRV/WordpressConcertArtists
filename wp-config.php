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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bdd_concert' );

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
define( 'AUTH_KEY',         'e/Ji;BDla[=Hz`2&<Gdo=W#j2:RLt42I#XP0e^WzXGo<3yVk$mmvz}M~9[:R=b!y' );
define( 'SECURE_AUTH_KEY',  '|dIKs6:.bhC&IQxM;H4;}=jNT>/>&/L,T>%Pp7j)Qq0[CkN]p_~5`W$16qPTnObV' );
define( 'LOGGED_IN_KEY',    'SGwy;J2)E?6#3A?$AI!JQr|<BsJ@8YcHDQp7lw:>F2Sp|=LA-pd9?0P3KOyrZvb=' );
define( 'NONCE_KEY',        '*&Dg_$}}?<^n$W~Ge[7>mzc|~TDpmBWi!v])*IFYaQ9?9~SaK*grM6vd/M #dhd1' );
define( 'AUTH_SALT',        '.[AUFibpOdR7EAYHL[X%NW7|%?)5wt0rE$G6Q6^d 95pa4/!AEH591nb[0N+4At;' );
define( 'SECURE_AUTH_SALT', '@h%Mp9-]Je%|)7rTZU%Q9<;qK<?<Fmq[g[l*Tai53>q{.1kX=[LY}tmddqi7+TT2' );
define( 'LOGGED_IN_SALT',   'RwCP@/}Ki }=-&?-rYshEOKEq10-|f?BL:dMyvl-titD|ifSt>n+r&MyIW4~3McE' );
define( 'NONCE_SALT',       'Jzwx|n)IyMJ %0tpkf<<Ox{=m|MS4Qf~L8=[vG71;SD#bsZ*n;UNc,(1lxk4_o?a' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
