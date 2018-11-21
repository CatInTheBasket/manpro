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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'pf!tFHekIrK[n^/eG8)=x-RNO1V].shPhRqT {J1Ei?@zC}KlVbI1:9~|+jG6 nl');
define('SECURE_AUTH_KEY',  'ASB}n~Y^|qm67Mo4`:PeD,Q1vH./mdrOFGW[/Tc&Y=<6T-#Ppl2eDp3Dofig2Q$K');
define('LOGGED_IN_KEY',    'k,1io}8U: Ub-YrN6p!#KKo_)GZ}ok&U!XvS=65O4!5,.:AJOZ</gjuUx;S!0Fpw');
define('NONCE_KEY',        '`u_D9=em$*@7*UB`cJq]}W!(>R_jM{z+N0Pf8J<V;_bU[(pMEn3(E-p/f^*Mj0?)');
define('AUTH_SALT',        'k$}dAFoLRE*dEL:`I%y.?Gn OG|)>J,[3>7AG&ZwSGM@Zf>c6p+`a9uT*n)>w4FY');
define('SECURE_AUTH_SALT', 'WzO4tqM#~Ns7=zf^w7Nh9u-Yq_Oc3GlBJ{-%s09w7zUs%Q9dkV+bdG-waLVGwf<}');
define('LOGGED_IN_SALT',   ',rl2)BOJ[Br3nz>f*;hK8EP]CdL=c=0`Y6OL1o<w^Ad7k3@Hn$!*E:74@s!26wPI');
define('NONCE_SALT',       'Ax*j7U{%|l lcsI.kZ@%.ew77  SsGt3z{51BVpr93z;$LI3:x0KQl{?r(!Qw=v<');

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
