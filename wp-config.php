<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'simo_travel' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'H*& B=$ry%N+U+ AV$BWugdFd-uC]|v_ u6tQL!AIagjw_>si ~94pT69RHnHqDD' );
define( 'SECURE_AUTH_KEY',  'Lq?D{cvfK651lDCtEelcJZ<$<>k4F ^)>v5Q|45YDO_HA1:[@:rL`Ld12!9-Q)CP' );
define( 'LOGGED_IN_KEY',    '&DW%/$4:khAF8EkSWmAl;:)zwDAr#}B$ws,,0/->:N]OL>-+_we`8CV)lsJRKW6=' );
define( 'NONCE_KEY',        'CPPsozE9TRe9 bK}t`4?VBCMP2LdijgDw&-GI<&]z[8;vU2?nQVL$a*76*%<!cpf' );
define( 'AUTH_SALT',        'Z^qYNcqBUz?X?>DRppLl|]rcfXL41s<JYMWt77OT4dMNW-CHQ(.^ot~1];6.GIjc' );
define( 'SECURE_AUTH_SALT', 'qVW%KA^N?*ph=sodO^~+7In[7dfcLoH&;S9c(qJ[@A:^!+l`k/.iX;/I0gom5DgK' );
define( 'LOGGED_IN_SALT',   'TR2^Nn,;ABkdJf%8r<$x*!XNwK.!<qZ#D<@OfivToj;#Ah;VvC|RaVDvzn0Ozu_;' );
define( 'NONCE_SALT',       ':AH:o9/<VA7GAb4?~yMAr:5eLP8NE]dh7Wx?#i9lfX8A5,thU?Vf.ag(E~&n&6^E' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 0);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
