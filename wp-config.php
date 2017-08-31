<?php
//Begin Really Simple SSL Load balancing fix
$server_opts = array("HTTP_CLOUDFRONT_FORWARDED_PROTO" => "https", "HTTP_CF_VISITOR"=>"https", "HTTP_X_FORWARDED_PROTO"=>"https", "HTTP_X_FORWARDED_SSL"=>"on", "HTTP_X_FORWARDED_SSL"=>"1");
foreach( $server_opts as $option => $value ) {
if ( (isset($_ENV["HTTPS"]) && ( "on" == $_ENV["HTTPS"] )) || (isset( $_SERVER[ $option ] ) && ( strpos( $_SERVER[ $option ], $value ) !== false )) ) {
$_SERVER[ "HTTPS" ] = "on";
break;
}
}
//END Really Simple SSL

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
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/var/www/html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', '31e7396025affa419eb2cb0bb3c5fa84d01c35013ed28169');

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
define('AUTH_KEY',         ';iE9=4j|rIq=z(uCSn_}u)g8phH4m11|Dk,BE*hX`FmTN|#b@,MY*_l~B9f][DdY');
define('SECURE_AUTH_KEY',  ']yTko;S:jL UsYCt*ip`$<l//jbL99];T>)kwXK*/b@5PdfCR]1$e:q_ivH3F9Rt');
define('LOGGED_IN_KEY',    'jNDsL/|+0y~2>7u>0Sw^%P$ANaNYl1,s1*IdvNIr23Pv&hDY{IE1>mj+f3XwRL+=');
define('NONCE_KEY',        '>Lgd.u94YqnMoZGG4z0*6xy_S,Wvbj8ZZW[{G)50%K5{1n):H@e(RtoLj$}cFKf*');
define('AUTH_SALT',        'xK9]xi~Pwk9SN-3kYugSzs_[D>r|^Fm9)9N`eCy:25OhD<%)F&eQ*TJ@h>0M6&x*');
define('SECURE_AUTH_SALT', 'n+(4eU_k#_g$X2tV`U?*M6GR0-}SCI^%:UADBy0Wf=LLuo[-]y.b~P)SB$oRxT3B');
define('LOGGED_IN_SALT',   'W`XNY9%.9TAt#uR({&]N+,fS)]BS<$lRiD]dWdbgCddxwI`0kr46[lmYpuE;|Va@');
define('NONCE_SALT',       'h@lOwFt<Q7R-Sv>{be8_FBo]j88X|*4c*pvxUkIhr;qYV/j={J#iT=V_H~w(PYc3');

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
