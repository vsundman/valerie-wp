<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'valerie_wp');

/** MySQL database username */
define('DB_USER', 'vsundmanwp');

/** MySQL database password */
define('DB_PASSWORD', 'CjrBGKy72RprjuDe');

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
define('AUTH_KEY',         '/unWjS`)y:J|wK8)v9<+8Q1VVF=Hj?5y/||@hFYhU<h^)<*N|diTr/R%e4aq0iU|');
define('SECURE_AUTH_KEY',  '}<7kk{ujsrD~*G*OGMud/|QAs&wFw0=+#%6n==wIMVxsp[-DnGh,:cl~/fD8K(gc');
define('LOGGED_IN_KEY',    '[8J,(Ia)NlD$UL3u9VO(ZE2&ex*}@/.4d([{b^-4GAJsdrS7?#--1IQ$6{Md]E!2');
define('NONCE_KEY',        'M-(Km!C{ev^aUOfm-Tk6`{~=9wRD3N,qBP<rL|6,*G;A(GGd6}%fYej*ER]K#G_9');
define('AUTH_SALT',        'w(UXsXdlcSw~PcIIC,)Bc`CnZAMpF^_;GC^S%@Z1j@>j42m5WmcM&b!+qhAb:oyF');
define('SECURE_AUTH_SALT', 'EWA(0i8Qm<6D-m-9_?1&==objn=+`by=v:-o<NC#fbn{IsmU/548(=aleCj7:|CO');
define('LOGGED_IN_SALT',   'Quu(_ZHc1jjl*%5gs(T8A#8n{PVV^~2u+ha>v&3w2{Do;p)kxmdXf-ug~nr5Q@<h');
define('NONCE_SALT',       'k$6bj9W-k4/]&:lBf.~+F9H^2A 2,P!WQI#0|#<$WA_1Fuc&mM$KD0K~])MJ2|9n');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'poodle_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
