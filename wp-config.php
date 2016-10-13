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
define('DB_NAME', 'h2t');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

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
define('AUTH_KEY',         'f {!>28JM&QGyKw||1 <b$eb(^}z2/:|6O_dQ&cEwxH]lJaBFHU/1gL0$U4m#sbY');
define('SECURE_AUTH_KEY',  'MN{9$+:P@N.s4!73~5Qjm,ceZFb)u4K:p]g7,}rL3E.!Fa3%/pSW%hbwjpYoK$!%');
define('LOGGED_IN_KEY',    '!Ys-!kZqzT<!N!QV.|rQ`5yKP7evcY! oDk)rZFVwDGK3w3>sF;8KCnl]m[q ymF');
define('NONCE_KEY',        'by#fDd3XuWr9;w.E&w[[)1QR63ZO]G3abK@BI(_Hb)$RdIr-#Yif3h2[ezZ$#y;O');
define('AUTH_SALT',        'E:1Gq)J{sas+h>kz+kmO TLsP&_<RNva &oN{s7.I]L,O,[Xo=NjjmSxu)5Hje=5');
define('SECURE_AUTH_SALT', 'CAK kmUEmrG0S]~O7dvh@hNkTE.o<nd/Mp6ESfCUi3|Ro>N|2Qz]Jy0852U.T}G7');
define('LOGGED_IN_SALT',   ')z`&6?3gU-Q`S[tZe=}#;=ZA8-0Z`Lip5{:q1(#Xo9H6D<@!OQ`cFU6$6Apzh-[,');
define('NONCE_SALT',       'S%QASQPP87Zs*T0<2ch^SUf4CN18gE:z<[{EX,p-I-]8V]1U#-K<|3oE&QIm[TGQ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'h2t_';

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
