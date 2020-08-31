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
define( 'DB_NAME', 'blue_sage' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '>%S>49R3NyYz8$jbjTLpk_4 nY`iH#%.^b1$kvS+$:!o__nNwbFnL5+Ghl;[?+Tj' );
define( 'SECURE_AUTH_KEY',  'XnQ^TM7bhqgMZ9|oRd<, pozM7IduPLL,]ISk(2_S%vLee5m!<jL,gBYa*1m3I8H' );
define( 'LOGGED_IN_KEY',    'gAEWL^w^E y|Qwc2@,~pSM#5ZVUi88wX7KwkRe+Y]gFsW~.X.w==,mF;X})Ey3Xj' );
define( 'NONCE_KEY',        '-7u}[u@!J/TS}DKi]_9:e)k{m@{lf5;(SM0.nxS41VQ7kw77HzaKtrP:}iB!)3<T' );
define( 'AUTH_SALT',        'ku)HpVb7Pj7)z2zKf1 PxGWT`ApC!NT*DQ]QT[=#H*N_1V *w]AqD8dT*2zGg8oD' );
define( 'SECURE_AUTH_SALT', '(N(D8v?f,=b{`2^(%Se#ve(V}#[ja3bb-h. {A1sfs;b0j-aF#M*MQ{<k)b)Nr>9' );
define( 'LOGGED_IN_SALT',   'ZE][oBZ&f/n)lMFc5KH*m^u /,bQ|^e*vyjY.Hqip-b1c+bF]}/CTyL]$LC#.Qt`' );
define( 'NONCE_SALT',       '%Y(exK&}/weCBh@ti]7V&S/Boa<D?rvB=s[d7K03pS1W`tOtK8Z;9T7*U!#5/Y>&' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
