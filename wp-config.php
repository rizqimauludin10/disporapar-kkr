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
define( 'DB_NAME', 'disporapar_db' );

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
define( 'AUTH_KEY',         'qTUJpO*P>n-VB(l}eX7=6{%>d_}=NS%%cZVK_Ml*+[,:C3w}&q~%TZAb}7JC,TLS' );
define( 'SECURE_AUTH_KEY',  'T4>8]XD{3V*K=E^PAMN2L(67l_ya$g~c#-hhsv8O[}y2):2_hW+G]@tSBl}?=t,w' );
define( 'LOGGED_IN_KEY',    'ZR,r$0)f5(<g7XuY |9RbU#j&*nkkNL;Lv4w+An&O7ZWgH^~3i}/7@.($OvA)qb3' );
define( 'NONCE_KEY',        '+5,]38oTZD$Xl`>N#1(2hX|pv,P-iPN#x=fmLQLslg@LZ]&v=>bE&)l(8ya.0!z:' );
define( 'AUTH_SALT',        '1B~IdzW%S~O~$uHl0Y6.epFUAfwo upmop2RjabRTwND/7/4b09pi]>7aw=S_fQR' );
define( 'SECURE_AUTH_SALT', 'LmlRP )k9D?`aQFP2b]$fTvhg@-a96P53jUv}/.QsHFgDKlka!FzVKJZL|u/dEY!' );
define( 'LOGGED_IN_SALT',   'mnJ!X<HVU$B$cDD<W%/@spe7X46`]{%Oo}h]VPde1Yi#0RA+,Ii2l[5}E^~UT7Nt' );
define( 'NONCE_SALT',       '1I.Xsu:w);I_#iJ#>0;@n,C1kVy yYIbI<GoYt-~YGUoDyzM5&W~JWei@aMJQ >q' );

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
