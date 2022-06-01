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
define('REVISR_GIT_PATH', ''); // Added by Revisr
define('REVISR_WORK_TREE', '/mnt/websan/powerwww/home/dhssatrit/public_html/wordpress/'); // Added by Revisr
define( 'DB_NAME', 'DHSSatRIT' );

/** MySQL database username */
define( 'DB_USER', 'DHSSatRIT' );

/** MySQL database password */
define( 'DB_PASSWORD', 'dDMxjUkrNn9D' );

/** MySQL hostname */
define( 'DB_HOST', 'cad.rit.edu' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'ok|h</s7e+UQa/<Mu?|%4l~^7(ESomMH#3Co[m_~&F>XS*C^UH+(Ls?f>%9M{Bpn' );
define( 'SECURE_AUTH_KEY',   'nK;sN`)A%L[c#(02*}li6?jD@nNr7A&>Th3@Kjv0QWu$HL=tG-i{L^EPQwSb`H*M' );
define( 'LOGGED_IN_KEY',     '~RhC0RKQN~[ZU -t#gCKeDjnN(5FtfW54SM4X@HsDQBA`1<lt; 7_f`TPb$eQ&xu' );
define( 'NONCE_KEY',         'WiqYysN41|U!UNs*j)Z w.qTR rQ|L~i69O]4)-khnl^NW,#j>Y%t0Bh>7xIm;o>' );
define( 'AUTH_SALT',         'Mw6{OMyB=K:[uvf7*hvn;P_PZn[yh*Xswd?8~6T[`1SMTNzB,S%8D?xTb%!yLAFb' );
define( 'SECURE_AUTH_SALT',  'tA{^J=Oe4Kw!:;{$$VY6;A^QMz=;R,jNd?+7wT4)QzHi-%|}#G&7FmDE8_-R9L//' );
define( 'LOGGED_IN_SALT',    'rf/T${i;YGU7Nq:.Fk~G@iVqL`=U##{)^*=I .&m1$,CVaOe8{gE1kh^i|P3+%Dy' );
define( 'NONCE_SALT',        '&O3pthBYh/ bwYfv3xJ.c|B!Q?l<a/[Vnb;^u*@U?X<pW7Cf8Y[Qm%_V&(k1$T]i' );
define( 'WP_CACHE_KEY_SALT', 'noiLKV46l;2Zo*/o103=0yv[2rQkfnLQTcnGEtNur?$}VCtdO)(s6JTq.)4`{.8q' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_portal_';


/* Multisite */
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'dhssatrit.cad.rit.edu');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
define('DISALLOW_FILE_MODS',true);
define( 'DISALLOW_FILE_EDIT', true );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';