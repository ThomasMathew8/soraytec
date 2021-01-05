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
define( 'DB_NAME', 'test' );

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
define( 'AUTH_KEY',         '#A2~:R5KA<)=17r<+9=VpwLCV>[Q:5;`/R_nzlY`/~.*)PW0vO,<95(W*ChB7Qrn' );
define( 'SECURE_AUTH_KEY',  'Vd,9wctS $WVl4@g=Qm)5>auvMl`,0nTzr/On]ZTla5IRCTH$TkoRy<D(lKMVgZ?' );
define( 'LOGGED_IN_KEY',    'wEXq4,!u&1yWh|FQmm,-hJI7vJy#5+Kg7x-kvE3E,Q`Z6l5h+NrtwQ;w4x_gx`d5' );
define( 'NONCE_KEY',        'xfY{-Z{%5 ){07X:[1d3({G@]Qig<2b!t_2i~+T4N(*v3*/Tg7hzIuh05SF3{)U=' );
define( 'AUTH_SALT',        '`5S?(~lWl7mN$Rc) `hhkF*2_&q ymAds e2$FNAm1CvY0+#uI7aVU/@|?q:9/[A' );
define( 'SECURE_AUTH_SALT', '$.z9P-ySgqkcsn]J^mBD]kEI?teXYSVeM=J|`rGyCG9-WTVuLT}TM9]CMdnm&NLg' );
define( 'LOGGED_IN_SALT',   '^z,8i3>K3`O-R,BPQibe$)RT#doZse_|g}hUTyUoN`[KDTM#V,dxZhpDfrp,*F$v' );
define( 'NONCE_SALT',       '?7r9MMmF[mDv*X5a<HhlQZ[7^MY{(t5Tv$b_e5%qa?L1/fn3C4o^hDhw]3W~#q+;' );

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
