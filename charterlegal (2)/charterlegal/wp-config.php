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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'twebexpo_charterlegal' );

/** Database username */
define( 'DB_USER', 'twebexpo_charter' );

/** Database password */
define( 'DB_PASSWORD', '9086vMP!B6783p' );

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
define( 'AUTH_KEY',         '1$V6y|8jOQri+=2/iifh^zQg#}yvr?2U>(yfRJA-FD]}tuD=vwTa6I9@oE.WXaz<' );
define( 'SECURE_AUTH_KEY',  '-mB<Dq(hza`Dn2.*+NL9&Bcm#&M561vuEkb<>8A@,`p-$SWF)T;p14~U~Z I*Q7?' );
define( 'LOGGED_IN_KEY',    '7!62wGJn.k8_Her!/=#eL+jL}c2*C69?k7^P?>paf@|7x-,1G13%-P+k7T>ekV^x' );
define( 'NONCE_KEY',        '5bm}_gCR3|t<Etl6]d({>okj.ileSK18I$70pe&)VIPa/U0TXe>6`k8VK/bS*W[+' );
define( 'AUTH_SALT',        '#i=fczHQ<[]wfOC1}7t]VKI22+Ck%<%;pI i{?&9y|ASWgm%Jegi=1g1+~#m[^%5' );
define( 'SECURE_AUTH_SALT', ':c<@1<XY$`3O1x!VVUQGNLofEXU@0{`~+h*YHhmBLx1=bgj;C#hs31wM/?UVdh$|' );
define( 'LOGGED_IN_SALT',   '[9xKwmqz`Tcuy~%[y#{mYTba9w$v %%>$6<pnurq1NY(UR^7:rx)i= #HYoTD!9g' );
define( 'NONCE_SALT',       'c]A3no#.u[u&ZF-A*y6>j]Yw&t.kk)}p~0b6&T_V6A2H6q~siNThb[DuqB-1Tr7#' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
